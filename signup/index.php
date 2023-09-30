<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Add custom CSS for styling -->
    <style>
        body {
            background-color: #f0f0f0;
        }
        .registration-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .form-header {
            text-align: center;
            padding-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include_once('../auth/index.php'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 registration-container">
                <h2 class="form-header">CREATE AN ACCOUNT</h2>
                    <?php include("../includes/errors.php"); ?>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" name="full_name" >
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Choose a username" name="username" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Choose a password" name="password" >
                    </div>
                    <button type="submit" class="btn btn-primary btn-block form-control mb-3" name="signup">Register</button>
                </form>
                <p class="text-center">Already Have an Account <a href="../login"> Login Here</a></p>

            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
