<?php

namespace App\Repository;

use App\Entity\Players;
use App\Interface\PlayersRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Players>
 */
class PlayersRepository extends ServiceEntityRepository implements PlayersRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Players::class);
    }

    public function findBySearchQueryBuilder(?string $query, array $filters =  []): QueryBuilder
    {
        $qb = $this->createQueryBuilder('p');

        if ($query) {
            $qb->orWhere('p.name LIKE :name')
                ->setParameter('name', '%' . $query . '%')
                ->orWhere('p.team.name LIKE :team_name')
                ->setParameter('team_name', '%' . $query . '%');;
        }

        if (isset($filters['position'])) {
            $qb->orWhere('p.position LIKE :position')
                ->setParameter('position', '%' . $filters['position'] . '%');
        }

        $qb->orderBy('p.name', 'ASC');

        return $qb;
    }
}
