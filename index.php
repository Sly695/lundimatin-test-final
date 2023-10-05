<?php
// POUR RÉCUPÉRER TOUT LES UTILISATEURS
// les headers afin de paliers les cors
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Expose-Headers: Custom-Header'); // Expose additional headers
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    exit;
}

$username = "";
$password = "651e625ab7dd7342570153";

$apiUrl = "https://evaluation-technique.lundimatin.biz/api/clients/";

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// L'authorization avec le token
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic ' . base64_encode($username . ':' . $password)
));

header('Content-Type: application/json');

// Exécuter la requête cURL et récupérer la réponse
$response = curl_exec($ch);

// Vérifier les erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
    exit();
}


$responseArray = json_decode($response, true);

// Vérifier si le décodage a réussi
if ($responseArray !== null) {

    $datas = $responseArray['datas'];

    $users = array();

    // Parcourir les données et faire une requête pour chaque ID
    foreach ($datas as $data) {
        $id = $data['id'];

        $userApiUrl = "https://evaluation-technique.lundimatin.biz/api/clients/$id";

    
        $userCh = curl_init($userApiUrl);

        curl_setopt($userCh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($userCh, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . base64_encode($username . ':' . $password)
        ));
        header('Content-Type: application/json');

        $userResponse = curl_exec($userCh);

        if (curl_errno($userCh)) {
            echo "Erreur cURL pour l'ID $id : " . curl_error($userCh) . "\n";
        }

        curl_close($userCh);

        $userData = json_decode($userResponse, true);

        if ($userData !== null) {
            $users[] = $userData;
        } else {
            echo "Erreur lors du décodage JSON pour l'ID : $id\n";
        }
    }

    // Afficher le tableau des utilisateurs
    echo json_encode($users);
} else {
    echo 'Erreur lors du décodage JSON.';
}

?>
