<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormulaireType;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FormulaireController extends AbstractController
{
    #[Route('/formulaire', name: 'app_formulaire')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserFormType::class);//, $this->getUser()

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            //$task = $form->get('nom');

            //***********  ecrire toutes les donnees dans la base de donnees  */

            //$this->getUser()->setNomApprenant( $task['nom']);

            //$request->request->get('email', '');
           

            dd($task);
            //dd($task['nom']);
            die;

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('task_success');
        }



        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'formulaire' => $form
        ]);
    }
}
