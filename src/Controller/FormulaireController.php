<?php

namespace App\Controller;

use DateTime;
use App\Form\UserFormType;
use App\Service\ValidationApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FormulaireController extends AbstractController
{

    public function __construct( private ValidationApiService $validationApiService)
    {
    }

    #[Route('/formulaire', name: 'app_formulaire')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user=$this->getUser();
        if(!$user){
            return $this->redirectToRoute('app_login');
        }
        
        /************************************************ */
        //lire les API et stocker les resultats local pour montrer dans le formulaire

        //le fichier pays.txt existe?
        $file = $this->validationApiService->getFilePays(); //le valeur du route du fichier pays est recupere depuis le service
        //$file="c://data//pays.txt";


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
        
        $form = $this->createForm(UserFormType::class, $user);
        /***////////////////////////Lire les pays de l'Api********************* */ */

        //  $pays = $this->validationApiService->apiGetListPays();
  
        // $choices = [];
        // foreach ($pays as $paysData) {
        //     $nomPays = $paysData['nomPays'];
        //     $codePays = $paysData['codePays'];
        //     $choices[$nomPays] = $codePays;
        // }

          /***////////////////////////Lire les pays depuis le fichier********************* */ */

              
              $myfile = fopen($file, "r") or die("Unable to open file!");
              $content=fread($myfile,filesize($file)  ); 
              fclose($myfile);
      
              $content = json_decode($content, true); // Convertit la chaîne JSON en tableau associatif
              $pays = $content;

              $choices = [];
              foreach ($pays as $paysData) {
                  $nomPays = $paysData['nomPays'];
                  $codePays = $paysData['codePays'];
                  $choices[$nomPays] = $codePays;
              }

      
            

        $form = $this->createForm(UserFormType::class, $user)
            ->add('paysNaissance', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Choissisez votre pays de naissance',
                'required' => true,
                'choices' => [
                    
                    $choices],
                'attr' => [
                    'class' => 'appearance-none py-1 px-2 w-10 bg-white rounded-lg',
                ],
                'empty_data' => '', 
            ]);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$dataForm` variable has also been updated
            $dataForm = $form->getData();


            //***********  ecrire toutes les donnees dans la base de donnees  */
            if(!$user->getId()){
                $entityManager->persist($dataForm);
            }
            $entityManager->flush();


            //**************  ecrire dans api */
            
            //creation du array candidat pour envoyer sur API **************************************
            $candidat=array();
            foreach ($form as $f ){
                //echo $f->getName()." ";
                //echo $f->getViewData()." ";
                //echo "<br>";
                $key=$f->getName();
                $data=$f->getViewData();
                if ($data===""){      $data=null;  }
                if($key==="idPays" ){  $data=1;  }
                if($key==="codeCiviliteApprenant" && $data==="1"){  $data=1;  }
                if($key==="codeCiviliteApprenant" && $data==="2"){  $data=2;  }

                if ($key ==="dateObtention" || $key ==="dernierDiplome"||
                    $key==="niveauQualification" ||
                    $key==="dejaExperience" ||
                    $key==="dernierMetier" ||
                    $key==="dureeExperience" ||
                    $key==="entrepriseExperience" ||
                    $key==="niveauRemuneration" ||
                    $key==="salarie" ||
                    $key==="statut" ||
                    $key==="statutSalarie" ||
                    $key==="statutCommentaire" ||
                    $key==="entrepriseSalarie" ||
                    $key==="adresseEntreprise" ||
                    $key==="villeEntreprise" ||
                    $key==="cpEntreprise" ||
                    $key==="nomTuteur" ||
                    $key==="prenomTuteur" ||
                    $key==="adresseMaillTuteur" ||
                    $key==="telephoneTuteur" ) 
                {
                }else{
                    $candidat[$f->getName()] = $data;  //array avec donnees remplis dans le formulaire et a envoyer a ypareo
                    //echo $key;
                    //echo $data;
                    //echo "<br>";
                }
            }
            $candidat["idSite"] = "3071";
            $candidat["idFormationSouhait1"] = "3911164";
            //$candidat["idNationalite"] = "0";    
            $candidat["observation"] = "Ce candidat a ete cree a partir de l'interface FCDE";    

            /*
            $encodedData = json_encode($candidat);
            echo ($encodedData);
            echo "<br>";
            */

            //si lutilisateur est loggue  et le champ token dans la base de donnees est vide on envoi le candidat a la aPI
            $idAPI = $user -> getToken();//on voit si lutilisateur a ete deja envoyé sur ypareo

            if($user->getId() && $idAPI===null  ){
                $resultado=$this->validationApiService -> apiWrCandidat ($candidat, '/r/v1/preinscription/candidat');
                //echo $resultado;
                $user->setToken($resultado);
                $entityManager->persist($user);
                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
            }
            
            // $resultado=$this->validationApiService -> apiGetIdPays("GUINE");
            //$request->request->get('email', '');

            return $this->redirectToRoute('app_form_complete');
        }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'formulaire' => $form
        ]);
    }

}
