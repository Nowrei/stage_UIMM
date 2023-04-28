<?php

namespace App\Controller;

use App\Form\FormulaireType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        $form=$this->createForm(FormulaireType::class);
        return $this->renderForm('test/index.html.twig', [
            'controller_name' => 'TestController',
            'formulaire' => $form
        ]);
    }
}
