<?php
// Assuming you have already retrieved the patient ID from the previous page
include 'dbconnect.php';
$patient_id = $_GET['patient_id']; // Change this according to your method of retrieving patient ID

// Query to join Patient and Prescription tables and retrieve necessary data
$sql = "SELECT Patient.patient_id, prescription.pres_id, Patient.Fname, Patient.Lname, Patient.contact_no, prescription.Medicine_cost, prescription.LabTest_Cost
        FROM Patient
        JOIN prescription ON Patient.patient_id = prescription.pid
        WHERE Patient.patient_id = $patient_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data from each row
    while ($row = $result->fetch_assoc()) {
        $patient_id = $row['patient_id'];
        $prescription_id = $row['pres_id'];
        $fname = $row['Fname'];
        $lname = $row['Lname'];
        $contact_no = $row['contact_no'];
        $medicine_cost = $row['Medicine_cost'];
        $labtest_cost = $row['LabTest_Cost'];
        
        // Calculate total cost by adding medicine cost and lab test cost
        $total_cost = $medicine_cost + $labtest_cost;

  
}
}

// Close the database connection
$conn->close();
?>
<!-- Add the following HTML, CSS, and JavaScript at the end of your HTML file -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Bill</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #3498db, #6a89cc);
            margin: 0;
            padding: 0;
        }

        #billContainer {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin: 0;
            color: #555;
        }

        strong {
            font-weight: bold;
        }

        #printButton, #backButton, #homeButton {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        #backButton, #homeButton {
            margin-left: 10px;
            background-color: #2196F3;
        }

        /* Add print media query */
        @media print {
            body * {
                visibility: hidden;
            }

            #billContainer, #billContainer * {
                visibility: visible;
            }

            #billContainer {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body>
    <div id="billContainer">
        <h2>Bill Details</h2>
        <p><strong>Patient ID:</strong> <?php echo $patient_id; ?></p>
        <p><strong>Prescription ID:</strong> <?php echo $prescription_id; ?></p>
        <p><strong>Name:</strong> <?php echo "$fname $lname"; ?></p>
        <p><strong>Contact No:</strong> <?php echo $contact_no; ?></p>
        <p><strong>Medicine Cost:</strong> $<?php echo number_format($medicine_cost, 2); ?></p>
        <p><strong>Lab Test Cost:</strong> $<?php echo number_format($labtest_cost, 2); ?></p>
        <p><strong>Total Cost:</strong> $<?php echo number_format($total_cost, 2); ?></p>

        <!-- Add the print, back, and homepage buttons -->
        <button id="printButton">Print</button>
        <button id="backButton" onclick="goBack()">Back</button>
        <button id="homeButton" onclick="goHome()">Homepage</button>
    </div>

    <!-- Add the existing script section at the end of your HTML -->
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            // Trigger the print dialog
            window.print();
        });

        function goBack() {
            window.history.back();
        }

        function goHome() {
            window.location.href = 'pass.php'; // Change 'homepage.php' to the actual homepage URL
        }
    </script>
</body>
</html>
