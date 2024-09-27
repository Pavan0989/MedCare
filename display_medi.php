<?php
include 'dbconnect.php';
$sql="SELECT * FROM medications";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients</title>


    <style>
        body {
            font-family: Arial, sans-serif;
        }

        div {
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div>
        <h1>Patients Data</h1>
        <table>
            <tr>
                <th>Medicine Id</th>
                <th>Medicine Name</th>
                <th>Expiry Date</th>
                <th>Unit Rice</th>
                <th>Available Quantity</th>
            </tr>

                <?php
                    while($info=$result->fetch_assoc())
                    {
                ?>
                <?php

                ?>
            <tr>
                <td>
                    <?php
                    echo "{$info['med_id']}";
                    ?>
                </td>
                <td><?php
                    echo "{$info['med_name']}";
                    ?></td>
                <td><?php
                    echo "{$info['exp_date']}";
                    ?></td>
                <td><?php
                    echo "{$info['unitprice']}";
                    ?></td>
                <td><?php
                    echo "{$info['avquan']}";
                    ?></td>    
            </tr>

                <?php
                    }
                ?>
           
            

        </table>
    </div>
</body>
</html>
