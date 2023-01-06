<?php

namespace App\Model\Api;

class CreateShortUrlResponse
{
    public function __construct(
        private string $url,
        private string $shortUrl
    ) {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    public function setShortUrl(string $shortUrl): void
    {
        $this->shortUrl = $shortUrl;
    }
}
