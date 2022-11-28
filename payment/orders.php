<?php

$name=$_GET['name'];
$email=$_GET['email'];

$key="rzp_test_8U89o9XERb7u1H";
$token="XlvV5VT2viBSbQWcdyiBSq5N";
$url="https://api.razorpay.com/v1/orders";

$recpt = "MCA_".date('Y'.'m'.'d'.'H'.'i'.'s');

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $key.":".$token);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/json'));

$data = <<< JSON
{
  "amount": 100,
  "currency": "INR",
  "receipt": "$recpt",
  "notes": {
    "name": "$name",
    "email": "$email",
  }
}
JSON;
curl_setopt($ch, CURLOPTS_POSTFIELDS, $data);
$response = curl_exec($ch);
$decode = json_decode($response);
$orderID = $decode->id;
echo $orderID;

?>
