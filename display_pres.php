<?php
include 'dbconnect.php';
$sql="SELECT * FROM prescription";
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
                <th>Prescription Id</th>
                <th>Prescription Date</th>
                <th>Dosage</th>
                <th>Frequency</th>
                <th>Medicine Quantity</th>
                <th>Medicine Cost</th>
                <th>Employee Id</th>
                <th>Patient Id</th>
                <th>Test Id</th>
                <th>Medicine Id</th>
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
                    echo "{$info['presc_id']}";
                    ?>
                </td>
                <td><?php
                    echo "{$info['pr_date']}";
                    ?></td>
                <td><?php
                    echo "{$info['Dosage']}";
                    ?></td>
                <td><?php
                    echo "{$info['Freq']}";
                    ?></td>
                <td>
                <?php
                    echo "{$info['med_quan']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['med_cost']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['empid']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['patid']}";
                    ?>  
                </td>
                <td>
                <?php
                    echo "{$info['tst_id']}";
                    ?>  
                </td>
                <td>
                <?php
                    echo "{$info['md_id']}";
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
