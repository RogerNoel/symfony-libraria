<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientInscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $client = new Clients();
        $client->setEmail("");
        $client->setNom("");
        $client->setPrenom("");
        $client->setAdresse("");
        $client->setNumero("");
        $client->setCodepostal("");
        $client->setVille("");
        $client->setProvince("");
        $client->setPays("");
        $client->setMdp("");

        $form = $this->createForm(ClientInscriptionType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($client, $client->getMdp());
            $client->setMdp($hash);
            $client = $form->getData();
    
            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->persist($client);
            $entityManager->flush();
    
            return $this->redirectToRoute('panier');
        }

            return $this->render("inscription/index.html.twig", [
                'form' => $form->createView()],
            );
    }
}
