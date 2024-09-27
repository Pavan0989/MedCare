<?php
include 'dbconnect.php';
$sql="SELECT * FROM bill";
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
                <th>Bill Id</th>
                <th>Bill Date</th>
                <th>Total Cost</th>
                <th>Patient Id</th>
                <th>Precription Id</th>
                <th>Payment Status</th>
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
                    echo "{$info['bill_id']}";
                    ?>
                </td>
                <td><?php
                    echo "{$info['bill_date']}";
                    ?></td>
                <td><?php
                    echo "{$info['tot_cost']}";
                    ?></td>
                <td><?php
                    echo "{$info['pat_id']}";
                    ?></td>
                <td>
                <?php
                    echo "{$info['pr_id']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['payment_status']}";
                    ?>
                </td>
                

            </tr>

                <?php
                    }
                ?>
           
            

        </table>
    </div>
</body>
</html>
