<?php

namespace App\Controller;

use App\Form\FormulaireType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormulaireYpareoController extends AbstractController
{
    #[Route('/formulaire/ypareo', name: 'app_formulaire_ypareo')]
    public function index(): Response
    {
        $form=$this->createForm(FormulaireType::class);
        return $this->renderForm('formulaire_ypareo/index.html.twig', [
            'controller_name' => 'FormulaireYpareoController',
            'formulaire' => $form
        ]);
    }
}
