<?php

namespace App\Controller;
use App\Entity\Certif;
use App\Form\CertifType;
use App\Repository\CertifRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Passage;

class CertifController extends AbstractController
{
    #[Route('/certif', name: 'app_certif', methods: ['GET'])]
    public function index(CertifRepository $CertifRepository, Request $request, PaginatorInterface $paginator): Response
{

    $certifQuery = $CertifRepository->createQueryBuilder('p')
        ->where('p.nom != :nom')
        ->setParameter('nom', 'nom')
        ->getQuery();

    $certif = $paginator->paginate(
        $certifQuery,
        $request->query->getInt('page', 1),
        2
    );

    return $this->render('certif/certif.html.twig', [
        'certif' => $certif,
    ]);
}

    #[Route('/certifC', name: 'app_certifCreate', methods: ['GET', 'POST'])]
    public function create(Request $request,CertifRepository $CertifRepository): Response
    {
        $certif = new Certif ();
        $form = $this ->createForm(CertifType::class,$certif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('badge')->getData();

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
                            $certif->setBadge('uploads/images/' . $newFileName);
                
            }
            $CertifRepository->save($certif, true);
            $this->addFlash(
                'info',
              ' votre certification a été creer',  
          );

            return $this->redirectToRoute('app_certif', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('certif/newCertif.html.twig', [
            'certif' => $certif,
            'form' => $form,
        ]);
    }
    #[Route('/{id}/editC', name: 'app_certif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,CertifRepository $CertifRepository, Certif $certif): Response
    {
        $form = $this ->createForm(CertifType::class,$certif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('badge')->getData();

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
                            $certif->setBadge('uploads/images/' . $newFileName);
                
            }
            $CertifRepository->save($certif, true);
            $this->addFlash(
                'info',
              ' votre certification a été modifier',  
          );

            return $this->redirectToRoute('app_certif', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('certif/editCertif.html.twig', [
            'certif' => $certif,
            'form' => $form,
        ]);
    }
    #[Route('/{id}/deleteC', name: 'app_certif_delete', methods: ['GET','POST'])]
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
    $certif = $entityManager->getRepository(Certif::class)->find($id);
    $entityManager->remove($certif);
    $entityManager->flush();
    $this->addFlash(
        'info',
      ' votre certification a été supprimer',  
  );
    
    return $this->redirectToRoute('app_certif', [], Response::HTTP_SEE_OTHER);

    }
    #[Route('/searchC', name: 'app_certif_search', methods: ['POST'])]
    public function search(Request $request)
{
    // Get the search query from the form submission
    $query = $request->request->get('query');

    // Build the Elasticsearch query
    $params = [
        'index' => 'my_index',
        'body'  => [
            'query' => [
                'match' => [
                    'title' => $query
                ]
            ]
        ]
    ];

    // Execute the Elasticsearch query
    $client = Elasticsearch\ClientBuilder::create()->build();
    $response = $client->search($params);

    // Prepare the search results for JSON encoding
    $hits = [];

    foreach ($response['hits']['hits'] as $hit) {
        $hits[] = $hit['_source'];
    }

    // Return the search results as a JSON response
    return $this->json($hits);
}

public function GetBadges(CertifRepository $CertifRepository)  
{
    $user = $this->getUser();

    // Get the badges for the current user based on their passages
    $badges = $this->getDoctrine()
        ->getRepository(Certif::class)
        ->createQueryBuilder('c')
        ->join('c.testId', 't')
        ->join('t.passage', 'p')
        ->where('p.user = :user')
        ->andWhere('p.etat = 1')
        ->setParameter('user', $user)
        ->select('c.badge')
        ->distinct()
        ->getQuery()
        ->getResult();

    return $badges;
}   

    #[Route('/Card', name: 'app_card', methods: ['GET'])]
public function showCard(CertifRepository $CertifRepository)
{
    $certifications = $CertifRepository->createQueryBuilder('c')
        ->leftJoin('c.testId', 't')
        ->getQuery()
        ->getResult();
        
        $user = $this->getUser();

        // Get the badges for the current user based on their passages
        $badges = $this->getDoctrine()
            ->getRepository(Certif::class)
            ->createQueryBuilder('c')
            ->join('c.testId', 't')
            ->join('t.passage', 'p')
            ->where('p.user = :user')
            ->andWhere('p.etat = 1')
            ->setParameter('user', $user)
            ->select('c.badge')
            ->distinct()
            ->getQuery()
            ->getResult();
       
    return $this->render('front/certifF.html.twig', [
        'card' => $certifications,
        'badges' => $badges,
    ]);
}
#[Route('/certific', name: 'app_cer', methods: ['GET'])]
public function showCertifications()
{
    $user = $this->getUser();
    $passages = $this->getDoctrine()->getRepository(Passage::class)->findBy([
        'user' => $user,
        'etat' => 1
    ]);
    $certifications = [];
    foreach ($passages as $passage) {
        $certif = $passage->getTest()->getCertif();
        if (!in_array($certif, $certifications)) {
            $certifications[] = $certif;
        }
    }
    return $this->render('front/certifications.html.twig', [
        'certifications' => $certifications,
        'users' => $user,
    ]);
}


}
