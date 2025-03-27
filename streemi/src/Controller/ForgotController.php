<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ForgotController extends AbstractController
{
    #[Route('/forgot', name: 'app_forgot')]
    public function forgot(): Response
    {
        return $this->render('login/forgot.html.twig');
    }
}
