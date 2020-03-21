<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivresController extends AbstractController
{
    /**
     * @Route("/livres", name="livres")
     */
    public function index()
    {
        return $this->render('livres/index.html.twig', [
            'controller_name' => 'LivresController',
        ]);
    }
}
