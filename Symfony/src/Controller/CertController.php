<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Repository\CertifRepository;
use App\Entity\Certif;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class CertController extends AbstractController
{
    #[Route('/cert', name: 'certif_show')]
public function show(): JsonResponse
{
    $cer = $this->getDoctrine()->getManager()->getRepository( Certif::class)->findAll();
    $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize($cer, null, ['attributes' => ['id', 'nom', 'descrip', 'badge']]);
    return new JsonResponse($formatted);
}
#[Route('/certAdd', name: 'certif_add')]
public function add(Request $request): JsonResponse
{
    $certif = new Certif();
    $nom = $request->query->get("nom");
    $descrip = $request->query->get("descrip");
    $badge = $request->query->get("badge");
    $cer = $this->getDoctrine()->getManager();
    $certif->setNom($nom);
    $certif->setDescrip($descrip);
    $certif->setBadge($badge);
    $cer->persist($certif);
    $cer->flush();
    $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize($certif);
    return new JsonResponse($formatted);
}
#[Route('/certUpd', name: 'certif_upd')]
public function upd(Request $request): JsonResponse
{
    $cer = $this->getDoctrine()->getManager();
    $certif = $this->getDoctrine()->getManager()->getRepository(Certif::class)->find($request->get("id"));
    
    $certif->setNom($request->get("nom"));
    $certif->setDescrip($request->get("descrip"));
    $certif->setBadge($request->get("badge"));
    $cer->persist($certif);
    $cer->flush();
    $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize($certif);
    return new JsonResponse("certif modifier avec succees");
}
#[Route('/certDel', name: 'certif_del')]
public function del(Request $request): JsonResponse
{
    $id = $request->get("id");
    $cer = $this->getDoctrine()->getManager();
    $certif = $this->getDoctrine()->getManager()->getRepository(Certif::class)->find($id);
    if($certif != null){
        $cer->remove($certif);
        $cer->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize(data:"certif supprimer");
    return new JsonResponse($formatted);
    }
    return new JsonResponse("id invalide");
}

}
