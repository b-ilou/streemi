<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ListsController extends AbstractController
{
    #[Route('/lists', name: 'app_lists')]
    public function lists(): Response
    {
        return $this->render('lists.html.twig');
    }
}
