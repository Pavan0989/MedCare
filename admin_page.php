<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Add the Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Add Google Fonts for a modern font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #3498db, #6a89cc); /* Gradient background */
            color: #fff; /* Text color */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 50px;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }

        button {
            background-color: #fff;
            color: #3498db;
            padding: 15px 30px;
            font-size: 16px;
            border: 2px solid #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
            transform: perspective(800px) translateZ(0);
        }

        button:hover {
            background-color: #3498db;
            color: #fff;
            transform: scale(1.1) perspective(800px) translateZ(20px);
        }

        button i {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <h1>Welcome Admin!</h1>

    <div class="button-container">
        <button onclick="location.href='patient_input.php'"><i class="fas fa-users"></i> Manage Patients</button>
        <button onclick="location.href='appointment.php'"><i class="far fa-calendar"></i> Manage Appointments</button>
        <button onclick="location.href='staff.php'"><i class="fas fa-users-cog"></i> Manage Employees</button>
    </div>

</body>

</html>
