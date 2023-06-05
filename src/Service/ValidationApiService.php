<?php

namespace App\Service;

use App\Entity\User;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class ValidationApiService extends AbstractController
{

    protected $customParam;
    protected $customUrl;

    protected $customFilePays;

    protected $entityManager;

    protected $temp_file;

    
    
    public function __construct2( $customParam, $customUrl, $customFilePays ) 
    {
        $this->customUrl=$customUrl;
        $this->customParam = $customParam;
        $this->customFilePays= $customFilePays;
        
        //dd($customParam);
    }




    public function __construct( $customParam, $customUrl, $customFilePays , EntityManagerInterface $entityManager ) 
    {
        $this->customUrl=$customUrl;
        $this->customParam = $customParam;
        $this->customFilePays= $customFilePays;
        $this->entityManager= $entityManager;
        //dd($customParam);
    }


    public function getTempFile() {
        return $this->temp_file;
    }



    public function getToken() {
        //$projectDir = $this->getParameter('app.custom_param');
        return $this->customParam;
    }

    public function getUrl() {
        //$projectDir = $this->getParameter('app.custom_param');
        return $this->customUrl;
    }

    public function getFilePays() {
        //$projectDir = $this->getParameter('app.custom_param');
        return $this->customFilePays;
    }

    // config/packages/doctrine.php


    public function apiGetListPays():array{

                
        try {
            
            $baseUrl = $this->customUrl ;
            $jeton = $this->customParam;
      
    
            $url = $baseUrl . "/r/v1/pays";
    
    
            // options de la session
            $options = [
                            CURLOPT_URL => $url,
                            CURLOPT_HTTPHEADER => [
                                "X-Auth-Token: " . $jeton,
                                "Content-Type: application/json"
                            ],
                            CURLOPT_RETURNTRANSFER => true
                        ];
    
            // initialisation de la session
            $ch = curl_init();
    
            // configuration de la session
            curl_setopt_array($ch, $options);
    
            // exécution de la requête
            $response = curl_exec($ch);
            //echo $response;
    
            // fermeture de la session
            curl_close($ch);
    
            // affiche les données au format tableau
            $data = json_decode($response, true);
            Array($data);
         
        }
        catch (Exception $e) {
        echo $e;
    }
    
    echo "liste des pays <br>";
        return $data;
    }



    public function apiGetIdPays(string $pays):array{    
        try {

            $baseUrl = $this->customUrl;  //les test fontionnent dans http et pas dans https
            $jeton = $this->customParam;
    
            $url = $baseUrl . "/r/v1/pays";
    
            $options = [
                            CURLOPT_URL => $url,
                            CURLOPT_HTTPHEADER => [
                                "X-Auth-Token: " . $jeton,
                                "Content-Type: application/json"
                            ],
                            CURLOPT_RETURNTRANSFER => true
                        ];
    
            $ch = curl_init();
            curl_setopt_array($ch, $options);
            $response = curl_exec($ch);
            curl_close($ch);

            $data = json_decode($response, true);
            Array($data);
            //var_dump($data);
            //dd($data);
            //die;
            
        }
        catch (Exception $e) {
        echo $e;
    }
    
    echo "liste des pays <br>";
    //trouver pays dans l' array reçu 
    
    // remplacer le text dans valeurcherche avec ceci "$pays"
    
    $valeurCherche=$pays;
    //$valeurCherche="GUINE";
    echo "pays : ".$valeurCherche."<br>";
    $exito=0;
    $arrayPays=array("code","pays");

    foreach ($data as $d){

        if ($d["nomPays"]!=null){
            
                $cadena_de_texto = $d["nomPays"];         //'Esta es la frase donde haremos la búsqueda';
                $cadena_buscada   = $valeurCherche;
                $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                
                //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                if ($posicion_coincidencia !== false) {
                    array_push($arrayPays,$d["codePays"],$d["nomPays"]);
                    echo " ".$d["codePays"]."-".$d["nomPays"]."<br>";
                    $exito=1;
                    }                
                //echo $d["nomPays"];
                //var_dump($d);           
        }
    }
    if($exito===0){echo "il n y a pas des resultats pour le pays rentre!!!!";}
    print_r($arrayPays);
    //$a=array("red","green");
    return $arrayPays;

    }

    public function apiDownload(string $urlapi, string $file):bool{
        //se connecter a la API
        try {

            $baseUrl = $this->customUrl;  //les test fontionnent dans http et pas dans https
            $jeton = $this->customParam;
            
            $url = $baseUrl . $urlapi;
            // options de la session
            $options = [
                            CURLOPT_URL => $url,
                            CURLOPT_HTTPHEADER => [
                                "X-Auth-Token: " . $jeton,
                                "Content-Type: application/json"
                            ],
                            CURLOPT_RETURNTRANSFER => true
                        ];
            $ch = curl_init();
            curl_setopt_array($ch, $options);
            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response, true);
            Array($data);
            //var_dump($data);
            //dd($data);
            //die; 
        }
        catch (Exception $e) {
        echo $e;
        }
        //creer des fichiers avec les resultats
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $stat=fwrite($myfile,$response  ); 
        fclose($myfile);

        return $stat;
    }



    public function apiWrCandidat( $candidat, $url2):string{
        //ce methode reçoit un array candidat avec les donnees a sauvegarder, un url de la API pour envoiyer les donnees et 
        // il retourne un numero que corresponde a l'ID du candidat dans YPAREO

        $data=$candidat;

   //**************************************************************************************get request  */         
            try {

                $baseUrl = $this->customUrl;  //les test fontionnent dans http et pas dans https
                $jeton = $this->customParam;
                $urlapi=$url2;                                   
                
                $url = $baseUrl . $urlapi;
                // options de la session

//********************************************************************************************* post request */
            
            // URL of the API that is to be invoked and data POSTed

            // request data that is going to be sent as POST to API


            // encoding the request data as JSON which will be sent in POST
            $encodedData = json_encode($data);

            // initiate curl with the url to send request
            $curl = curl_init($url);

            // return CURL response
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            // Send request data using POST method
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

            // Data conent-type is sent as JSON
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'X-Auth-Token: ' . $jeton,
                'Content-Type:application/json'
            ));
            curl_setopt($curl, CURLOPT_POST, true);

            // Curl POST the JSON data to send the request
            curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);

            // execute the curl POST request and send data
            $result = curl_exec($curl);
            curl_close($curl);

            // if required print the curl response
            
        }
        catch (Exception $e) {
        echo $e;
        }

        return $result;
    }


    public function check_wrCandidat(): bool
    {

        //faire la connexion avec la bdd
        
        $users = $this->entityManager -> getRepository (User::class); //users montre lutilisateur actuel
        //echo $users->
        //dd($users);
        

        //chercher si il y a des valeurs qui nont pas ete envoyes sur ypareo  et les ajouter dans un array darrays candidats
        $notsentuser=$users->findBy(['token' => null]); //touts les utilisateurs que sont pas envoyes sur ypareo 

        //parcourir larray et envoyer les candidats sur ypareo
        foreach ($notsentuser as $u){

        
            //dd($u);


            $candidat=array();
            //array avec donnees remplis dans la bdd et a envoyer a ypareo
            $candidat['codeCiviliteApprenant'] 	= $u->getCodeCiviliteApprenant();
            $candidat['nomApprenant'] 			= $u->getNomApprenant();
            $candidat['nomJf'] 					= $u->getNomJf();
            $candidat['prenomApprenant'] 		= $u->getPrenomApprenant();
            $candidat['dateNaissance'] 			= $u->getdateNaissance();
            $candidat['tel1Appr'] 				= $u->gettel1Appr();
            $candidat['tel2Appr'] 				= $u->gettel2Appr();
            $candidat['emailAppr'] 				= $u->getemailAppr();
            $candidat['adresse1Appr'] 			= $u->getadresse1Appr();
            $candidat['adresse2Appr'] 			= $u->getadresse2Appr();
            $candidat['cpAppr'] 				= $u->getcpAppr();
            $candidat['villeAppr'] 				= $u->getvilleAppr();
            $candidat['lieuNaissance'] 			= $u->getlieuNaissance();
            $candidat['idPays'] 				= $u->getidPays();
            $candidat['paysNaissance'] 			= $u->getpaysNaissance();
            $candidat['idNationalite'] 			= $u->getidNationalite();
            $candidat['departementNaissance'] 	= $u->getdepartementNaissance();
            $candidat['idFormationSouhait1'] 	= $u->getidFormationSouhait1();
            $candidat['dernierDiplome '] 		= $u->getdernierDiplome();
            $candidat['niveauQualification'] 	= $u->getniveauQualification();

            $candidat['dateObtention'] 			= date_format($u->getdateObtention(),"d/m/Y");

            $candidat['dernierMetier'] 			= $u->getdernierMetier();
            $candidat['dureeExperience'] 		= $u->getdureeExperience();
            $candidat['entrepriseExperience'] 	= $u->getentrepriseExperience();
            $candidat['niveauRemuneration'] 	= $u->getniveauRemuneration();

            $candidat['statut'] 				= $u->getstatut();
            $candidat['statutSalarie'] 			= $u->getstatutSalarie();
            $candidat['statutCommentaire'] 		= $u->getstatutCommentaire();
            $candidat['entrepriseSalarie'] 		= $u->getentrepriseSalarie();
            $candidat['adresseEntreprise']  	= $u->getadresseEntreprise();
            $candidat['villeEntreprise'] 		= $u->getvilleEntreprise();
            $candidat['cpEntreprise'] 			= $u->getcpEntreprise();
            $candidat['nomTuteur'] 				= $u->getnomTuteur();
            $candidat['prenomTuteur'] 			= $u->getprenomTuteur();
            $candidat['adresseMaillTuteur'] 	= $u->getadresseMaillTuteur();
            $candidat['telephoneTuteur'] 		= $u->gettelephoneTuteur();

            $candidat["idSite"] = "3071";
            //$candidat["idFormationSouhait1"] = "3911164";    
            $candidat["observation"] = "Ce candidat a ete cree a partir de l'interface FCDE";  


            $resultado=$this->apiWrCandidat ($candidat, '/r/v1/preinscription/candidat');
            echo "reponse: ".$resultado;
            echo "<br>";

            if (strlen($resultado)<7 &&  is_numeric($resultado)){ //si la reponse est du 6 o moins characteres et une chiffre ça veut dire que lAPI a retourne un identifiant valable
                //alors on va le sauvegarder dans la bdd

                //ecrire la reponse de l API dans la bdd
                $u->setToken($resultado);
                $this->entityManager->persist($u);
                // actually executes the queries (i.e. the INSERT query)
                $this->entityManager->flush();

            }else{  //on va sauvegarder la reponse dans un fichier dans le dossier temporaire

                $temp_file = tempnam(sys_get_temp_dir(), 'YpareoAPIreponse');
                $this->temp_file=$temp_file;

                $myfile = fopen($temp_file, "w") or die("Unable to open file!");
                $stat=fwrite($myfile,$resultado." user: ".$u->getemail()." idSite: ".$candidat["idSite"]." FormationSouhaite: ".$candidat["idFormationSouhait1"] ."Regardez la base de donnees pour plus d'information" ); 

                fclose($myfile);
                return false;
            
            }

        }

        return true;
    }





    public function ypareo_exists(string $loginEmail): bool
    {
        $emailYpareo="";
        $emailFormulaire=$loginEmail;

        
        try {
                $baseUrl = $this->customUrl;  //les test fontionnent dans http et pas dans https
                $jeton = $this->customParam;
        
                // REQUÊTE CONSULTATION
                $url = $baseUrl . "/";
    
                // options de la session
                $options = [
                                CURLOPT_URL => $url,
                                CURLOPT_HTTPHEADER => [
                                    "X-Auth-Token: " . $jeton,
                                    "Content-Type: application/json"
                                ],
                                CURLOPT_RETURNTRANSFER => true
                            ];
        
                // initialisation de la session
                $ch = curl_init();
        
                // configuration de la session
                curl_setopt_array($ch, $options);
        
                // exécution de la requête
                $response = curl_exec($ch);
                echo $response;
        
                // fermeture de la session
                curl_close($ch);
        
                // affiche les données au format tableau
                $data = json_decode($response, true);
                Array($data);
                var_dump($data);
            }
            catch (Exception $e) {
            echo $e;
        }
        
        echo "email search <br>";
        //trouver email de l'apprenant dans l' array reçu 
        
        // remplacer le text dans valeurcherche avec ceci "emailAppr"
        
        $valeurCherche="owner_id";
        
        $arrayEmail=array($valeurCherche=>"");
        $result=array_intersect_key($data,$arrayEmail);
        //print_r($result);
        echo 'valeur cherché: '.$valeurCherche.'<br> result: '.$result[$valeurCherche];
        echo "<br>";
       $emailYpareo=$result[$valeurCherche];
    
       

        if ($emailFormulaire===$emailYpareo){
            return true;
        }else{
            return false;
        }
        
    }

}
