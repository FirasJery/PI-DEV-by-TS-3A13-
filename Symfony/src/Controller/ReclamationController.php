<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use App\Entity\Reponse;
use App\Form\ReclamationType;
use App\Form\ReponseType;
use App\Repository\ReclamationRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\ReponseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use ConsoleTVs\Profanity\ProfanityFilter;

#[Route('/reclamation')]
class ReclamationController extends AbstractController
{
    #[Route('/', name: 'app_reclamation_index', methods: ['GET'])]
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        $user= $this->getUser();
        return $this->render('reclamation/index.html.twig', [
            
            'reclamations' => $reclamationRepository->findByUser($user->getId()),
        ]);
    }
    #[Route('/back', name: 'app_reclamation_indexBack', methods: ['GET'])]
    public function indexBack(ReclamationRepository $reclamationRepository): Response
    {
        
        return $this->render('reclamation/indexBack.html.twig', [
            'reclamations' => $reclamationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReclamationRepository $reclamationRepository): Response
    {
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
        $user= $this->getUser();
        if ($form->isSubmitted() && $form->isValid()) {

            $count = $reclamationRepository->countRecentReclamations($user->getId(), 3);
            if ($count >= 3) {
                // Redirect the user back to the new reclamation page with an error message
                $this->addFlash('error', 'You have already submitted the maximum number of reclamations allowed in the last 3 days.');
                return $this->render('reclamation/index.html.twig', [
            
                    'reclamations' => $reclamationRepository->findByUser($user->getId()),
                ]);
            }
           
            $cleaned=\ConsoleTVs\Profanity\Builder::blocker($reclamation->getDescription())->filter();
            $reclamation->setDescription($cleaned);
            $reclamation->setIdUser($user->getId());
            $reclamation->setEtat(0);
            $reclamation->setDate(new \DateTime());
            $reclamationRepository->save($reclamation, true);

            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_show', methods: ['GET'])]
    public function show(Reclamation $reclamation,ReponseRepository $repRep): Response
    {
        $reponse = new Reponse();
        $reponse = $repRep->findByRec($reclamation->getId());
        
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
            'reponse'=>$reponse,
        ]);
    }
    #[Route('/{id}/ban', name: 'app_reclamation_ban', methods: ['GET','POST'])]
    public function Ban(Request $request,ReclamationRepository $reclamationRepository,Utilisateur $user,UtilisateurRepository $userrepo, SessionInterface $session): Response
    {
        $user->setIsBanned(1);
        $userrepo->save($user, true);
    
        $message = 'You have successfully banned ' . $user->getName();
        $session->getFlashBag()->add('success', $message);
    
        // Return a redirect response to the current page
        $referer = $request->headers->get('referer');
        return $this->redirect($referer . '#banUserModal');
    }
    #[Route('/{id}/backshow', name: 'app_reclamation_showBack', methods: ['GET','POST'])]
    public function showBack(Request $request,Reclamation $reclamation,ReclamationRepository $reclamationRepository,ReponseRepository $repRep): Response
    {
        $reclamation->setEtat("1");
        $reclamationRepository->save($reclamation, true);
        $reponse = new Reponse();
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);
        $user= $this->getUser();
        if ($form->isSubmitted() && $form->isValid()) {
           
            $reponse->setIdUser($user->getId());
            $reponse->setIdRec($reclamation->getId());
            $repRep->save($reponse,true);
            $reclamationRepository->save($reclamation, true);
            $reclamation->setEtat("2");
           $reclamationRepository->save($reclamation, true);

            return $this->redirectToRoute('app_reclamation_indexBack', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderform('reclamation/showBack.html.twig', [
            'reclamation' => $reclamation,
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, ReclamationRepository $reclamationRepository): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reclamationRepository->save($reclamation, true);

            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, ReclamationRepository $reclamationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reclamation->getId(), $request->request->get('_token'))) {
            $reclamationRepository->remove($reclamation, true);
        }

        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
}
