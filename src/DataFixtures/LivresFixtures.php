<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Livres;

class LivresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $livre = new Livres();
            $livre->setTitre('Titre du livre '.$i);
            $livre->setAuteur("Auteur du livre $i");
            $livre->setAnnee(mt_rand(1800, 1999));
            $livre->setEdition('Maison Edition '. mt_rand(1,5));
            $livre->setEtat("Etat du livre $i");
            $livre->setPrix(mt_rand(9,200));
            $livre->setTheme("Theme du livre $i");
            $livre->setTags('A list of tags');
            $livre->setDescription("Description du livre $i");
            $livre->setPages(mt_rand(30,350));
            $livre->setPoids(mt_rand(300,2000));
            $livre->settype("Type du livre $i");
            $livre->setImage("http://placehold.it/200x300");
            $livre->setStock(1);
            $manager->persist($livre);
        }

        $manager->flush();
    }
}
