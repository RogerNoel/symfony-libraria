<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientInscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function new(Request $request)
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
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $client = $form->getData();
    
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
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
