<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
    header('Access-Control-Expose-Headers: Custom-Header'); // Expose additional headers
    header('Content-Type: application/json');
    
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
        header('Access-Control-Allow-Headers: Content-Type');
        exit;
    }
    

    $updatedData = array(
        'adresse' => $_PUT["adresse"],
        'email' => $_PUT["email"],
        'nom' => $_PUT["name"],
        'tel' => $_PUT["tel"],
        // Autres données mises à jour
    );
    
    $username = "";
    $password = "651e625ab7dd7342570153";
    
    $apiUrl = "https://evaluation-technique.lundimatin.biz/api/clients/" . $_PUT["id"];
    
    error_log($_PUT["id"]);

    $ch = curl_init($apiUrl);
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($updatedData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode($username . ':' . $password)
    ));

    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
        exit();
    }

    curl_close($ch);

    $responseArray = json_decode($response, true);
    
    if ($responseArray !== null) {
        // Afficher les données de la réponse
        echo json_encode($responseArray);
    } else {
        // La réponse JSON n'a pas pu être décodée
        echo 'Erreur lors du décodage JSON.';
    }
?>