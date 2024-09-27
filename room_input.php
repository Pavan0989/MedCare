<?php
include 'dbconnect.php';
$message="Inserted";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomno = $_POST["roomno"];
    $roomtype = $_POST["room_type"];
    $avail = $_POST["avail"];
    
    // Insert data into the database
    $sql = "INSERT INTO ROOM (roomno,rtype,avail) VALUES ('$roomno','$roomtype','$avail')";

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