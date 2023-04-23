<?php
namespace App\Controller;

include_once __DIR__ . "/../Session/DataSource.php";

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

use App\Repository\ConversationRepository;
use App\Entity\Conversation;
use App\Entity\User;
use App\Session\DataSource;

class HomepageController extends AbstractController
{
    private $em;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $rs)
    {
        $this->em = $entityManager;
        $this->requestStack = $rs;
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('generic/navbar.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function log(Request $request){
        $ds = new DataSource();
        if($request->request->get('login-submit') != null){
            $rep = $this->em->getRepository(User::class);
            $user = $rep->findOneBy([
                "username" => $request->request->get('user'),
                "password" => $request->request->get('pass')]);
            if($user){
                $session = $this->requestStack->getSession();
                $session->set('current_user', $user);
                return $this->redirectToRoute('homepage');
            } else {
                return $this->render('generic/login-form.html.twig');
            }
        } else {
            return $this->render('generic/login-form.html.twig');
        }
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){
        $this->requestStack->getSession()->remove('current_user');
        return $this->redirectToRoute('homepage');
    }
}
?>
