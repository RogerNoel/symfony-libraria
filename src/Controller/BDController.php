<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livres;

class BDController extends AbstractController
{
    /**
     * @Route("/bd", name="bedes")
     */
    public function index()
    {
        $bds = $this->getDoctrine()
        ->getRepository(Livres::class)
        ->findAllBD();

        return $this->render('bd/index.html.twig', [
            'controller_name' => 'BDController',
            'bds'=>$bds
        ]);
    }
}
