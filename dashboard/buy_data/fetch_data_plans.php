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
                    if(isset($_POST['data_type'])){

                   
                    // Query to fetch plans based on data_type
                    $data_type = $_POST['data_type']; // Make sure to sanitize and validate user input
                    $sql = "SELECT DISTINCT plan_name FROM data_plans WHERE data_type = '$data_type'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['plan_name'] . '">' . $row['plan_name'] . '</option>';
                        }
                    }
                    $conn->close();
                }
                    ?>