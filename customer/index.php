<?php

// les headers afin de paliers les cors
header('Access-Control-Allow-Origin: *');
// FICHIER POUR RÉCUPERER QU UN SEUL UTILISATEUR SELON L'ID

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

$apiBaseUrl = "https://evaluation-technique.lundimatin.biz/api/clients/";

$ch = curl_init($apiUrl = $apiBaseUrl . $_GET['id']);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// L'authorization avec le token
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic ' . base64_encode($username . ':' . $password)
));

header('Content-Type: application/json');

$response = curl_exec($ch);

// Vérifier les erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

// Fermer la session cURL
curl_close($ch);

// Traiter la réponse
echo $response;

?>