<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormCompleteController extends AbstractController
{
    #[Route('/form/complete', name: 'app_form_complete')]
    public function index(): Response
    {
        return $this->render('form_complete/index.html.twig', [
            'controller_name' => 'FormCompleteController',
        ]);
    }
}
