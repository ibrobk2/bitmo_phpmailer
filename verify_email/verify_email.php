<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
    

<?php
include "../model/server.php";


if(isset($_GET['verify'])){
    $token = $_GET['token'];


$sql = "SELECT token FROM users WHERE token=?";
$st = $conn->prepare($sql);
$st->bind_param('s', $token);
if($st->execute()){
    $result = $st->get_result();
    $row = $result->num_rows;
    if($row>0){
        $data = $result->fetch_assoc();
        $db_token = $data['token'];
    
        if($token==$db_token){
            $sql = "UPDATE users SET verified=1 WHERE token='$token'";
            $result = $conn->query($sql);
            if($result){
                echo "<script>
                swal.fire('Success', 'Email Address Verified Successfully', 'success')
                .then(function(result){if(result){window.location = '../login'}});
            </script>";
            }
        }
    
}else{
    echo "<script>
    swal.fire('Error!', 'Invalid OTP Entered', 'error')
    .then(function(result){if(result){window.location = './'}});
</script>";
}

    
}
}


?>

</body>
</html>