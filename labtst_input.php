<?php
include 'dbconnect.php';
$message = "Inserted";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tid = $_POST["test_id"];
    $tname = $_POST["test_name"];
    $tcost = $_POST["tcost"];
   
    // Insert data into the database
    $sql = "INSERT INTO Labtest (test_id,testname,testcost) VALUES ('$tid','$tname','$tcost')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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