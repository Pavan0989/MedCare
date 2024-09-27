<?php
    include 'dbconnect.php';
    
    $eid = $_GET['emp_id'];
    $sql = "SELECT * FROM employee WHERE emp_id='$eid'";
    $result = mysqli_query($conn, $sql);   
    $info = $result->fetch_assoc();

    if (isset($_POST['Update'])) {
        $eid = $_POST['emp_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $designation = $_POST['desig'];
        $dob = $_POST['dob'];
        $contact_no = $_POST['contact_no'];
        $gen = $_POST['gen'];
        $email = $_POST['email'];

        $query = "UPDATE employee SET Fname='$fname',Lname='$lname',designation='$designation',dob='$dob',contact_no='$contact_no',gender='$gen',email='$email' WHERE emp_id='$eid'";
        $result1 = mysqli_query($conn, $query);
        if ($result1) {
            // Redirect to display page after successful update
            header("Location: display_emp.php?emp_id=$eid");
            exit();
        } else {
            echo "Update failed";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Update Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEFA; /* Set the outside background color to blue */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto; /* Center the form */
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="#" method="POST">

        <h1>Update Employee</h1>

        <label for="eid">Employee Id</label>
        <input type="number" name="eid" value="<?php echo $info['emp_id']; ?>" readonly>

        <label for="fname">First Name</label>
        <input type="text" name="fname" value="<?php echo "{$info['Fname']}"; ?>">

        <label for="lname">Last Name</label>
        <input type="text" name="lname" value="<?php echo "{$info['Lname']}"; ?>">

        <label for="desig">Designation</label>
        <input type="text" name="desig" value="<?php echo "{$info['designation']}"; ?>">

        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" value="<?php echo "{$info['dob']}"; ?>">

        <label for="contact_no">Contact No</label>
        <input type="number" name="contact_no" value="<?php echo "{$info['contact_no']}"; ?>">

        <label for="gen">Gender</label>
        <input type="text" name="gen" value="<?php echo "{$info['gender']}"; ?>">

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">

        <input type="submit" name="Update" value="Update">
    </form>
</body>

</html>

