<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidationApiService extends AbstractController
{

    public  function ypareo_exists(string $loginEmail): bool
    {
        return true;
    }
    
}
