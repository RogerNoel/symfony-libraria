<?php

namespace App\Repository;

use App\Entity\Livres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Livres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livres[]    findAll()
 * @method Livres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livres::class);
    }
    // ici la requête
    public function findAllLivres(): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $listeLivres = $this->createQueryBuilder('p')
            ->where('p.type = :livre')
            ->setParameter('livre', 'livre')
            ->andWhere('p.stock > 0')
            ->orderBy('p.titre', 'ASC');

        $query = $listeLivres->getQuery();

        return $query->execute();
    }

    public function findAllBD(): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $listeLivres = $this->createQueryBuilder('p')
            ->where('p.type = :livre')
            ->setParameter('livre', 'bd')
            ->andWhere('p.stock > 0')
            ->orderBy('p.titre', 'ASC');

        $query = $listeLivres->getQuery();

        return $query->execute();
    }
}
