<?php

namespace App\Model\Api;

use Symfony\Component\Validator\Constraints as Assert;

final class CreateShortUrlRequest
{
    #[Assert\Url]
    private ?string $url = null;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
