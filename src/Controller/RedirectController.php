<?php

namespace App\Controller;

use App\Entity\ShortenedUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
    public const ROUTE = 'redirect';

    #[Route(path: '/{identifier}', name: self::ROUTE)]
    public function __invoke(ShortenedUrl $shortenedUrl): RedirectResponse
    {
        return $this->redirect($shortenedUrl->getTarget(), 302);
    }
}
