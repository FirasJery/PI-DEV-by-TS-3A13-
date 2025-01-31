<?php
namespace App\Controller;

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
use App\Repository\UtilisateurRepository;
use App\Entity\Conversation;
use App\Entity\Utilisateur;
use App\Entity\Participant;
use App\Entity\Message;
use App\Entity\Association;
use App\Entity\Donator;
use App\Session\DataSource;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

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
    public function load_messagerie(Request $request, ConversationRepository $cr) : Response {
        $user = $this->getUser();
        if($user){
            $ar = [];
            foreach($convos = $cr->findAll() as $c){
                foreach($c->getParticipants() as $p){
                    if($p->getUser()->getId() == $user->getId()){
                        array_push($ar, $c);
                    }
                }
            }
            return $this->render("messagerie/messagerie.html.twig", ["convos" => $ar]);
        } else {
            return $this->render("generic/navbar.html.twig");
        }   
    }

    /**
     * @Route("/show-convo", name="show-convo")
     */
    public function convo_view(Request $request) : Response {
        if($this->getUser()){
            $fp = [];
            array_push($fp, $this->getUser()->getId());
            foreach($request->request->get("other-part") as $p){
                array_push($fp, intval($p));
            }
            $convo = $this->em->getRepository(Conversation::class)->findConversationByUsers($fp);
            if($convo){
                dump($convo->getType());
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
        UtilisateurRepository $ur,
        ParticipantRepository $pr,
        MessageRepository $mr, 
        ManagerRegistry $man,
        MailerInterface $mailer
        ) : Response {
            if(($this->getUser()) && ($request->request->get("msg-content"))){
                if($request->request->get("user") == "u"){
                    if($request->request->get("conversation-id") == "-1"){
                        if($request->request->get("u-list")){
                            $u_list = $request->request->get("u-list");
                            $ar = [];
                            array_push($ar, $this->getUser()->getId());
                            foreach($u_list as $utmp){
                                array_push($ar, $ur->findOneBy(["UserName" => $utmp])->getId());
                            }
                            $convo = $cr->findConversationByUsers($ar);
                            if($convo){
                                $this->sendMessage($convo, $request, $man);

                                return $this->render("messagerie/conversation.html.twig", ["convo" => $convo]);
                            } else {
                                $title = "";
                                $convo = new Conversation();
                                foreach($ar as $uid){
                                    $part_tmp = new Participant();
                                    $part_tmp->setUser($ur->find($uid));
                                    $convo->addParticipant($part_tmp);
                                    $title = $title . $part_tmp->getUser()->getUsername();
                                    if($uid != end($ar)){
                                        $title = $title . ", ";
                                    }           
                                }
                                $convo->setTitle($title);
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
                    $lm = $cr->find(intval($request->request->get("conversation-id")))->getLastMessage();
                    if($lm->getParticipant()->getUser()->getId() != $this->getUser()->getId()){
                        return $this->render("messagerie/message-append.html.twig", ["msg" => $lm]);
                    } else {
                        return new Response('', 204);
                    }
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
            $res = $this->em->getRepository(Utilisateur::class)->findAll();
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
            if($p->getUser()->getId() == $this->getUser()->getId()){
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
