<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #3498db, #6a89cc);
            color: #2c3e50;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center; /* Center form content */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="black" height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z" /></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 20px;
            cursor: pointer;
        }

        input[type="date"] {
            width: calc(100% - 22px);
        }

        .action-button {
    background-color: grey;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin: 10px auto; /* Auto margin horizontally for center alignment */
    display: block; /* Make buttons block elements */
    width: 30%; /* You can adjust the width as needed */
}


        .action-button:hover {
            background-color: #2980b9;
        }

        .button-container {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
        }
    </style>
    <script>
        function showMessage(message) {
            alert(message);
            window.history.back();
        }

        showMessage("<?php echo $message; ?>");
    </script>
</head>

<body>
    <h1>Patient Registration</h1>
    <form action="pat_input.php" method="post">
        <label for="Fname">First Name:</label>
        <input type="text" name="Fname" required>

        <label for="Lname">Last Name:</label>
        <input type="text" name="Lname" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>

        <label for="DOB">Date of Birth:</label>
        <input type="date" name="DOB" required>

        <label for="Contact_no">Contact Number:</label>
        <input type="number" name="Contact_no" required>

        <label for="Doc_id">Doctor Appointed:</label>
        <input type="number" name="Doc_id">

        <input type="submit" class="action-button" value="Submit">
    </form>
    <button class="action-button" onclick="location.href='srh_pat.php'"><i class="fas fa-search"></i> Search Patients</button>
    <button class="action-button" onclick="location.href='display_pat.php'"><i class="fas fa-home"></i> View Patients</button>
    <button class="action-button" onclick="window.history.back()"><i class="fas fa-arrow-left"></i> Back</button>
</body>

</html>
