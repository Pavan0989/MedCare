<?php
include 'dbconnect.php';
$sql="SELECT * FROM appointment";
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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        div {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        h1 {
            color: #333;
            text-align: center;
            opacity: 0;
            transform: translateY(-50px);
            animation: dropHeading 1s forwards ease-in-out;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
            opacity: 0;
            transform: translateY(-50px);
            animation: dropIn 0.5s forwards ease-in-out;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            color: #333;
            opacity: 0;
            transform: translateY(-20px);
            animation: dropLetter 0.3s forwards ease-in-out;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        @keyframes dropHeading {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes dropIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes dropLetter {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Add individual delay for each letter in the dropLetter animation */
        td:nth-child(1) {
            animation-delay: 0.1s;
        }

        td:nth-child(2) {
            animation-delay: 0.2s;
        }

        td:nth-child(3) {
            animation-delay: 0.3s;
        }

        td:nth-child(4) {
            animation-delay: 0.4s;
        }

        td:nth-child(5) {
            animation-delay: 0.5s;
        }
    </style>
</head>
<body>
    <div>
        <h1>Appointment Data</h1>
        <table>
            <tr>
                <th>Appointment Id</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Doctor Id</th>
                <th>Patient Id</th>
            </tr>

            <?php
                while($info = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $info['appointment_id']; ?></td>
                <td><?php echo $info['app_date']; ?></td>
                <td><?php echo $info['stat']; ?></td>
                <td><?php echo $info['eid']; ?></td>
                <td><?php echo $info['pid']; ?></td>
            </tr>

            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>
