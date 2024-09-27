<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #3498db, #6a89cc);
            color: #2c3e50; /* Dark text color for better contrast */
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
            /* Adjust date input styling if needed */
            width: calc(100% - 22px); /* Adjust for date input arrow */
        }

        input[type="submit"] {
            background-color: #3498db; /* Blue color for submit action */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }
        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            grid-gap: 20px; /* Gap between buttons */
            justify-content: center;
            margin-top: 30px;
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
            transform: perspective(800px) translateZ(0); /* 3D effect */
        }

        button:hover {
            background-color: #3498db;
            color: #fff;
            transform: scale(1.1) perspective(800px) translateZ(20px); /* Scale and lift on hover */
        }

        /* Add margin to icons inside buttons */
        button i {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <h1>Patient Prescription Registration</h1>
    <form action="pres_input.php" method="post">
        <label for="Pres_id">Prescription ID:</label>
        <input type="number" name="Pres_id" required>

        <label for="Pr_date">Prescription Date:</label>
        <input type="date" name="Pr_date" required>

        <label for="Dosage">Dosage:</label>
        <select name="Dosage" required>
            <option value="5ml">5 ml</option>
            <option value="10ml">10 ml</option>
            <option value="full">Full</option>
            <option value="half">Half</option>
        </select>

        <label for="freq">Frequency:</label>
        <select name="freq" required>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
            <option value="Night">Night</option>
            <option value="Morning,Afternoon">Morning, Afternoon</option>
            <option value="Morning,Night">Morning, Night</option>
            <option value="Afternoon,Night">Afternoon, Night</option>
            <option value="Morning,Afternoon,Night">Morning, Afternoon, Night</option>
        </select>

        <label for="med_quan">Medicine Quantity:</label>
        <input type="number" name="med_quan" required>

        <label for="med_cost">Medicine Cost:</label>
        <input type="number" name="med_cost" required>

        <label for="emp_id">Doctor ID:</label>
        <input type="number" name="emp_id" required>

        <label for="patid">Patient ID:</label>
        <input type="number" name="patid" required>

        <label for="tst_id">Test ID:</label>
        <input type="number" name="tst_id" required>

        <label for="md_id">Medicine ID:</label>
        <input type="number" name="md_id" required>

        <input type="submit" value="Submit">
        <button onclick="location.href='display_pres.php'"><i class="fas fa-file-invoice-dollar"></i>View Precription</button>
        <button><i class="fas fa-arrow-left" onclick="window.history.back()"></i> Back</button>

    </form>
    <button onclick="window.history.back()"><i class="fas fa-arrow-left"></i> Back</button>
</body>

</html>
