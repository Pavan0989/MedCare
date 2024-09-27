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

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #2ecc71; /* Green color for submit action */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #27ae60; /* Darker green on hover */
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
            background-color: #fff;
            color: #3498db;
            transform: scale(1.1) perspective(800px) translateZ(20px); /* Scale and lift on hover */
        }

        /* Add margin to icons inside buttons */
        button i {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <h1>Labtest Registration</h1>
    <form action="labtst_input.php" method="post">
        <label for="test_id">Test Id:</label>
        <input type="number" name="test_id" required>

        <label for="test_name">Test Name:</label>
        <input type="text" name="test_name" required>

        <label for="tcost">Test Cost:</label>
        <input type="number" name="tcost" required>

        <input type="submit" value="Submit">
        <button onclick="location.href='display_labtst.php'"><i class="fas fa-file-invoice-dollar"></i> View Labtest</button>

    </form>
    <button onclick="window.history.back()"><i class="fas fa-arrow-left"></i> Back</button>
</body>

</html>
