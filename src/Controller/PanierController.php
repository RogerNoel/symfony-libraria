<?php

namespace App\Controller;

use App\Repository\LivresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session, LivresRepository $livresRepository)
    {
        // I need access to session here: HttpFoundation\Session\SessionInterface will provide it
        // it says ( ... , I want SessionInterface and call it $session)
        // -> this was found by typing "php bin/console debug:autowiring session" in terminal
        $panier = $session->get('panier', []); // looks for any 'panier' data in the session, if not any -> create an empty array (like an empty cart at the store entrance!)
        // at this point, if "panier" exists, it only contains the id of the book and the desired quantity as key=>value id=>quantity
        // got this from ajouterAuPanier() lower
        // We need the other book's datas to complete cart display for consumer: title, author, price ... ->
        $livresDatas = [];
        foreach ($panier as $id=>$quantity){
            $livresDatas[] = [
                "livre" => $livresRepository->find($id), // get all book datas from the book repository
                "quantite" => $quantity // get the quantity already stored as a value in $panier
            ];
        }
        return $this->render('panier/index.html.twig', [
            'items' => $livresDatas,
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_ajouteraupanier")
     */
    public function ajouterAuPanier($id, SessionInterface $session){
        $panier = $session->get('panier', []);
        $panier[$id] = 1; // assigns quantity 1 to the product whose id is in parameter in the cart 
        // -> this assumes that each second-hand book max stock = 1
        // panier is updated now but not yet in the session, the next lines does this
        $session->set('panier', $panier); // param 1 = session cart, param 2 = updated cart
        return $this->redirectToRoute('panier');
    }
}
