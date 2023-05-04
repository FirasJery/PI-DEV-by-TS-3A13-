<?php

namespace App\Controller;
use App\Entity\Postulation;
use App\Entity\Review;
use App\Entity\Offre;
use Twilio\Rest\Client;
use App\Entity\Utilisateur;
use App\Form\OffreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PostulationType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
#[Route('/offre')]
class OffreController extends AbstractController
{
    #[Route('/', name: 'app_offre_index', methods: ['GET'])]
    public function index( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        $queryBuilder
    ->select('o')
    ->from(Offre::class, 'o')
    ->where('o.isfinished = :isfinished')
    ->setParameter('isfinished', 0);
        
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/index.html.twig', [
            'offres' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }

    #[Route('/MesOffres', name: 'app_mes_offres', methods: ['GET','POST'])]
    public function MesOffres( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        $queryBuilder
        ->select('o')
        ->from(Offre::class, 'o')
        ->where('o.isaccepted = :isaccepted')
        ->andWhere('o.idEntreprise = :idF')
        ->andWhere('o.isfinished = 0')
        ->setParameter('isaccepted', '0')
        ->setParameter('idF', $this->getUser()->getId());
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/MesOffres.html.twig', [
            'offresp' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }

    #[Route('/MesOffresTermine', name: 'app_mes_offres_termineE', methods: ['GET','POST'])]
    public function MesOffresTermineE( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        $queryBuilder
        ->select('o')
        ->from(Offre::class, 'o')
        ->where('o.isaccepted = :isaccepted')
        ->andWhere('o.idEntreprise = :idF')
        ->andWhere('o.isfinished = 1')
        ->setParameter('isaccepted', '1')
        ->setParameter('idF', $this->getUser()->getId());
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/MesOffresTerminesE.html.twig', [
            'offresp' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }

    #[Route('/{id}/postulations', name: 'app_mes_postulations', methods: ['GET','POST'])]
    public function PostOffre( Offre $offre,PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $queryBuilder = $entityManager->createQueryBuilder('p');
        
        $queryBuilder
        ->select('p.idPostulation', 'u.LastName','u.name')
        ->from(Postulation::class, 'p')
        ->innerJoin('p.idFreelancer', 'u')
        ->where('p.idOffre = :id')
        ->setParameter('id', $offre->getIdOffre());
    
    $pagination = $paginator->paginate(
        $queryBuilder->getQuery(),
        $request->query->getInt('page', 1),
        3
    );
    
    return $this->render('offre/PostParOffre.html.twig', [
        'postulations' => $pagination,
    ]);
        
    }
    
