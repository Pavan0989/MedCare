<?php
error_reporting(0);
session_start();
include 'dbconnect.php';
$sql="SELECT * FROM Employee";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #3498db, #6a89cc);
            overflow-x: hidden; /* Hide horizontal scrollbar */
            margin: 0;
            padding: 0;
        }

        div {
            margin: 20px;
            opacity: 0;
            transform: translateX(-50px);
            animation: slideIn 0.5s forwards ease-in-out;
            background-color: #f2f2f2; /* Light gray background color */
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            color: #333;
        }

        th {
            background-color: #3498db; /* Blue background color for header */
            color: #fff; /* White text color for header */
        }

        a.button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 5px;
        }

        button {
            margin-top: 10px;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            opacity: 0;
            transform: translateY(-20px);
            animation: slideInButton 0.5s forwards ease-in-out;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInButton {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div>
        <h1>Employee Data</h1>
        <?php
            if($_SESSION['message']) {
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
        ?>
        <table>
            <tr>
                <th>Employee Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Designation</th>
                <th>DOB</th>
                <th>Contact No</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>

            <?php
                while($info=$result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $info['emp_id']; ?></td>
                <td><?php echo $info['Fname']; ?></td>
                <td><?php echo $info['Lname']; ?></td>
                <td><?php echo $info['designation']; ?></td>
                <td><?php echo $info['dob']; ?></td>
                <td><?php echo $info['contact_no']; ?></td>
                <td><?php echo $info['email']; ?></td>
                <td><?php echo $info['gender']; ?></td>
                <td>
                    <?php echo "<a class='button' onClick=\"javascript:return confirm('Are you sure to delete this')\" href='del_emp.php?emp_id={$info['emp_id']}'> Delete</a>"; ?>
                </td>
                <td>
                <td><a class="button-link" href='updateemp.php? emp_id=<?php echo $info['emp_id']; ?>'>Update</a></td>
                </td>
            </tr>

            <?php
                }
            ?>
        </table>
        <button onclick="window.history.back()">Back</button>
    </div>
</body>
</html>
