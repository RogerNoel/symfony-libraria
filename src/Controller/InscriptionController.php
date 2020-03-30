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
        // dd($request);
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

        $form = $this->createFormBuilder($client)
            ->add("email", TextType::class, ["label"=>"Votre E-mail"])
            ->add("nom", TextType::class, ["label"=>"Votre nom"])
            ->add("prenom", TextType::class, ["label"=>"Votre prénom"])
            ->add("adresse", TextType::class, ["label"=>"Votre adresse"])
            ->add("numero", TextType::class, ["label"=>"numéro de maison"])
            ->add("codepostal", TextType::class, ["label"=>"Code postal"])
            ->add("ville", TextType::class, ["label"=>"Votre ville"])
            ->add("province", TextType::class, ["label"=>"Province"])
            ->add("pays", TextType::class, ["label"=>"Pays"])
            ->add("mdp", TextType::class, ["label"=>"Mot de passe"])
            ->add("save", SubmitType::class, ["label"=>"Soumettre"])
            ->getForm();

            // https://riptutorial.com/symfony-forms/example/15519/create-a-simple-form-in-a-controller
            
            return $this->render("inscription/index.html.twig", [
                'form' => $form->createView()],
            );
    }
}
