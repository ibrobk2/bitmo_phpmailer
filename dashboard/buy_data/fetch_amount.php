
<?php
                    // Replace database connection details with your own
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "bitmo";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    if(isset($_POST['plan'])){

                   
                    // Query to fetch plans based on data_type
                    $plan = $_POST['plan']; // Make sure to sanitize and validate user input
                    $sql = "SELECT * FROM data_plans WHERE plan_name = '$plan'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                            echo $row['amount'];
                        
                    }
                    $conn->close();
                }
                    ?>