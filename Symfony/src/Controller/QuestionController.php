<?php

namespace App\Controller;
use App\Repository\QuestionRepository;
use App\Entity\Question;
use App\Entity\Test;
use App\Entity\Passage;
use App\Form\QuestionType;
use App\Repository\TestRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question')]
    public function index(QuestionRepository $QuestionRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $questQuery = $QuestionRepository->createQueryBuilder('p')
        ->where('p.question != :question')
        ->setParameter('question', 'question')
        ->getQuery();
        $question = $paginator->paginate(
            $questQuery,
            $request->query->getInt('page', 1),
            2
        );
        return $this->render('question/quest.html.twig', [
            'quest' => $question
        ]);
    }
    #[Route('/{id}/questC', name: 'app_quest_create', methods: ['GET', 'POST'])]
    public function createT (TestRepository $tRepository,Request $request ,EntityManagerInterface $entityManager,int $id)
    { 
 
        $test = $tRepository->find($id);

        $quest = new Question;

        $form = $this ->createForm(QuestionType::class,$quest);
                       
       
                 $form->handleRequest($request)  ;  
                
                if ($form->isSubmitted() && $form->isValid()) {
                    $quest->setTest($test);
                  $entityManager->persist($quest);
                  $entityManager->flush();
                  $this->addFlash(
                    'info',
                  ' votre question a été creer',  
              );
        }
        
        return $this->render('question/questC.html.twig', [
            'form' => $form->createView()
          
        ]);
 
    }
    #[Route('/{id}/editQ', name: 'app_quest_edit', methods: ['GET', 'POST'])]
    public function modifierQ(int $id,Request $req)
    {
       
        $quest=$this->getDoctrine()->getRepository(Question::class)->find($id);
        $form=$this->createForm(QuestionType::class,$quest);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            $this->addFlash(
                'info',
              ' votre question a été modifier',  
          );
            return $this->redirectToRoute('app_question');
        }
        return $this->render('question/questC.html.twig', [
            'form' => $form->createView()
          
        ]);
    }
    #[Route('/{id}/deleteQ', name: 'app_quest_delete', methods: ['GET','POST'])]
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
    $quest = $entityManager->getRepository(Question::class)->find($id);
    $entityManager->remove($quest);
    $entityManager->flush();
    $this->addFlash(
        'info',
      ' votre question a été supprimer',  
  );
    
    return $this->redirectToRoute('app_question', [], Response::HTTP_SEE_OTHER);

    }


}
