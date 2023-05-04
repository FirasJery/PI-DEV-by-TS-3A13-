<?php

namespace App\Controller;

use App\Entity\Reponse;
use App\Entity\Rating;
use App\Form\ReponseType;
use App\Repository\ReponseRepository;
use App\Repository\RatingRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

#[Route('/reponse')]
class ReponseController extends AbstractController
{
    #[Route('/', name: 'app_reponse_index', methods: ['GET'])]
    public function index(ReponseRepository $reponseRepository): Response
    {
        return $this->render('reponse/index.html.twig', [
            'reponses' => $reponseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reponse_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReponseRepository $reponseRepository): Response
    {
        $reponse = new Reponse();
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reponseRepository->save($reponse, true);

            return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse/new.html.twig', [
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponse_show', methods: ['GET','POST'])]
    public function show(Reponse $reponse,UtilisateurRepository $userrepo,RatingRepository $ratingrepo,Request $request): Response
    {
        
        $user = $userrepo->findOneById($reponse->getIdUser());
        $check=0;
      
       
        $rating = new Rating();
    $form = $this->createFormBuilder($rating)
        ->add('note', ChoiceType::class, [
            'label' => 'Rating',
            'choices' => [
                '1 star' => 1,
                '2 stars' => 2,
                '3 stars' => 3,
                '4 stars' => 4,
                '5 stars' => 5,
            ],
            'expanded' => true,
            'multiple' => false,
        ])
        ->getForm();
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Save the rating
        $rating->setUser($this->getUser()->getId());
        $rating->setIdAdmin($reponse->getIdUser());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($rating);
        $entityManager->flush();

        // Redirect to the same page to prevent form resubmission
        return $this->redirectToRoute('app_reponse_show', ['id' => $reponse->getId()]);
    }
    if($reponse){
        $check=1;
    $ratings = $ratingrepo->createQueryBuilder('r')
        ->select('AVG(r.note) as average_rating')
        ->andWhere('r.idAdmin = :id')
        ->setParameter('id', $reponse->getIdUser())
        ->getQuery()
        ->getSingleScalarResult();
    $averageRating =round($ratings, 1);
    return $this->render('reponse/show.html.twig', [
        'id' => $reponse->getId(),
        'reponse'=>$reponse,
        'check'=>$check,
        'user' => $user,
        'average_rating' => $averageRating,
        'rating_form' => $form->createView(),
    ]);
    }
        return $this->render('reponse/show.html.twig', [
            'id' => $reponse->getId(),
            'reponse' => $reponse,
            'user' => $user,
            'rating_form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reponse $reponse, ReponseRepository $reponseRepository): Response
    {
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reponseRepository->save($reponse, true);

            return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse/edit.html.twig', [
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponse_delete', methods: ['POST'])]
    public function delete(Request $request, Reponse $reponse, ReponseRepository $reponseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reponse->getId(), $request->request->get('_token'))) {
            $reponseRepository->remove($reponse, true);
        }

        return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
    }
}
