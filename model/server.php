<?php
require('../includes/constants.php');

$conn = new mysqli(HOST, USER, PASS, DB);

if(!$conn){
    echo "Not connected";
}


?>