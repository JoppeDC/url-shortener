<?php

namespace App\Service;

use App\Entity\ShortenedUrl;
use App\Repository\ShortenedUrlRepository;

class ShortUrlService
{
    public function __construct(
        private readonly ShortenedUrlRepository $shortenedUrlRepository
    ) {
    }

    public function shortenUrl(string $url): ShortenedUrl
    {
        $shortString = $this->getUniqueShortCode();

        $shortenedUrl = new ShortenedUrl(
            $shortString,
            $url
        );

        $this->shortenedUrlRepository->save($shortenedUrl);

        return $shortenedUrl;
    }

    private function getUniqueShortCode(): string
    {
        $maxTries = 10;
        $tries = 0;

        do {
            ++$tries;
            $bytes = random_bytes(10);
            $hash = md5($bytes);

            $shortString = substr($hash, 0, 5);

            $shortenedUrl = $this->shortenedUrlRepository->findOneBy(['identifier' => $shortString]);
        } while ($tries < $maxTries && $shortenedUrl instanceof ShortenedUrl);

        if ($shortenedUrl instanceof ShortenedUrl) {
            throw new \Exception('Reached max tries');
        }

        return $shortString;
    }
}
