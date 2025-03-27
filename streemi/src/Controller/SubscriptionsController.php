<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class SubscriptionsController extends AbstractController
{
    #[Route('/subscriptions', name: 'app_subscriptions')]
    public function subscriptions(): Response
    {
        return $this->render('Subscriptions.html.twig');
    }
}
