<?php
include 'dbconnect.php';
$message="Inserted";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $Desig = $_POST["Designation"];
    $Dob = $_POST["DOB"];
    $Contact_no = $_POST["Contact_no"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    

    // Insert data into the database
    $sql = "INSERT INTO Employee (Fname,Lname,designation,dob,contact_no,email,gender) VALUES ('$Fname','$Lname','$Desig','$Dob','$Contact_no','$email','$gender')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->$insert_id;
        echo "New record created successfully. The last inserted ID is: " . $last_id;
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