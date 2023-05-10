<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ValidationApiService extends AbstractController
{

    protected $customParam;
    protected $customUrl;



    public function __construct( $customParam, $customUrl  ) 
    {
        $this->customUrl=$customUrl;
        $this->customParam = $customParam;
        //dd($customParam);
    }


    public function getToken() {
        //$projectDir = $this->getParameter('app.custom_param');
        return $this->customParam;
    }

    public function getUrl() {
        //$projectDir = $this->getParameter('app.custom_param');
        return $this->customUrl;
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
            var_dump($data);
        }
        catch (Exception $e) {
        echo $e;
    }
    
    echo "liste des pays <br>";
        return $data;
    }



    public function apiGetIdPays(string $pays):string{    
        try {

            $baseUrl = $this->customUrl;  //les test fontionnent dans http et pas dans https
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
    
    //$valeurCherche=$pays;
    $valeurCherche=1;
    echo "pays : ".$valeurCherche;
    
    $arrayEmail=array($valeurCherche=>"");
    $result=array_intersect_key($data,$arrayEmail);
    //print_r($result);
    //echo 'Pays cherché: '.$valeurCherche.'<br> result: '.$result[$valeurCherche];
    echo "<br>";
    //echo $result[$valeurCherche];

    dd($result[$valeurCherche]);
    die;
        return $result[$valeurCherche];
    }




    public function writeCandidat(string $candidatFormulaire):bool{
        $candidat=$candidatFormulaire;

        $candidat='{
            "codeCiviliteApprenant":1,
            "codeCiviliteRepLegal":null,
            "idPays":1,
            "idPaysRepLegal":null,
            "adresse1Appr":"3 Rue du recrutement",
            "adresse1RepLegal":null,
            "adresse2Appr":null,
            "adresse2RepLegal":null,
            "adresse3Appr":null,
            "adresse3RepLegal":null,
            "adresse4Appr":null,
            "adresse4RepLegal":null,
            "cpAppr":"51100",
            "villeAppr":"REIMS",
            "cpRepLegal":null,
            "villeRepLegal":null,
            "dateNaissance":"05\/07\/2001",
            "departementNaissance":null,
            "emailAppr":"testmail@gmail.com",
            "tel1Appr":"06000000000",
            "tel2Appr":"06000000000",
            "emailRepLegal":null,
            "tel1RepLegal":null,
            "tel2RepLegal":null,
            "idAnnee":null,
            "idDiplomeObtenu":null,
            "idEtablissementOrigine":null,
            "idFormationSouhait1":"3911164",
            "idFormationSouhait2":null,
            "idFormationSouhait3":null,
            "idNationalite":"368994",
            "idOrigineScolaire":null,
            "idSite":"3071",
            "idSite2":null,
            "idSite3":null,
            "idStatut":null,
            "ineApprenant":null,
            "lieuNaissance":null,
            "paysNaissance":"FRANCE",
            "nomApprenant":"PATRICE",
            "nomJf":null,
            "nomRepLegal":null,
            "prenomApprenant":"Test",
            "prenomRepLegal":null,
            "observation":"Ce candidat a \u00e9t\u00e9 export\u00e9 depuis Hub3e \u00e9coles : https:\/\/ecoles-v2.hub3e.com",
            "idRensParam1":null,
            "idRensParam2":null,
            "idRensParam3":null,
            "obsRensParam1":null,
            "obsRensParam2":null,
            "obsRensParam3":null,
            "idSessionTestSouhait1":null,
            "idSessionTestSouhait2":null,
            "idSessionTestSouhait3":null,
            "login":"TPATRICE",
            "motDePasseTemporaire":"Qv87JfGG",
            "codeLangue":null,
            "codeNiveauLangue":null,
            "codeLangue2":null,
            "codeNiveauLangue2":null,
            "isTravailleurHandicape":0,
            "isMobile":1,
            "isPermisConduire":1,
            "isCotorep":null
            }';

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
