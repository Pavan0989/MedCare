<?php
include 'dbconnect.php';

$message = "Inserted";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pres_id = $_POST["Pres_id"];
    $pr_date = $_POST["Pr_dat"];
    $dosage = $_POST["Dosage"];
    $freq = $_POST["freq"];
    $medquan = $_POST["med_quan"];
    $medcost = $_POST["med_cost"];
    $empid = $_POST["emp_id"];
    $patid = $_POST["patid"];
    $tstid = $_POST["tst_id"];
    $mdid = $_POST["md_id"];
    

    // Insert data into the database
    $sql = "INSERT INTO Prescription (presc_id,pr_date,Dosage,Freq,med_quan,med_cost,empid,patid,tst_id,md_id) VALUES ( '$pres_id','$pr_date','$dosage','$freq','$medquan','$medcost','$empid','$patid','$tstid,'$mdid')";
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