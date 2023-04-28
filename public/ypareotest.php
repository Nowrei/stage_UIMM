<?php
echo 'ypareo api send <br>';
$nomApprenant="";
$prenomApprenant="";
$emailYpareo;
$emailFormulaire;

try {
        $baseUrl = "http://eot13muzw2iqeft.m.pipedream.net";  //les test fontionnent dans http et pas dans https
        $jeton = "token";

        // REQUÊTE CONSULTATION
        $url = $baseUrl . "/";

        //    example utilisation             /r/v1/rechercher/apprenants?@filtre=X&@filtre=Y
        //    example utilisation             /r/v1/rechercher/apprenants?nomApprenant=NOM&prenomApprenant=PRENOM   

        //$url = $baseUrl . "/r/v1/rechercher/apprenants?nomApprenant=".$nomApprenant."&prenomApprenant=".$prenomApprenant;


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


echo '2222 <br>';


?>
