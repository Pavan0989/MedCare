<html>
<body>

<?php

include 'dbconnect.php';
$sql ="CREATE TABLE prescription(
    pres_id INT AUTO_INCREMENT PRIMARY KEY,
    pid INTEGER,
    FOREIGN KEY (pid) REFERENCES Patient(patient_id),
    Medicine_cost float NOT NULL,
    LabTest_Cost float NOT NULL
     )AUTO_INCREMENT=2000;";
     if (mysqli_query($conn, $sql)) {
        echo "<br>Table patients created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

 mysqli_close($conn);

?>

</body>
</html>