<?php
include("dbconnect.php");
session_start();

// Retrieve patient ID from the GET parameter
if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
} else {
    // Redirect to the first page if patient ID is not set
    header("Location: first_page.php");
    exit();
}

// Fetch medications
$sql = "SELECT * FROM Medications";
$result = mysqli_query($conn, $sql);

// Fetch lab tests
$sql1 = "SELECT * FROM Labtest";
$result1 = mysqli_query($conn, $sql1);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if the patient_id exists in the patient table
    $check_patient_sql = "SELECT * FROM patient WHERE patient_id = '$patient_id'";
    $check_patient_result = mysqli_query($conn, $check_patient_sql);

    if (mysqli_num_rows($check_patient_result) > 0) {
        // Initialize costs outside the loops
        $medicine_cost = 0;
        $lab_test_cost = 0;

        foreach ($_POST["med_qty"] as $index => $qty) {
            if ($qty > 0) {
                $medication_name = mysqli_real_escape_string($conn, $_POST["med_name"][$index]);
                $medication_cost = mysqli_real_escape_string($conn, $_POST["med_cost"][$index]);
                $total_cost = $qty * $medication_cost;
                $medicine_cost += $total_cost;
            }
        }

        foreach ($_POST["lab_qty"] as $index => $qty) {
            if ($qty > 0) {
                $lab_test_name = mysqli_real_escape_string($conn, $_POST["lab_name"][$index]);
                $lab_test_cost = mysqli_real_escape_string($conn, $_POST["lab_cost"][$index]);
                $total_cost = $qty * $lab_test_cost;
                $lab_test_cost += $total_cost;
            }
        }

        // Insert the total cost for both medicine and lab tests in the prescription table
        $insert_sql = "INSERT INTO prescription (pid, Medicine_cost, LabTest_Cost)
                       VALUES ('$patient_id', '$medicine_cost', '$lab_test_cost')";
        mysqli_query($conn, $insert_sql);
    } else {
        // Handle the case where the patient_id does not exist
        echo "Invalid patient_id. Please check and try again.";
    }
    // Redirect back to the previous page
    header("Location: display_pat.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESCRIPTION</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a89cc, #3498db);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        div {
            margin: 20px;
            opacity: 0;
            transform: translateX(-50px);
            animation: slideIn 0.5s forwards ease-in-out;
            background-color: #34495e;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        h2 {
            color: #3498db;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            color: #fff;
        }

        th, td {
            border: 1px solid #2c3e50;
            padding: 12px;
            text-align: left;
            color: #fff;
        }

        th {
            background-color: #3498db;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 20px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #2980b9;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <div>
        <center>
            <h2>MEDS & TESTS</h2>
            <form method="post" action="">
                <!-- Medication Table -->
                <table border="1px">
                    <tr>
                        <th style="padding: 20px; font-size: 15px;">MEDICINE NAME</th>
                        <th style="padding: 20px; font-size: 15px;">PRICE</th>
                        <th style="padding: 20px; font-size: 15px;">QTY</th>
                        <th style="padding: 20px; font-size: 15px;">ADD ITEM</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['med_name'] . "<input type='hidden' name='med_name[]' value='" . $row['med_name'] . "'></td>";
                        echo "<td>" . $row['unitprice'] . "<input type='hidden' name='med_cost[]' value='" . $row['unitprice'] . "'></td>";
                        echo "<td><input type='number' name='med_qty[]'></td>";
                        echo "<td><button type='button' onclick='addItem(this)'>Add</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>

                <br>

                <!-- Lab Test Table -->
                <table border="1px">
                    <tr>
                        <th style="padding: 20px; font-size: 15px;">LAB TEST</th>
                        <th style="padding: 20px; font-size: 15px;">COST</th>
                        <th style="padding: 20px; font-size: 15px;">ADD ITEM</th>
                    </tr>

                    <?php
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td>" . $row1['testname'] . "<input type='hidden' name='lab_name[]' value='" . $row1['testname'] . "'></td>";
                        echo "<td>" . $row1['testcost'] . "<input type='hidden' name='lab_cost[]' value='" . $row1['testcost'] . "'></td>";
                        // Set lab_qty to default value of 1 and make the row hidden
                        echo "<td style='display: none;'><input type='hidden' name='lab_qty[]' value='1'></td>";
                        echo "<td><button type='button' onclick='addItem(this)'>Add</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>

                <br>

                <!-- Display Selected Items and Total Cost -->
                <h2>SELECTED ITEMS</h2>
                <table border="1px">
                    <!-- This table will be populated dynamically using JavaScript -->
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody id="selectedItemsTableBody"></tbody>
                    <tfoot>
                        <tr>
                            <td>Total Cost:</td>
                            <td id="totalCost">0</td>
                        </tr>
                    </tfoot>
                </table>

                <br>

                <!-- Submit Button -->
                <input type="submit" name="submit" value="Submit Prescription">
            </form>
        </center>
    </div>

    <script>
        function addItem(button) {
            var row = button.parentNode.parentNode;
            var itemName = row.cells[0].innerText;
            var itemCost = row.cells[1].innerText;
            var itemQty = row.cells[2].getElementsByTagName("input")[0].value;

            // Display selected item in the table
            var selectedItemsTable = document.getElementById("selectedItemsTableBody");
            var newRow = selectedItemsTable.insertRow();
            newRow.insertCell(0).innerText = itemName;
            newRow.insertCell(1).innerText = itemCost * itemQty;

            // Calculate total cost
            var totalCost = 0;
            for (var i = 0; i < selectedItemsTable.rows.length; i++) {
                totalCost += parseFloat(selectedItemsTable.rows[i].cells[1].innerText);
            }

            // Update total cost in the footer
            document.getElementById("totalCost").innerText = totalCost;
        }
    </script>
</body>

</html>
