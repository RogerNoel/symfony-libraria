<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index()
    {
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }

    /**
     * Undocumented function
     *
     * @Route("/panier/add/{id}", name="panier_ajouteraupanier")
     */
    public function ajouterAuPanier($id, Request $request){
        // I need access to session here: HttpFoundation comp. provides objects to manipulate HTTP protocol (Req, Res, Session...)
        $session = $request->getSession(); // obtain an objet whose class implements SessionInterface
        // SessionInterface represents a "parameter bag" which e.a. adds methods to an array (add, edit ... )
        $panier = $session->get('panier', []); // looks for any 'panier' data in the session, if not any -> create an empty array (like an empty cart at the store entrance!)
        $panier[$id] = 1; // assigns quantity 1 to a product id in the cart -> this assumes that each second-hand book stock = 1
        // panier is updated now but not yet in the session, the next lines does this
        $session->set('panier', $panier); // param 1 = session cart, param 2 = updated cart
        dd($session->get('panier'));
    }

}
