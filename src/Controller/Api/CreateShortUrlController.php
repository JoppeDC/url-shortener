<?php

namespace App\Controller\Api;

use App\Controller\RedirectController;
use App\Model\Api\CreateShortUrlRequest;
use App\Model\Api\CreateShortUrlResponse;
use App\Service\ShortUrlService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;

#[OA\Tag(name: 'Short URL')]
final class CreateShortUrlController extends AbstractFOSRestController
{
    #[OA\Post(
        description: 'Get short url',
        summary: 'URL Shortener'
    )]
    #[OA\Response(
        response: 200,
        description: 'Returns short url',
        content: new Model(type: CreateShortUrlResponse::class)
    )]
    #[OA\RequestBody(
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'url',
                    type: 'string'
                ),
            ],
            type: 'object'
        )
    )]
    #[Route(path: '/create', name: 'api_create_short_url', methods: [Request::METHOD_POST])]
    #[ParamConverter('shortUrlRequest', class: CreateShortUrlRequest::class, converter: 'fos_rest.request_body')]
    public function __invoke(CreateShortUrlRequest $shortUrlRequest, ShortUrlService $shortUrlService): Response
    {
        $shortenedUrl = $shortUrlService->shortenUrl($shortUrlRequest->getUrl());
        $shortUrlResponse = new CreateShortUrlResponse(
            $shortenedUrl->getTarget(),
            $this->generateUrl(RedirectController::ROUTE, ['identifier' => $shortenedUrl->getIdentifier()], UrlGenerator::ABSOLUTE_URL)
        );

        return $this->handleView($this->view($shortUrlResponse));
    }
}
