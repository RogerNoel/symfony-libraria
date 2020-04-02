<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientInscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function new()
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
        // dd($form);
            return $this->render("inscription/index.html.twig", [
                'form' => $form->createView()],
            );
    }
}
