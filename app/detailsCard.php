<?php

$slug = $_GET['slug'];


$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 17|rRMO05q3HMyZcdCF7zGX586aW7sNSPvrDD9ytYut'  
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    
    $product = json_decode($response)->data;
    


?>