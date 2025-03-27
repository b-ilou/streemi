<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DiscoverController extends AbstractController
{
    #[Route('/discover', name: 'app_discover')]
    public function discover(): Response
    {
        return $this->render('discover.html.twig');
    }
}
