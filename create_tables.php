<html>

<body>
    <?php
    include 'dbconnect.php';
    $sql1 = "CREATE TABLE Employee(
        emp_id INT AUTO_INCREMENT PRIMARY KEY,
        Fname Varchar(25) NOT NULL,
        Lname Varchar(25) NOT NULL,
        designation VARCHAR(25) NOT NULL,
        dob date NOT NULL,
        contact_no VARCHAR(10),
        email VARCHAR(25) NOT NULL,
        gender char NOT NULL
        )AUTO_INCREMENT=1;";
    if (mysqli_query($conn, $sql1)) {
        echo "<br>Table staff created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // sql to create table
    $sql = "CREATE TABLE Patient (
     patient_id INT AUTO_INCREMENT PRIMARY KEY,
     Fname VARCHAR(255) NOT NULL,
     Lname VARCHAR(255) NOT NULL,
     gender char NOT NULL,
     dob date NOT NULL,
     contact_no VARCHAR(10) NOT NULL,
     doc_id INTEGER,
     FOREIGN KEY (doc_id) REFERENCES Employee(emp_id)
     )AUTO_INCREMENT=100;";


    if (mysqli_query($conn, $sql)) {
        echo "<br>Table patients created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    $sql2 = "CREATE TABLE Appointment (
        appointment_id INT AUTO_INCREMENT PRIMARY KEY,
        app_date date NOT NULL,
        stat VARCHAR(255) NOT NULL,
        eid INTEGER, 
        pid INTEGER,
        FOREIGN KEY (eid) REFERENCES Employee(emp_id),
        FOREIGN KEY (pid) REFERENCES Patient(patient_id)
        )AUTO_INCREMENT=200;";
   
   
       if (mysqli_query($conn, $sql2)) {
           echo "<br>Table Appointment created successfully";
       } else {
           echo "Error creating table: " . mysqli_error($conn);
       }

       
       $sql3 = "CREATE TABLE Labtest (
        testname VARCHAR(255) PRIMARY KEY,
        testcost FLOAT NOT NULL 
        )";
   
   
       if (mysqli_query($conn, $sql3)) {
           echo "<br>Table LabTEsts created successfully";
       } else {
           echo "Error creating table: " . mysqli_error($conn);
       }

       
       $sql4 = "CREATE TABLE Medications (
        med_name VARCHAR(255) PRIMARY KEY,
        unitprice FLOAT NOT NULL 
        )";
   
   
       if (mysqli_query($conn, $sql4)) {
           echo "<br>Table Medications created successfully";
       } else {
           echo "Error creating table: " . mysqli_error($conn);
       }
    mysqli_close($conn);

    ?>
</body>

</html>