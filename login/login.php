<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title></title>
</head>
<body>
    
<?php


include_once "../model/server.php";
// $conn = mysqli_connect("localhost", "root", "", "bitmo");


if(isset($_POST['btn_login'])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username=?";
    $st = $conn->prepare($sql);
    $st->bind_param('s', $username);
    // $result = mysqli_query($conn, $sql);

    if($st->execute()){
        $result = $st->get_result();
        $row = $result->num_rows;
        if($row>0){
            $data = $result->fetch_assoc();
            $db_pass = $data['password'];

            if(password_verify($password, $db_pass)){
                session_start();
                $_SESSION['username'] = $username;
                echo "<script>
                swal.fire('Success', 'Logged In Successfully..', 'success')
                .then(function(result){if(result){window.location = '../dashboard'}});
            </script>";
            
            }else{
                echo "<script>
                swal.fire('Error!', 'Invalid Password Entered', 'error')
                .then(function(result){if(result){window.location = './'}});
            </script>";
            }
        }else{
            echo "<script>
            swal.fire('Error!', 'User Not Found!', 'error')
            .then(function(result){if(result){window.location = './'}});
        </script>";
        }
    }

}

?>

</body>
</html>
