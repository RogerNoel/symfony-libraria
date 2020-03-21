<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BDController extends AbstractController
{
    /**
     * @Route("/bd", name="bedes")
     */
    public function index()
    {
        return $this->render('bd/index.html.twig', [
            'controller_name' => 'BDController',
        ]);
    }
}
