<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Form\UserFormType;
use App\Form\FormulaireType;

use App\Form\PoleFormationType;

use App\Service\ValidationApiService;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FormulaireController extends AbstractController
{

    
    public function __construct( private ValidationApiService $validationApiService)
    {
    }



    #[Route('/formulaire', name: 'app_formulaire')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    //public function index(Request $request): Response
    {
        

        $user=$this->getUser();
        if(!$user){
            return $this->redirectToRoute('app_login');
        }
        
        /************************************************ */
        //lire les API et stocker les resultats local pour montrer dans le formulaire

        //le fichier pays.txt existe?
        $file="c://data//pays.txt";

        //$modifFile="c://data//modifPays.txt";
        
        if ( file_exists($file)  ){     //on valide si le fichier existe 
            

            $Now = new DateTime('now');
            echo  "aujourdhui: ".$Now->format('F d Y')." <br>";   // on prend la date daujourdhui

            if ($Now->format('F d Y') > date("F d Y", filemtime($file)) ){   //on valide si le fichier a ete deja telecharge aujourdhui
                
                $stat=$this->validationApiService -> apiDownload("/r/v1/pays",$file); //on telecharge le fichier a nouveau
                echo "fichier ".$file." existe mais pas a jour, fichier telecharge  <br>";
            }else{
                echo "fichier ".$file." existe deja  <br>";
            }
            
            
        }else{  // si le fichier pays nexiste pas on telecharge depuis lapi
            $stat=$this->validationApiService -> apiDownload("/r/v1/pays",$file);
            echo "fichier ".$file." pays cree <br>";
        }
        

        /***////////////////////////********************* */ */

        //$form = $this->createForm(UserFormType::class);
        $form = $this->createForm(UserFormType::class, $user);

        

        $form->handleRequest($request);

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


            //**************  ecrire dans api */
            
            // if(!$user->getId()){
            //     $resultado=$this->validationApiService -> apiWrCandidat ($dataForm);
            // }
            // $resultado=$this->validationApiService -> apiWrCandidat ($dataForm);
            


            // $resultado=$this->validationApiService -> apiGetIdPays("GUINE");
        
            //$this->getUser()->setNomApprenant( $dataForm['nom']);


            //$request->request->get('email', '');
           
            //dd($form->isValid(),$user->getId(), $user->getEmail(), $user->getPassword(),$user->isVerified(),$dataForm);
            //dd($dataForm);
            //dd($dataForm['nom']);
            //die;

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('app_form_complete');
        }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'formulaire' => $form
        ]);
    }

}
