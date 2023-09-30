<?php
// Establish Database Connection
require('../model/server.php');
require('../includes/sendEmail.php'); //08130171357

$errors = array();//Errors array

$full_name = "";
$username = "";
$email = "";
$phone = "";
$password = "";
$password = "";

if(isset($_POST['signup'])){
    // variables declarations
    $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    // validation section
    if(empty($full_name)){
        array_push($errors, 'Full Name Required');
    } 
    
    if(empty($username)){
        array_push($errors, 'Username Required');
    } 
    
    if(empty($email)){
        array_push($errors, 'Email Required');
    }
    
    if(empty($phone)){
        array_push($errors, 'Email Required');
    }
    
    if(empty($password)){
        array_push($errors, 'Password Required');
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    if($stmt->execute()){
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $user = $row['username'];
        if($username==$user){
            array_push($errors, 'User Already Exist');
        }
    }

}

if(count($errors)===0){
    $sql = "INSERT INTO users (`full_name`, `username`, `phone`, `email`, `password`) VALUES (?,?,?,?,?)";
    $st = $conn->prepare($sql);
    $st->bind_param('sssss', $full_name, $username, $phone, $email, $password);

    if($st->execute()){
        $recieversEmail = $email;
        $subject = "Email Verification";
        $token = substr((time()*rand()),1,6);
        $body = "Hello {$full_name} your OTP code is: <b>{$token}</b>";
        if(sendEmail($sendersEmail, $sendersPassword, $recieversEmail, $subject, $body)){
            echo "<script>
            swal.fire('Done', 'Account Created Successfully, OTP sent to {$recieversEmail}', 'success')
            .then(function(result){if(result){window.location = '../verify_email'}});
        </script>";
        }
       
    }
}




?>