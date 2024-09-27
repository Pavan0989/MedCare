<?php
include 'dbconnect.php';

$message = "Inserted";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bid = $_POST["bid"];
    $billdate = $_POST["billdate"];
    $Lname = $_POST["Lname"];
    $totcst = $_POST["totalcost"];
    $pid = $_POST["pid"];
    $prid = $_POST["prid"];
    $stat = $_POST["stat"];
    

    // Insert data into the database
    $sql = "INSERT INTO BILL ( bill_id,bill_date,tot_cost,patid,pr_id ,payment_status ) VALUES ( '$bid','$billdate','$Lname','$totcst','$pid','$prid','$stat')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>

    <!-- Include JavaScript for pop-up message and redirection -->
    <script>
        // Function to display a pop-up message
        function showMessage(message) {
            alert(message);
            // Redirect to the home page after the pop-up is closed
            window.history.back();        }

        // Call the function with the PHP message
        showMessage("<?php echo $message; ?>");
    </script>
</head>
<body>
    <!-- Your HTML content here -->
    <button onclick="window.location.href='pass.php'">Go to Home Page</button>
</body>
</html>