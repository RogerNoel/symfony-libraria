<?php

namespace App\Controller;

use App\Entity\Clients;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function new(Request $request)
    {
        $client = new Clients();
        $client->setEmail("Entrez E-mail");
        $client->setNom("Votre nom");
        $client->setPrenom("le prénom");
        $client->setAdresse("rue pingouin");
        $client->setNumero("entrez le 48");
        $client->setCodepostal("ici le CP");
        $client->setVille("où ta bite ?");
        $client->setProvince("encoder province");
        $client->setPays("Bougnoulie Intérieure");
        $client->setMdp("pwet pwet");

        $form = $this->createFormBuilder($client)
            ->add("email", TextType::class)
            ->add("nom", TextType::class)
            ->add("prenom", TextType::class)
            ->add("adresse", TextType::class)
            ->add("numero", TextType::class)
            ->add("codepostal", TextType::class)
            ->add("ville", TextType::class)
            ->add("province", TextType::class)
            ->add("pays", TextType::class)
            ->add("mdp", TextType::class)
            ->add("save", SubmitType::class, ["label"=>"Soumettre"])
            ->getForm();

            // $form->handleRequest($request);
            // if ($form->isValid()) {
                
            //     // $data is now changed with the user input
            //     // Do something with the data
            // }
            
            return $this->render("inscription/index.html.twig", array(
                'form' => $form->createView(),
                // ...
            ));
    }
}
