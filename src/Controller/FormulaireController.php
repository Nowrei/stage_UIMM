<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Formations;
use App\Form\UserFormType;
use App\Form\PoleFormationType;
use App\Service\ValidationApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class FormulaireController extends AbstractController
{

    public function __construct(private ValidationApiService $validationApiService)
    {
    }

    #[Route('/formulaire', name: 'app_formulaire')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {


        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        /************************************************ */
        //lire les API et stocker les resultats local pour montrer dans le formulaire

        //le fichier pays.txt existe?

        //$file = "c://data//pays.txt";

        $file = $this->validationApiService->getFilePays(); //le valeur du route du fichier pays est recupere depuis le service
        //$file="c://data//pays.txt";



        //$modifFile="c://data//modifPays.txt";

        if (file_exists($file)) {     //on valide si le fichier existe 


            $Now = new DateTime('now');
            echo  "aujourdhui: " . $Now->format('F d Y') . " <br>";   // On prend la date d'aujourd'hui

            if ($Now->format('F d Y') > date("F d Y", filemtime($file))) {   //On valide si le fichier a déjà été telecharger aujourdhui

                $stat = $this->validationApiService->apiDownload("/r/v1/pays", $file); //On télécharge le fichier a nouveau
                echo "fichier " . $file . " existe mais pas a jour, fichier telecharge  <br>";
            } else {    
                echo "fichier " . $file . " existe deja  <br>";
            }
        } else {  // si le fichier pays nexiste pas on le télécharge depuis lapi
            $stat = $this->validationApiService->apiDownload("/r/v1/pays", $file);
            echo "fichier " . $file . " pays cree <br>";
        }

        $form = $this->createForm(UserFormType::class, $user);

        //dd($form);

//$this->validationApiService->check_wrCandidat();
//die;

        /***/ ///////////////////////Lire les pays depuis l'Api********************* */ */


        //  $pays = $this->validationApiService->apiGetListPays();

        // $choices = [];
        // foreach ($pays as $paysData) {
        //     $nomPays = $paysData['nomPays'];
        //     $codePays = $paysData['codePays'];
        //     $choices[$nomPays] = $codePays;
        // }

        /***/ ///////////////////////Lire les pays depuis le fichier********************* */ */


        $myfile = fopen($file, "r") or die("Unable to open file!");
        $content = fread($myfile, filesize($file));
        fclose($myfile);

        $content = json_decode($content, true); // Convertit la chaîne JSON en tableau associatif
        $pays = $content;

        $choices = [];
        foreach ($pays as $paysData) {
            $nomPays = ucwords(strtolower($paysData['nomPays']));
            $codePays = $paysData['codePays'];
            $choices[$nomPays] = $codePays;
        }


        $form = $this->createForm(UserFormType::class, $user, ['listePays' => $choices]);

        $form->handleRequest($request);
        // $form1 = $this->createForm(PoleFormationType::class);
        // $form1->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$dataForm` variable has also been updated
            $dataForm = $form->getData();
            //dd($dataForm);





            //***********  ecrire toutes les donnees dans la base de donnees  */

            //ecrire les relations entre user et formation dans bdd
            if($dataForm instanceOf User) {
                $cont=0;
                $codeSite="3071";
                foreach($dataForm->getFormations() as $f) {
                    $f->setUser($user);
                   
                    if ($cont===0){  
                        $codeSite = $f->getPoleFormation()->getCodeSite(); 
                        echo $codeSite;
                        $cont=1;
                    }
                    
                }
            }


            if(!$user->getId()){
                $entityManager->persist($dataForm);
                // $entityManager->persist($dataForm);
            }


           
            $validationApiService= $this->validationApiService->updateBoolExperience($user);

            $validationApiService= $this->validationApiService->updateBoolSalarie($user);


         
            $entityManager->flush();
            

            //***********  On recupere les données entrer pour la formation  */

            

            
            // $entityManager->persist($formation);
            // $entityManager->flush();

            // Récupérer l'ID de la formation nouvellement créée
            // $formationId = $formation->getId();

            // Récupérer l'objet User correspondant
            // $user = $entityManager->getRepository(User::class)->find($user);

            // Vérifier si l'utilisateur existe
            // if (!$user) {
            //     throw new \Exception('Utilisateur introuvable'); // Ou gérer l'erreur d'une autre manière
            // }

            // Mettre à jour le champ idFormationSouhaite de l'utilisateur
            $user->setIdFormationSouhait1("4079212");
          
            $entityManager->persist($user);
            $entityManager->flush();

            dd($user);
            //**************  ecrire dans api */

            
            //creation du array candidat pour envoyer sur API **************************************
            $candidat = array();
            foreach ($form as $f) {
                //echo $f->getName()." ";
                //echo $f->getViewData()." ";
                //echo "<br>";

                $key=$f->getName();
                $data=$f->getViewData();
                if ($data===""){      $data=null;  }
                if($key==="idPays" ){  $data="1";  }
                if($key==="codeCiviliteApprenant" && $data==="1"){  $data=1;  }
                if($key==="codeCiviliteApprenant" && $data==="2"){  $data=2;  }

                //if($key==="idSite" && $data===null){  $data="3071";  }
                //if($key==="idFormationSouhait1" ){  $data="4079212";  }
        

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
            

            $candidat["idSite"] = $codeSite;
            $candidat["idFormationSouhait1"] = "4079212";
            //$candidat["idNationalite"] = "0";    
            $candidat["observation"] = "Ce candidat a ete cree a partir de l'interface FCDE";

            //dd($candidat);

            /*
            $encodedData = json_encode($candidat);
            echo ($encodedData);
            echo "<br>";
            */

            //si lutilisateur est loggue  et le champ token dans la base de donnees est vide on envoi le candidat a la aPI

            $idAPI = $user->getToken(); //on voit si lutilisateur a ete deja envoyé sur ypareo
            
            if($user->getId() && $idAPI===null  ){
                $resultado=$this->validationApiService -> apiWrCandidat ($candidat, '/r/v1/preinscription/candidat');
                //echo $resultado;

                $user->setToken($resultado);
                $entityManager->persist($user);
                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
            }



            //if(!$user->getId()){
            //    $resultado=$this->validationApiService -> apiWrCandidat ($candidat,'/r/v1/preinscription/candidat');
            // }
            // $resultado=$this->validationApiService -> apiWrCandidat ($candidat,'/r/v1/preinscription/candidat');




            // $resultado=$this->validationApiService -> apiGetIdPays("GUINE");

            //$this->getUser()->setNomApprenant( $dataForm['nom']);


            //$request->request->get('email', '');

            //dd($form->isValid(),$user->getId(), $user->getEmail(), $user->getPassword(),$user->isVerified(),$dataForm);
            //dd($dataForm);
            //dd($dataForm['nom']);
            //die;

            // ... perform some action, such as saving the task to the database

            
            // $resultado=$this->validationApiService -> apiGetIdPays("GUINE");
            //$request->request->get('email', '');


            return $this->redirectToRoute('app_form_complete');
        }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'formulaire' => $form,
            // 'formulaires' => $form1
        ]);
    }
}
