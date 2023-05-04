<?php

namespace App\Controller;
use App\Repository\CertifRepository;
use App\Entity\Certif;
use App\Repository\PassageRepository;
use App\Entity\Passage;
use App\Repository\QuestionRepository;
use App\Entity\Question;
use App\Entity\Test;
use App\Form\TestType;
use App\Repository\TestRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test_show')]
    public function indexT(TestRepository $TestRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $testQuery = $TestRepository->createQueryBuilder('p')
        ->where('p.titre != :titre')
        ->setParameter('titre', 'titre')
        ->getQuery();

    $test = $paginator->paginate(
        $testQuery,
        $request->query->getInt('page', 1),
        2
    );
        return $this->render('test/test.html.twig', [
            'test' => $test
        ]);
    }
    #[Route('/{id}/testC', name: 'app_test_create', methods: ['GET', 'POST'])]
    public function createT (CertifRepository $CRepository,Request $request ,EntityManagerInterface $entityManager,int $id)
    { 
 
        $certif = $CRepository->find($id);

        $Test = new Test;

        $form = $this ->createForm(TestType::class,$Test);
                       
       
                 $form->handleRequest($request)  ;  
                
                if ($form->isSubmitted() && $form->isValid()) {
                    $Test->setCertif($certif);
                  $entityManager->persist($Test);
                  $entityManager->flush();
                  $this->addFlash(
                    'info',
                  ' votre test a été creer',  
              );
                  
    
        }
        
           
        return $this->render('test/testC.html.twig', [
            'form' => $form->createView()
          
        ]);
 
    }
    #[Route('/{id}/editT', name: 'app_test_edit', methods: ['GET', 'POST'])]
    public function modifierT(int $id,Request $req)
    {
       
        $Test=$this->getDoctrine()->getRepository(Test::class)->find($id);
        $form=$this->createForm(TestType::class,$Test);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            $this->addFlash(
                'info',
              ' votre test a été modifier',  
          );
            return $this->redirectToRoute('app_test_show');
        }
        return $this->render('test/testC.html.twig', [
            'form' => $form->createView()
          
        ]);
        //return $this->render('reclamation/edit.html.twig',array('formReclamation'=>$form->createView()));
    }
    #[Route('/{id}/deleteT', name: 'app_test_delete', methods: ['GET','POST'])]
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
    $test = $entityManager->getRepository(Test::class)->find($id);
    $entityManager->remove($test);
    $entityManager->flush();
    $this->addFlash(
        'info',
      ' votre test a été supprimer',  
  );
    
    return $this->redirectToRoute('app_test_show', [], Response::HTTP_SEE_OTHER);

    }

    #[Route('/{id}/tests', name: 'app_certif_tests', methods: ['GET'])]
    public function viewTests(int $id, CertifRepository $certifRepo, TestRepository $testRepo, PassageRepository $passageRepo): Response
{
    $user = $this->getUser();
    $certif = $certifRepo->find($id);
    $tests = $certif->getTestId();

    $ts = $testRepo->createQueryBuilder('t')
        ->leftJoin('t.questId', 'q')
        ->getQuery()
        ->getResult();

    $passages = $passageRepo->findAll();

    return $this->render('front/tests.html.twig', [
        'Certif' => $certif,
        'tests' => $tests,
        'user' => $user,
        'passages' => $passages,
        'ts' => $ts,
    ]);
}
}









