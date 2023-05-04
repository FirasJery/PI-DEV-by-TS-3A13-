<?php

namespace App\Controller;
use Doctrine\ORM\QueryBuilder;
use Twilio\Rest\Client;
use App\Entity\Postulation;
use App\Form\PostulationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use MercurySeries\FlashyBundle\FlashyNotifier;
#[Route('/postulation')]
class PostulationController extends AbstractController
{
    #[Route('/', name: 'app_postulation_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $postulations = $entityManager
            ->getRepository(Postulation::class)
            ->findAll();

        return $this->render('postulation/index.html.twig', [
            'postulations' => $postulations,
        ]);
    }
    #[Route('/a', name: 'app_postulation_index1', methods: ['GET'])]
    public function index1(EntityManagerInterface $entityManager): Response
    {
        $postulations = $entityManager
        ->getRepository(Postulation::class)
        ->findBy(['isaccepted' => false]);

    return $this->render('postulation/index1.html.twig', [
        'postulations' => $postulations,
    ]);
    }
    #[Route('/r', name: 'app_postulation_index2', methods: ['GET'])]
    public function index2(EntityManagerInterface $entityManager): Response
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('p')
            ->from(Postulation::class, 'p')
            ->join('p.idOffre', 'o')
            ->where('p.isaccepted = true')
            ->andWhere('o.isfinished = false');
    
        $postulations = $queryBuilder->getQuery()->getResult();
    
        return $this->render('postulation/index2.html.twig', [
            'postulations' => $postulations,
        ]);
    }


    #[Route('/new', name: 'app_postulation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $postulation = new Postulation();
        $form = $this->createForm(PostulationType::class, $postulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($postulation);
            $entityManager->flush();

            return $this->redirectToRoute('app_postulation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('postulation/new.html.twig', [
            'postulation' => $postulation,
            'form' => $form,
        ]);
    }

    #[Route('/{idPostulation}', name: 'app_postulation_show', methods: ['GET'])]
    public function show(Postulation $postulation): Response
    {
        return $this->render('postulation/show.html.twig', [
            'postulation' => $postulation,
        ]);
    }

    #[Route('/{idPostulation}/edit', name: 'app_postulation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Postulation $postulation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PostulationType::class, $postulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_postulation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('postulation/edit.html.twig', [
            'postulation' => $postulation,
            'form' => $form,
        ]);
    }

   


    #[Route('/postulation/done', name: 'app_postulation_acc', methods: ['POST'])]
    public function markAccepted(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sid    = "ACcdf24cdc4abbf3d6d3b29419fa108968";
        $token  = "dc95da547770ef8fbc0157688c9d3cf3";
        $twilio = new Client($sid, $token);
    
        $message = $twilio->messages
          ->create("whatsapp:+21627505807", // to
            array(
              "from" => "whatsapp:+14155238886",
              "body" => "Votre demande a été traité , votre demande de postulation est  bien retenue , vous êtes accepté pour effectuer cette offre"
            )
          );
        $applyId = $request->request->get('idPostulation');
        
        $apply = $entityManager
            ->getRepository(Postulation::class)
            ->find($applyId);
        
     
            $apply->setIsAccepted(true);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_postulation_index2');
    }


   

    #[Route('ref/{idPostulation}', name: 'app_postulation_refuse', methods: ['POST'])]
    public function refuse(Request $request, Postulation $postulation, EntityManagerInterface $entityManager): Response
    {
        $sid    = "ACcdf24cdc4abbf3d6d3b29419fa108968";
        $token  = "dc95da547770ef8fbc0157688c9d3cf3";
        $twilio = new Client($sid, $token);
    
        $message = $twilio->messages
          ->create("whatsapp:+21627505807", // to
            array(
              "from" => "whatsapp:+14155238886",
              "body" => "Aprés le traitement de votre demande , votre postulation n'a pas été retenu , essayer de postuler dans d autres offres !"
            )
          );

        if ($this->isCsrfTokenValid('delete'.$postulation->getIdPostulation(), $request->request->get('_token'))) {
            $entityManager->remove($postulation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_postulation_index1', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/postulation/{id}/finish-offre', name: 'app_postulation_finish_offre', methods: ['POST'])]
public function finishOffre(FlashyNotifier $flashy,Postulation $postulation, EntityManagerInterface $entityManager): Response
{
    $sid    = "ACcdf24cdc4abbf3d6d3b29419fa108968";
    $token  = "dc95da547770ef8fbc0157688c9d3cf3";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+21627505807", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "L'offre est marqué comme terminé , vous pouvez commencer une autre en re-postulant !"
        )
      );

    $flashy->info('Your Offer Is Done !');
    $offre = $postulation->getIdOffre();
    $offre->setIsFinished(true);

    $entityManager->persist($offre);
    $entityManager->flush();

    return $this->redirectToRoute('app_offre_index1', [], Response::HTTP_SEE_OTHER);
}
}
