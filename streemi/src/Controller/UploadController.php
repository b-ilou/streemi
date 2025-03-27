<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class UploadController extends AbstractController
{
    #[Route('/upload', name: 'app_upload')]
    public function upload(): Response
    {
        return $this->render('admin/upload.html.twig');
    }
}
