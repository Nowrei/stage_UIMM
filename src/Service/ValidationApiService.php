<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
        $data=$candidat;
        //var_dump( $data);

   //**************************************************************************************get request  */         
            try {

                $baseUrl = $this->customUrl;  //les test fontionnent dans http et pas dans https
                $jeton = $this->customParam;
                $urlapi=$url2;                                   
                
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
    /*            $ch = curl_init();
                curl_setopt_array($ch, $options);
                $response = curl_exec($ch);
                curl_close($ch);
                $data = json_decode($response, true);
                Array($data);
         
                //dd($data);
                //die; 
            }
            catch (Exception $e) {
            echo $e;
            }
            */
//********************************************************************************************* post request */

        /*    $handle = curl_init('https://lotvx.free.beeceptor.com');

            $data = [
                'key' => 'value'
            ];

            $encodedData = json_encode($data);

            curl_setopt($handle, CURLOPT_POST, 1);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $encodedData);
            curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            $result = curl_exec($handle);
            */


                        // URL of the API that is to be invoked and data POSTed
            //$url = "http://lotvx.free.beeceptor.com";
            //$url = 'https://eot13muzw2iqeft.m.pipedream.net';

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
            print $result;
            
        }
        catch (Exception $e) {
        echo $e;
        }

        //echo $candidat;
        return $result;
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
