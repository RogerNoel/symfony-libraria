<?php

namespace App\Services\Panier;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\LivresRepository;

class PanierServices {

    // On a besoin aussi de $session ici. Il faut pouvoir y accéder. On ne peut pas la demander dans les fonctions de PanierServices.php elles-memes car:
    // on ne peut se faire injecter des datas par le conteneur de services que:
        // - dans les fonctions du contrôleur ou
        // - dans la classe elle-même, car ce PanierServices, c'est le conteneur de services qui va l'instancier, via un constructeur.

    protected $session;
    protected $livresRepository;

    public function __construct(SessionInterface $session, LivresRepository $livresRepository)
    {
        $this->session = $session;
        $this->livresRepository = $livresRepository;
    }
    //  --------------------------------- 

    public function ajouterAuPanier(int $id){
        $panier = $this->session->get('panier', []);
        $panier[$id] = 1; // assigns quantity 1 to the product whose id is in parameter in the cart 
        // -> this assumes that each second-hand book max stock = 1
        // panier is updated now but not yet in the session, the next lines does this
        $this->session->set('panier', $panier); // param 1 = session cart, param 2 = updated cart
    }

    public function retirerDuPanier(int $id){
        $panier = $this->session->get('panier', []);
        if ($panier[$id]) {
            unset($panier[$id]);
        }

        $this->session->set('panier', $panier);
    }

    public function getPanierDatas() : array {
        $panier = $this->session->get('panier', []); // looks for any 'panier' data in the session, if not any -> create an empty array (like an empty cart at the store entrance!)
        // at this point, if "panier" exists, it only contains the id of the book and the desired quantity as key=>value id=>quantity
        // We need the other book's datas to complete cart display for consumer: title, author, price ... ->
        $livresDatas = [];
        foreach ($panier as $id=>$quantity){
            $livresDatas[] = [
                "livre" => $this->livresRepository->find($id), // get all book datas from the book repository
                "quantite" => $quantity // get the quantity already stored as a value in $panier
            ];
        }

        return $livresDatas;
    }

    public function prixTotal() : float {
        $prixTotal = 0;
        $livresDatas = $this->getPanierDatas();
        foreach ($livresDatas as $item) {
            $prixParItem = $item['livre']->getPrix() * $item['quantite']; // actuellement, la quantité est toujours 1 mais ça pourrait changer
            $prixTotal +=   $prixParItem;
        }

        return $prixTotal;
    }
}