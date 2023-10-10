<?php

if(isset($_POST['buy_data'])){

// variable declarations
$network = $_POST['network'];
$phone = $_POST['mobile_number'];
$plan = $_POST['plan'];
$amount = $_POST['amount'];// for later
$type = $_POST['data_type'];// for later


$data = array(
    "network"=>$network,
    "mobile_number"=>"$phone",
    "plan"=>$plan,
    "Ported_number"=>true

);

// $data = array(
//     "network"=>$network,
//     "plan"=>$plan,
//     "data_type"=>"$type",
//     "mobile_number"=>"$phone",
//     "plan_amount"=>$amount,
//     "Ported_number"=>true,

//   );

$data = json_encode($data);

// {"network":network_id,
//     "mobile_number": "09095263835",
//     "plan": plan_id,
//     "Ported_number":true,
//     "payment_medium" : payment_medium // NOTE: This field/parameter is optional, It is mainly for those that wants to use Data wallet.... Mediums are \'MAIN WALLET\' or \'MTN SME DATA BALANCE\' or \'MTN CG DATA BALANCE\' or \'AIRTEL CG DATA BALANCE\'
//     }

$curl = curl_init();

// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.gladtidingsdata.com/api/data/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token 52042eba3f89944b8e5f0985d5025918a7c87e82',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


}