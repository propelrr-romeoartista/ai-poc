<?php

namespace App\Service;

use App\Interface\PlayersRepositoryInterface;
use App\Interface\PlayersServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;

class PlayersService implements PlayersServiceInterface
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly PlayersRepositoryInterface $playersRepositoryInterface
    )
    {
        
    }

    public function findActivePaginated(?string $query, int $page, int $size, array $filters = []): Pagerfanta
    {
        return Pagerfanta::createForCurrentPageWithMaxPerPage(
            new QueryAdapter($this->playersRepositoryInterface->findBySearchQueryBuilder(query: $query, filters: $filters)),
            $page,
            $size
        );
    }
}