<!DOCTYPE html>
<html>
<head>
    <title>Manage Data Plans</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Manage Data Plans</h1>

        <!-- Insert Data Form -->
        <h2>Add New Data Plan</h2>
        <form method="POST" action="insert_data_plan.php">
            <!-- Add form fields for inserting data -->
            <!-- network, data_type, plan_name, amount, etc. -->
            <!-- You can use the same structure as in the previous example -->
            <button type="submit" class="btn btn-primary">Insert</button>
        </form>

        <!-- Modify Data Form -->
        <h2>Modify Data Plan</h2>
        <form method="POST" action="modify_data_plan.php">
            <div class="form-group">
                <label for="plan_id">Select Plan to Modify:</label>
                <select class="form-control" id="plan_id" name="plan_id">
                    <?php
                    // Fetch plan IDs and names from the database
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

                    // Query to fetch plan IDs and names
                    $sql = "SELECT id, plan_name FROM data_plans";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['plan_name'] . '</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <!-- Add form fields for modifying data -->
            <!-- network, data_type, plan_name, amount, etc. -->
            <!-- You can use the same structure as in the previous example -->
            <button type="submit" class="btn btn-primary">Modify</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
