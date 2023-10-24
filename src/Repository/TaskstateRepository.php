<?php

namespace App\Repository;

use App\Entity\Taskstate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Taskstate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taskstate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taskstate[]    findAll()
 * @method Taskstate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskstateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taskstate::class);
    }

}