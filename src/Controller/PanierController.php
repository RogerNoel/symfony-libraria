<?php

namespace App\Controller;

use App\Services\Panier\PanierServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(PanierServices $panierServices)
    {
        // $livresDatas = $panierServices->getPanierDatas();

        // $prixTotal = $panierServices->prixTotal();

        // return $this->render('panier/index.html.twig', [
        //     'items' => $livresDatas,
        //     'total' => $prixTotal
        // ]);

        return $this->render('panier/index.html.twig', [ // par rapport aux lignes mises en commentaires, on supprime les variables intermédiaires
            'items' => $panierServices->getPanierDatas(),
            'total' => $panierServices->prixTotal()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_ajouteraupanier")
     */
    public function ajouterAuPanier($id, PanierServices $panierServices){
        // le code des fonctions a été déplacé vers src/Services/Panier/panierServices.php afin de partager les fonctions partout où c'est nécessaire
        $panierServices->ajouterAuPanier($id);
        return $this->redirectToRoute('panier');
    }

    /**
     * Undocumented function
     *
     * @Route("panier/retirer/{id}", name="panier_retirerdupanier")
     */
    public function retirerDuPanier($id, PanierServices $panierServices){
        $panierServices->retirerDuPanier($id);
        return $this->redirectToRoute("panier");
    }

}
