<!DOCTYPE html>
<html>
<head>
    <title>Buy Data</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Buy Data</h1>
        <form method="POST" action="process_order.php">
            <div class="form-group">
                <label for="network">Network:</label>
                <select class="form-control" id="network" name="network">
                    <option value="MTN">MTN</option>
                    <option value="AIRTEL">AIRTEL</option>
                    <option value="GLO">GLO</option>
                    <option value="9MOBILE">9MOBILE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data_type">Data Type:</label>
                <select class="form-control" id="data_type" name="data_type">
                    <option value="Select">Select Data Type</option>
                    <option value="SME">SME</option>
                    <option value="CORPORATE GIFTING">CORPORATE GIFTING</option>
                    <option value="DIRECT GIFTING">DIRECT GIFTING</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number:</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number">
            </div>
            <div class="form-group">
                <label for="plan">Plan:</label>
                <select class="form-control" id="plan" name="plan">
                    <!-- Fetch plan options from the database based on the selected data_type -->
                    
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <!-- Fetch and display amount based on the selected plan from the database -->
                <input type="text" class="form-control" id="amount" name="amount" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#data_type").change(function(){
                var data_type = $(this).val();

                $.ajax({
                    url: "fetch_data_plans.php",
                    type: "POST",
                    data: {data_type: data_type},
                    success: function(res){
                        $("#plan").html(res);
                    }
                });

            })
        });
    </script>
</body>
</html>
