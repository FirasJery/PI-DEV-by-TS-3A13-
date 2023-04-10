<?php
namespace App\Controller;

include_once __DIR__ . "/../Session/DataSource.php";
require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pusher\Pusher;

use App\Repository\ConversationRepository;
use App\Repository\ParticipantRepository;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use App\Entity\Conversation;
use App\Entity\User;
use App\Entity\Participant;
use App\Entity\Message;
use App\Entity\Association;
use App\Entity\Donator;
use App\Session\DataSource;

class MessagerieController extends AbstractController
{
    private $em;
    private $rs;

    public function __construct(
        EntityManagerInterface $entityManager, 
        RequestStack $rs
        )
    {
        $this->em = $entityManager;
        $this->rs = $rs;
    }

    /**
     * @Route("/inbox", name="msg")
     */
    public function load_messagerie(Request $request) : Response {
        $user = $this->rs->getSession()->get("current_user");
        if($user){
            $qb = $this->em->createQueryBuilder();
            $qb->select('c')
                ->from('App\Entity\Conversation', 'c')
                ->join('App\Entity\Participant', 'p', 'WITH', 'c = p.conversation')
                ->innerjoin('App\Entity\Message', 'm', 'WITH', 'c.lastMessage = m')
                ->where('p.user = :user')
                ->setParameter('user', $user)
                ->orderBy('m.createdAt', 'DESC');
            $convos = $qb->getQuery()->getResult();
            return $this->render("messagerie/messagerie.html.twig", ["convos" => $convos]);
        } else {
            return $this->render("generic/navbar.html.twig");
        }   
    }

    /**
     * @Route("/show-convo", name="show-convo")
     */
    public function convo_view(Request $request) : Response {
        if($request->getSession()->get("current_user")){
            $convo = $this->em->getRepository(Conversation::class)->findConversationByUsers(
                array(
                    $request->getSession()->get("current_user")->getId(), 
                    intval($request->request->get("other-part"))
                    )
            );
            if($convo){
                return $this->render("messagerie/conversation.html.twig", ["convo" => $convo]);
            } else {
                return $this->render("generic/navbar.html.twig");
            }      
        } else {
            return $this->render("generic/navbar.html.twig");
        }
    }

    /**
     * @Route("/send-msg", name="send-msg")
     */
    public function message_pusher(
        Request $request, 
        ConversationRepository $cr,
        UserRepository $ur,
        ParticipantRepository $pr,
        MessageRepository $mr, 
        ManagerRegistry $man
        ) : Response {
            if(($request->getSession()->get("current_user")) && ($request->request->get("msg-content"))){
                if($request->request->get("user") == "u"){
                    if($request->request->get("conversation-id") == "-1"){
                        if($request->request->get("u-list")){
                            $u_list = $request->request->get("u-list");
                            $ar = [];
                            array_push($ar, 1);
                            foreach($u_list as $utmp){
                                array_push($ar, $ur->findOneBy(["username" => $utmp])->getId());
                            }
                            $convo = $cr->findConversationByUsers($ar);
                            if($convo){
                                $this->sendMessage($convo, $request, $man);

                                return $this->render("messagerie/conversation.html.twig", ["convo" => $convo]);
                            } else {
                                $convo = new Conversation();
                                foreach($ar as $uid){
                                    $part_tmp = new Participant();
                                    $part_tmp->setUser($ur->find($uid));
                                    $convo->addParticipant($part_tmp);
                                }
                                if(count($ar) > 2){
                                    $convo->setType("grp");
                                } else {
                                    $convo->setType("p2p");
                                }
                                $man->getManager()->persist($convo);
                                $man->getManager()->flush();
                                $this->sendMessage($convo, $request, $man);

                                //CREATE NEW TEMPLATE SO YOU CAN SHOW THE NEW CONVO ON THE SIDEBAR
                                return $this->render("messagerie/conversation.html.twig", ["convo" => $convo]);
                            }
                        } else {
                            return new Response('', 204);
                        }
                        
                    } else {
                        $convo = $cr->find(intval($request->request->get("conversation-id")));
                        $this->sendMessage($convo, $request, $man);

                        return $this->render("messagerie/message-append.html.twig", ["msg" => $convo->getLastMessage()]);
                    }
                } else {
                    $convo = $cr->find(intval($request->request->get("conversation-id")));

                    return $this->render("messagerie/message-append.html.twig", ["msg" => $convo->getLastMessage()]);
                }
            } else {
                return $this->render("generic/navbar.html.twig");
            }
    }

    /**
     * @Route("/get-contacts", name="get-contacts")
     */
    public function getContacts(Request $request) : Response {
        $data = [];
        $add = $request->request->get("additional-data");
        if($request->request->get("contact-name")){
            $i = 0;
            $res = $this->em->getRepository(User::class)->findAll();
            foreach($res as $u){
                $test = true;
                if(str_contains($u->getUsername(), $request->request->get("contact-name"))){
                    foreach($add as $ls){
                        if($u->getUsername() == $ls){
                            $test = false;
                        }
                    }
                    if($test){
                        $data[strval($i)] = ["username" => $u->getUsername(), "img" => "resources/default.jpg"];
                        $i = $i + 1;
                    }
                }
            }
        }
        return $this->render("messagerie/modal-contacts.html.twig", ["data" => $data, "idk" => $add]);
    }

    ///////////////////////////////////////////////////////////////////////////////////////

    public function pushR($channel, $msg, $pid){
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
          );
          $pusher = new Pusher(
            '68154387874516026ac7',
            'a344f22ba8a05dd1a6f7',
            '1577632',
            $options
          );
        
          $data['message'] = $msg;
          $data['part'] = $pid; 
          $pusher->trigger($channel, 'message-sent', $data);
    }  
    
    public function sendMessage(Conversation $convo, Request $request, ManagerRegistry $man){
        $part = null;
        foreach($convo->getParticipants() as $p){
            if($p->getUser()->getId() == $request->getSession()->get("current_user")->getId()){
                $part = $p;
            }
        }
        $msg = new Message();
        $msg->setContent($request->request->get("msg-content"));
        $msg->setParticipant($part);
        $msg->setConversation($convo);

        $convo->addMessage($msg);
    
        $mgr = $man->getManager();
        $mgr->persist($msg);
        $mgr->flush();

        $cid =  "cp" . $convo->getId();
        $cntn = $msg->getContent();
        $pid = $part->getId();
        $this->pushR($cid, $cntn, $pid);
    }
}
?>
