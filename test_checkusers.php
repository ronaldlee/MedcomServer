<?php
echo "A\n";
// The data to send to the API
$phones = array();
$phones[] = "123456";
$phones[] = "67890";
$phones[] = "999999";

$phones2 = array();
$phones2[] = "4567890";
$phones2[] = "88888";

$contact_users=array();
$contact_users[] = array(
    'name' => 'Ronald',
    'phones' => $phones
);

$contact_users[] = array(
    'name' => 'Ricky',
    'phones' => $phones2
);



// Setup cURL
$ch = curl_init('http://localhost:6699/checkUsersByContacts');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($contact_users)
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
