<?php

namespace App\Repository;

use App\Entity\Authtoken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Authtoken|null find($id, $lockMode = null, $lockVersion = null)
 * @method Authtoken|null findOneBy(array $criteria, array $orderBy = null)
 * @method Authtoken[]    findAll()
 * @method Authtoken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthtokenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Authtoken::class);
    }

}