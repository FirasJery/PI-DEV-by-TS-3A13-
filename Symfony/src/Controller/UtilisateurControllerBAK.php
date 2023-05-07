<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\Wallet;
use App\Form\UtilisateurType;
use App\Form\UtilisateurEditType;
use App\Repository\UtilisateurRepository;
use App\Repository\WalletRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Doctrine\ORM\EntityManagerInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;




#[Route('/utilisateur')]
class UtilisateurControllerBAK extends AbstractController
{
    
    #[Route('/', name: 'app_utilisateur_index', methods: ['GET'])]
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurRepository->findAll(),
        ]);
    }
   
    #[Route('/newAdmin', name: 'app_utilisateur_newAdmin', methods: ['GET', 'POST'])]
    public function newA(Request $request, UtilisateurRepository $utilisateurRepository ,UserPasswordHasherInterface $userPasswordHasher ): Response
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setRole('Admin');
        $form = $this->createForm(UtilisateurType::class, $utilisateur , ['user_role' => "Admin"]);
        $form->handleRequest($request);
        


        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('ImagePath')->getData();

            if ($uploadedFile) {
                // generate a unique file name
                $newFileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
                $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
            
                // move the uploaded file to the target directory
                $uploadedFile->move(
                    $targetDirectory, // specify the target directory where the file should be saved
                    $newFileName      // specify the new file name
                );
                    
                            // set the image path to the path of the uploaded file
                $utilisateur->setImagePath('uploads/images/' . $newFileName);
                // encode the plain password
                $utilisateur->setPassword(
                    $userPasswordHasher->hashPassword(
                        $utilisateur,
                        $form->get('Password')->getData()
                    )
                );
            }
            $utilisateurRepository->save($utilisateur, true);
           

            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/newAdmin.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route("/save-img", name : 'app_save_img', methods: ['GET', 'POST'])]
    public function saveImg(Request $request, VerifyEmailHelperInterface $verifyEmailHelper, UtilisateurRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
            $dataURL = $request->request->get('image');
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));
            $filename = uniqid() . '.jpg';
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
            $file_path = $uploadDir . '/' . $filename;

            if (file_put_contents($file_path, $decodedImage)) {
                $response = array(
                    'success' => true,
                    'filename' => $filename
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Failed to upload file'
                );
            }

            return new JsonResponse($response);
    }

    #[Route('/newFreelancer', name: 'app_utilisateur_newFreelancer', methods: ['GET', 'POST'])]
    public function newF(Request $request,WalletRepository $wall, UtilisateurRepository $utilisateurRepository ,UserPasswordHasherInterface $userPasswordHasher, VerifyEmailHelperInterface $verifyEmailHelper,MailerInterface $mailer): Response
    {
        
        $utilisateur = new Utilisateur();
        $utilisateur->setRole('Freelancer');
        $utilisateur->setRating(0);
        $utilisateur->setTotalJobs(0);
        
        $form = $this->createForm(UtilisateurType::class, $utilisateur , ['user_role' => "Freelancer"]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('ImagePath')->getData();
            $camImage = $form->get('Image')->getData();
           

            if ($camImage)
            {
                $utilisateur->setImagePath('uploads/images/' . $camImage);
            }else if ($uploadedFile) {
                // generate a unique file name
                $newFileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
                $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
                // move the uploaded file to the target directory
                $uploadedFile->move(
                    $targetDirectory, // specify the target directory where the file should be saved
                    $newFileName      // specify the new file name
                );        
                $utilisateur->setImagePath('uploads/images/' . $newFileName);
                
            }
            else 
            {
                $utilisateur->setImagePath('uploads/images/profile.jpg');
            }

            
            // encode the plain password
            $utilisateur->setPassword(
                $userPasswordHasher->hashPassword(
                    $utilisateur,
                    $form->get('Password')->getData()
                )
            );
            
            $utilisateurRepository->save($utilisateur, true);
            $signatureComponents = $verifyEmailHelper->generateSignature(
                'app_verify_email',
                $utilisateur->getId(),
                $utilisateur->getEmail(),
                ['id' => $utilisateur->getId()]
            );
            $email = (new TemplatedEmail())
            ->from(new Address('firas.eljary@esprit.tn', 'Freelancy Bot'))
            ->to($utilisateur->getEmail())
            ->subject('Your Email confirmation link')
            ->htmlTemplate('security/emailverify.html.twig')
            ->context([
                'signedUrl' => $signatureComponents->getSignedUrl()], 
            );

            $mailer->send($email);
            $wallet = new Wallet();
            $wallet->setNomwallet($utilisateur->getName()."'s Wallet");
            $wallet->setIdUser($utilisateur->getId());
            $wallet->setSolde(0);
            $wallet->setBonus(0);
            $randomString = bin2hex(random_bytes(5));
            $cle = substr($randomString, 0, 10);
            $wallet->setCle($cle);
            $wallet->setTel("");
            $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($wallet);
        $entityManager->flush();
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }
       

        return $this->renderForm('utilisateur/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    
    #[Route("/verify", name : 'app_verify_email')]
    public function verifyUserEmail(Request $request, VerifyEmailHelperInterface $verifyEmailHelper, UtilisateurRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        
        $utilisateur = $userRepository->find($request->query->get('id'));
        if (!$utilisateur) {
            throw $this->createNotFoundException('user not found');
        }
         
        try {
            $verifyEmailHelper->validateEmailConfirmation(
                $request->getUri(),
                $utilisateur->getId(),
                $utilisateur->getEmail()
            );
            $utilisateur->setIsVerified(true);
            $entityManager->flush();
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
            // The email has been successfully confirmed. Handle the success case here.
        } catch (VerifyEmailExceptionInterface $e) {
            // The email could not be confirmed. Handle the error case here.
            throw $this->createNotFoundException();
        }
        return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
       
    }

    #[Route('/newEntreprise', name: 'app_utilisateur_newEntreprise', methods: ['GET', 'POST'])]
    public function newE(Request $request,WalletRepository $wall, UtilisateurRepository $utilisateurRepository ,UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setRole('Entreprise');
        $utilisateur->setIsBanned(0);
        $form = $this->createForm(UtilisateurType::class, $utilisateur , ['user_role' => "Entreprise"]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('ImagePath')->getData();

if ($uploadedFile) {
    // generate a unique file name
    $newFileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
    $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';

    // move the uploaded file to the target directory
    $uploadedFile->move(
        $targetDirectory, // specify the target directory where the file should be saved
        $newFileName      // specify the new file name
    );
        
                // set the image path to the path of the uploaded file
                $utilisateur->setImagePath('uploads/images/' . $newFileName);
                // encode the plain password
               
            }
            $utilisateur->setPassword(
                $userPasswordHasher->hashPassword(
                    $utilisateur,
                    $form->get('Password')->getData()
                )
            );
            $wallet = new Wallet();
            $wallet->setNomwallet($utilisateur->getName()."'s Wallet");
            $wallet->setIdUser($utilisateur->getId());
            $wallet->setSolde(0);
            $wallet->setBonus(0);
            $randomString = bin2hex(random_bytes(5));
            $cle = substr($randomString, 0, 10);
            $wallet->setCle($cle);
            $wallet->setTel("");
            $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($wallet);
        $entityManager->flush();
            $utilisateurRepository->save($utilisateur, true);

            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
            'user_role' => 'Entreprise',
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_show', methods: ['GET'])]
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('utilisateur/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    #[Route('/profile/{id}', name: 'app_utilisateur_showProfile', methods: ['GET'])]
    public function showFront(Utilisateur $utilisateur): Response
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
       
        return $this->render('utilisateur/profile.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

   /* #[Route('/{id}/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        $form = $this->createForm(UtilisateurType::class, $utilisateur, ['user_role' => $utilisateur->getRole()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateurRepository->save($utilisateur, true);
            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }*/
    #[Route('/{id}/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $form = $this->createForm(UtilisateurEditType::class, $utilisateur, ['user_role' => $utilisateur->getRole()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('ImagePath')->getData();

            if ($uploadedFile) {
                // generate a unique file name
                $newFileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
                $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
            
                // move the uploaded file to the target directory
                $uploadedFile->move(
                    $targetDirectory, // specify the target directory where the file should be saved
                    $newFileName      // specify the new file name
                );
                    
                            // set the image path to the path of the uploaded file
                            $utilisateur->setImagePath('uploads/images/' . $newFileName);
                
            }
            $utilisateurRepository->save($utilisateur, true);
            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/editProfile', name: 'app_utilisateur_editProfile', methods: ['GET', 'POST'])]
    public function editProfile(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $form = $this->createForm(UtilisateurEditType::class, $utilisateur, ['user_role' => $utilisateur->getRole()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('ImagePath')->getData();

            if ($uploadedFile) {
                // generate a unique file name
                $newFileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
                $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
            
                // move the uploaded file to the target directory
                $uploadedFile->move(
                    $targetDirectory, // specify the target directory where the file should be saved
                    $newFileName      // specify the new file name
                );
                    
                            // set the image path to the path of the uploaded file
                            $utilisateur->setImagePath('uploads/images/' . $newFileName);
                
            }
            $utilisateurRepository->save($utilisateur, true);
            return $this->redirectToRoute('app_utilisateur_showProfile', ['id' => $utilisateur->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateur/editProfile.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $utilisateurRepository->remove($utilisateur, true);
        }

        return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
    }

    
}
