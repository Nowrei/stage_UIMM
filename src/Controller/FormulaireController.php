<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Form\FormulaireType;
use App\Form\PoleFormationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FormulaireController extends AbstractController
{
    #[Route('/formulaire', name: 'app_formulaire')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    //public function index(Request $request): Response
    {
        

        $user=$this->getUser();
        if(!$user){
            return $this->redirectToRoute('app_login');
        }
        
        //$form = $this->createForm(UserFormType::class);
        $form = $this->createForm(UserFormType::class, $user);
        $form1 = $this->createForm(PoleFormationType::class);
        

        $form->handleRequest($request);
        $form1->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //dd($form->isValid());
            // $form->getData() holds the submitted values
            // but, the original `$dataForm` variable has also been updated
            $dataForm = $form->getData();
            //$dataForm = $form->get('nom');

            //***********  ecrire toutes les donnees dans la base de donnees  */
            
            if(!$user->getId()){
                $entityManager->persist($dataForm);
            }
            $entityManager->flush();
/*
            $entityManager->persist($dataForm);
            $entityManager->flush();
         
*/

            //$this->getUser()->setNomApprenant( $dataForm['nom']);

            //$request->request->get('email', '');
           
            //dd($form->isValid(),$user->getId(), $user->getEmail(), $user->getPassword(),$user->isVerified(),$dataForm);
            dd($dataForm);
            //dd($dataForm['nom']);
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
