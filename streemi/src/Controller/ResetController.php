<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ResetController extends AbstractController
{
    #[Route('/reset', name: 'app_reset')]
    public function reset(): Response
    {
        return $this->render('login/reset.html.twig');
    }
}
