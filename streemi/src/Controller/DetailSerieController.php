<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DetailSerieController extends AbstractController
{
    #[Route('/detail/serie', name: 'app_detail_serie')]
    public function detailSerie(): Response
    {
        return $this->render('detail_serie.html.twig');
    }
}
