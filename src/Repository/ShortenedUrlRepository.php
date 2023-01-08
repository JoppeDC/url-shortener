<?php

namespace App\Repository;

use App\Entity\ShortenedUrl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class ShortenedUrlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShortenedUrl::class);
    }

    public function save(ShortenedUrl $shortenedUrl): void
    {
        $this->_em->persist($shortenedUrl);
        $this->_em->flush();
    }

    public function delete(ShortenedUrl $shortenedUrl): void
    {
        $this->_em->remove($shortenedUrl);
        $this->_em->flush();
    }
}
