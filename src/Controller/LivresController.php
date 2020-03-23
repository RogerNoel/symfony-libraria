<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livres;

class LivresController extends AbstractController
{
    /**
     * @Route("/livres", name="livres")
     */
    public function index()
    {
        $livres = $this->getDoctrine()
        ->getRepository(Livres::class)
        ->findAllLivres();
        return $this->render('livres/index.html.twig', [
            'controller_name' => 'LivresController',
            'livres'=>$livres
        ]);
    }
}
