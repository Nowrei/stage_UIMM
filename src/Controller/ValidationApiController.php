<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidationApiController extends AbstractController
{
    

    #[Route('/validation/api', name: 'app_validation_api')]
    public function index(): Response
    {
        
        return $this->render('validation_api/index.html.twig', [
            'controller_name' => 'ValidationApiController',
        ]);
    }
    public  function ypareo_exists(string $loginEmail): bool
    {
        return true;
    }
    
}
