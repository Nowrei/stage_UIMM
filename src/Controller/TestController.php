<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormulaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(ValidatorInterface $validator, EntityManagerInterface $em): Response
    {
        $user = new User;
        $user->setDepartementNaissance('chat');
        $em->persist($user);
        $violations = $validator->validate($user);
        // dd($user);

        // $form=$this->createForm(FormulaireType::class);
        return $this->renderForm('test/index.html.twig', [
            'controller_name' => 'TestController',
            // 'formulaire' => $form
            'violations' => $violations
        ]);

        
    }
}
