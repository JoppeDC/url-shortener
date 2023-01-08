<?php

namespace App\Service;

use App\Repository\ShortenedUrlRepository;

class CleanupService
{
    public function __construct(
        private readonly ShortenedUrlRepository $shortenedUrlRepository
    ) {
    }

    public function cleanup(): int
    {
        $shortenedUrlsToClean = $this->shortenedUrlRepository->findBy(['isAdmin' => false]);

        foreach ($shortenedUrlsToClean as $shortenedUrlToClean) {
            $this->shortenedUrlRepository->delete($shortenedUrlToClean);
        }

        return \count($shortenedUrlsToClean);
    }
}
