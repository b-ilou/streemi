<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class AdminFilmsController extends AbstractController
{
    #[Route('/admin/films', name: 'app_admin_films')]
    public function adminFilms(): Response
    {
        return $this->render('admin/admin_films.html.twig');
    }
}
