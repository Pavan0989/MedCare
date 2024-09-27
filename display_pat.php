<?php
error_reporting(E_ALL); // Enable error reporting for debugging
ini_set('display_errors', 1);

session_start();

// Assuming you have retrieved the patient ID from your database or another source
$patient_id = 1; // Replace with the actual patient ID

// Store patient ID in a session variable
$_SESSION['patient_id'] = $patient_id;
include 'dbconnect.php';
$sql="SELECT * FROM patient";
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
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #3498db, #6a89cc);
            color: #2c3e50;
            /* Dark text color for better contrast */
        }

        div {
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            animation: rotateIn 1s ease-in-out, fadeIn 1s ease-in-out;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e74c3c; /* Red background for headers */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @keyframes rotateIn {
            from {
                transform: rotateY(180deg);
            }

            to {
                transform: rotateY(0deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        button {
            background-color: #e74c3c; /* Red button background */
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #c0392b; /* Darker red on hover */
        }

        /* Style for links that look like buttons */
        .button-link {
            display: inline-block;
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .button-link:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div>
        <h1>Patients Data</h1>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <table>
            <tr>
                <th>PatientId</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>ContactNo</th>
                <th>DocId</th>
                <th>Delete</th>
                <th>Update</th>
                <th>Prescription</th>
                <th>Generate Bill</th>
            </tr>

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo "{$info['patient_id']}"; ?></td>
                    <td><?php echo "{$info['Fname']}"; ?></td>
                    <td><?php echo "{$info['Lname']}"; ?></td>
                    <td><?php echo "{$info['gender']}"; ?></td>
                    <td><?php echo "{$info['dob']}"; ?></td>
                    <td><?php echo "{$info['contact_no']}"; ?></td>
                    <td><?php echo "{$info['doc_id']}"; ?></td>
                    <td><a class="button-link" onClick="javascript:return confirm('Are you sure to delete this')" href='del_pat.php?patient_id=<?php echo $info['patient_id']; ?>'>Delete</a></td>
                    <td><a class="button-link" href='updatepat.php? patient_id=<?php echo $info['patient_id']; ?>'>Update</a></td>
                    <td><button onclick="location.href='prescription.php?patient_id=<?php echo $info['patient_id']; ?>'">Prescription</button></td>
                    <td><button onclick="location.href='biils.php?patient_id=<?php echo $info['patient_id']; ?>'">Generate Bill</button></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <button onclick="window.history.back()">Back</button>
    </div>
</body>

</html>
