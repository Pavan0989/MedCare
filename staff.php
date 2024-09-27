<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System - Employee Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #3498db, #6a89cc);
            color: #2c3e50;
            /* Dark text color for better contrast */
        }

        h2 {
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
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #333;
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

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 15px 30px;
            font-size: 16px;
            border: 2px solid #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
            transform: perspective(800px) translateZ(0);
            /* 3D effect */
        }

        button:hover {
            background-color: #3498db;
            color: #fff;
            transform: scale(1.1) perspective(800px) translateZ(20px);
            /* Scale and lift on hover */
        }

        button:not(:last-child) {
            margin-right: 10px;
        }

        /* Add margin to icons inside buttons */
        button i {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <h2>Employee Registration</h2>
    <form action="staff_input.php" method="POST">
        <label for="Fname">First Name:</label>
        <input type="text" name="Fname" required><br>

        <label for="Lname">Last Name:</label>
        <input type="text" name="Lname" required><br>

        <label for="Designation">Designation:</label>
        <input type="text" name="Designation" required><br>

        <label for="DOB">Date of Birth:</label>
        <input type="date" name="DOB" required><br>

        <label for="Contact_no">Contact Number:</label>
        <input type="text" name="Contact_no" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Buttons below the form -->
    <div class="button-container">
        <button onclick="location.href='display_emp.php'"><i class="fas fa-home"></i> View Employees</button>
        <button onclick="window.history.back()"><i class="fas fa-arrow-left"></i> Back</button>
    </div>
</body>

</html>
