<?php
echo "A\n";
// The data to send to the API
$user = array("name"=>"Dummy","phone"=>"99272819","openudid"=>"sdfnoir23on34");

// Setup cURL
$ch = curl_init('http://localhost:6699/registerUser');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($user)
));
echo "B\n";

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
echo "die\n";
    die(curl_error($ch));
}
echo "C\n";

// Decode the response
$responseData = json_decode($response, TRUE);

// Print the date from the response
echo json_encode($responseData)."\n";


?>