    #[Route('/deletpost/{idOffre}', name: 'app_postulation_delete', methods: ['POST','GET'])]
    public function deletepost(Request $request, Offre $o, EntityManagerInterface $entityManager): Response
    {       
            $postulation = $entityManager->getRepository(Postulation::class)->findOneBy(['idOffre' => $o->getIdOffre(), 'idFreelancer' => $this->getUser()->getId()]);
            $entityManager->remove($postulation);
            $entityManager->flush();

        return $this->redirectToRoute('app_offre_index_f', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/F', name: 'app_offre_index_f', methods: ['GET'])]
    public function indexf( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        $queryBuilder
    ->select('o')
    ->from(Offre::class, 'o')
    ->leftJoin('o.postulations', 'p', 'WITH', 'p.idFreelancer = :idF')
    ->where('p.idPostulation IS NULL')
    ->andWhere('o.isfinished = 0')
    ->setParameter('idF', $this->getUser()->getId());
        
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/indexFreelancer.html.twig', [
            'offres' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }

    #[Route('/OffresAccepte', name: 'mes_offres_acceptes', methods: ['GET'])]
    public function MesOffresAcceptesE( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        $queryBuilder
    ->select('o')
    ->from(Offre::class, 'o')
    
    ->where('o.isaccepted =1')
    ->andWhere('o.isfinished = 0')
    ->andWhere('o.idEntreprise =:idF')
    ->setParameter('idF', $this->getUser()->getId());
        
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/MesOffresAcceptesEntreprise.html.twig', [
            'offresp' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }

    #[Route('/mesPostulations', name: 'app_offre_mes_postulations', methods: ['GET'])]
    public function mesPostulations( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        
        $queryBuilder
        ->select('o')
        ->from(Offre::class, 'o')
        ->join('o.postulations', 'p')
        ->where('p.isaccepted = :isaccepted')
        ->andWhere('p.idFreelancer = :idF')
        ->andWhere('o.isfinished = 0')
        ->setParameter('isaccepted', '0')
        ->setParameter('idF', $this->getUser()->getId());
    

        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/mespostulation.html.twig', [
            'offresp' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }

    #[Route('/mesOffresEncoursF', name: 'app_offre_mes_offres_en_cours_f', methods: ['GET'])]
    public function mesOffresencours( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        
       $queryBuilder
    ->select('o')
    ->from(Offre::class, 'o')
    ->join('o.postulations', 'p')
    ->where('p.isaccepted = :isaccepted')
    ->andWhere('p.idFreelancer = :idF')
    ->andWhere('o.isfinished = 0')
    ->setParameter('isaccepted', '1')
    ->setParameter('idF', $this->getUser()->getId());

        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/mesoffresencours.html.twig', [
            'offres' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }
    #[Route('/mesOffresterminesF', name: 'app_offre_mes_offres_termines_f', methods: ['GET'])]
    public function mesOffrestermines( PaginatorInterface $paginator,Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        
        $queryBuilder
    ->select('o')
    ->from(Offre::class, 'o')
    ->join('o.postulations', 'p')
    ->where('p.isaccepted = :isaccepted')
    ->andWhere('p.idFreelancer = :idF')
    ->andWhere('o.isfinished = 1')
    ->setParameter('isaccepted', '1')
    ->setParameter('idF', $this->getUser()->getId());
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('offre/mesoffrestermines.html.twig', [
            'offres' => $pagination,
            'searchTerm' => $searchTerm
        ]);
        
    }
    #[Route('/stat', name: 'app_customproduct_stat', methods: ['GET'])]
    public function statindex(Request $request,EntityManagerInterface $entityManager): Response
    {

        $sumQueryBuilder = $entityManager
        ->createQueryBuilder()
        ->select('p.title as material, SUM(p.duree) as weight_sum')
        ->from(Offre::class, 'p')
        ->groupBy('p.title');

        $weightSums = $sumQueryBuilder->getQuery()->getResult();

        // Transform the results into a format that Chart.js can use
        $weightData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Offre',
                    'data' => [],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($weightSums as $weightSum) {
            $weightData['labels'][] = $weightSum['material'];
            $weightData['datasets'][0]['data'][] = $weightSum['weight_sum'];
        }

        return $this->render('offre/stat.html.twig', [
            'weightData' => $weightData,
            'weightSums' => $weightSums,
        ]);

    }
    #[Route('/{offers}/accepted', name: 'app_offre_accepted', methods: ['GET'])]
    public function showAccepted(EntityManagerInterface $entityManager): Response
    {
        $postulations = $entityManager
        ->getRepository(Postulation::class)
        ->findBy(['isaccepted' => 1]);

    $offres = array();
    foreach ($postulations as $postulation) {
        $offre = $postulation->getIdOffre();
        if (!in_array($offre, $offres)) {
            $offres[] = $offre;
        }
    }

    return $this->render('offre/accepted.html.twig', [
        'offres' => $offres,
    ]);
    }

    #[Route('/pos', name: 'app_offre_index1', methods: ['GET'])]
    public function index1(EntityManagerInterface $entityManager): Response
    {
        $offres = $entityManager
            ->getRepository(offre::class)
            ->findBy(['isfinished' => 1]);
    
     
    
        return $this->render('offre/index1.html.twig', [
            'offres' => $offres,
        ]);
    }
    
    #[Route('/admin', name: 'app_offre_indexadmin', methods: ['GET'])]
    public function indexadmin(Request $request, EntityManagerInterface $entityManager): Response
    {    $searchTerm = $request->query->get('q');
        $searchCriteria = $request->query->get('criteria', 'title');
        
        $queryBuilder = $entityManager->createQueryBuilder('o');
        
        if ($searchTerm) {
            $searchField = 'o.' . $searchCriteria;
            $queryBuilder
                ->andWhere(
                    $queryBuilder->expr()->like($searchField, ':searchTerm')
                )
                ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        $queryBuilder
            ->select('o')
            ->from(Offre::class, 'o');
        
            $offres = $queryBuilder->getQuery()->getResult();
        
        return $this->render('offre/indexadmin.html.twig', [
            'offres' => $offres,
            'searchTerm' => $searchTerm
        ]);
        
    }

    
    
    #[Route('/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offre->setIsaccepted(0);
            $offre->setIsfinished(0);
            $offre->setIdEntreprise($this->getUser());
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('app_mes_offres', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/new.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }


    #[Route('/newad', name: 'app_offre_newadmin', methods: ['GET', 'POST'])]
    public function newadmin(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('app_offre_indexadmin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/newadmin.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }

    #[Route('/{idOffre}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre): Response
    {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    
    #[Route('/{idOffre}/NoterFree', name: 'noter_freelancer', methods: ['GET','POST'])]
public function noterFreelancer(Offre $off, Request $request, EntityManagerInterface $entityManager): Response
{
    $reviewRepository = $entityManager->getRepository(Review::class);
    $review = new Review();
    $postulation = $entityManager->getRepository(Postulation::class)->findOneByIdOffre(['idOffre' => $off->getIdOffre()]);
    $user = $entityManager->getRepository(Utilisateur::class)->findOneById(['id' => $postulation->getIdFreelancer()->getId()]);
    $review->setIdUser($user);
    $review->setIdEditeur($this->getUser()->getId());
    
    $form = $this->createFormBuilder($review)
        ->add('note', HiddenType::class)
        ->add('message', TextareaType::class, ['label' => 'Message'])
        ->add('save', SubmitType::class, ['label' => 'Submit'])
        ->getForm();

    $form->handleRequest($request);
    //dd($review);
    if ($form->isSubmitted() && $form->isValid()) {
        
        $reviewRepository->save($review,true);
        $reviews = $reviewRepository->findBy(['idUser' => $user->getId()]);
        $count = count($reviews);
        $sum = 0;
        foreach ($reviews as $review) {
            $sum += $review->getNote();
        }
        $average = ($count > 0) ? $sum / $count : 0;
        $user->setRating($average);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_mes_offres');
    }

    return $this->render('offre/NoterFrelancer.html.twig', [
        'offre' => $off,
        'form' => $form->createView(),
    ]);
}
    #[Route('Freelancer/{idOffre}', name: 'app_offre_showF', methods: ['GET'])]
    public function showOffreF(Offre $offre,): Response
    {
        return $this->render('offre/showOffreFreeCard.html.twig', [
            'offre' => $offre,
        ]);
    }

    #[Route('/{idOffre}/edit', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }

    #[Route('/{idOffre}/editad', name: 'app_offre_editadmin', methods: ['GET', 'POST'])]
    public function editadmin(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_offre_indexadmin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/editadmin.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }



    #[Route('/{idOffre}', name: 'app_offre_delete', methods: ['POST'])]
    public function delete(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offre->getIdOffre(), $request->request->get('_token'))) {
            $entityManager->remove($offre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('refuser/{idOffre}', name: 'app_offre_refuser', methods:  ['POST'])]
    public function refuser(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
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
    
        if ($this->isCsrfTokenValid('delete'.$offre->getIdOffre(), $request->request->get('_token'))) {
            $entityManager->remove($offre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offre_index1', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('Terminer/{idOffre}', name: 'app_offre_update_etat', methods:  ['POST','GET'])]
    public function TerminerOffre(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $sid    = "ACcdf24cdc4abbf3d6d3b29419fa108968";
        $token  = "dc95da547770ef8fbc0157688c9d3cf3";
        $twilio = new Client($sid, $token);
    
        $message = $twilio->messages
          ->create("whatsapp:+21627505807", // to
            array(
              "from" => "whatsapp:+14155238886",
              "body" => "Votre Projet est marqué terminé !"
            )
          );
        $offre->setIsfinished(1);
        $entityManager->flush();
        

        return $this->redirectToRoute('app_mes_offres_termineE', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('del/{idOffre}', name: 'app_offre_deleteadmin', methods: ['POST'])]
    public function deleteadmin(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offre->getIdOffre(), $request->request->get('_token'))) {
            $entityManager->remove($offre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offre_indexadmin', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/{idOffre}/postuler', name: 'app_offre_postuler', methods: ['POST'])]
    public function postuler(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $sid    = "ACcdf24cdc4abbf3d6d3b29419fa108968";
        $token  = "dc95da547770ef8fbc0157688c9d3cf3";
        $twilio = new Client($sid, $token);
    
        $message = $twilio->messages
          ->create("whatsapp:+21627505807", // to
            array(
              "from" => "whatsapp:+14155238886",
              "body" => "Merci pour votre postulation , votre demande est prise en charge et en cours de traitement"
            )
          );
    
    print($message->sid);
        $postulation = new Postulation();
        $postulation->setIdOffre($offre);
        $postulation->setIdFreelancer($this->getUser());
        $postulation->setIsaccepted(0);
        
        $entityManager->persist($postulation);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_offre_index_f');
    }
    
    
    #[Route('/{id}/AcceptPost', name: 'app_accept_post', methods: ['POST','GET'])]
    public function acceptPostulation(Postulation $post, Request $request, EntityManagerInterface $entityManager): Response
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
    

        $repository = $entityManager->getRepository(Offre::class);
        $offre =$post->getIdOffre();
    
       
    
      
        $offre->setIsaccepted(true);
        $post->setIsAccepted(true);
        $entityManager->flush();
    
        return $this->redirectToRoute('app_mes_offres');
    }   
}
