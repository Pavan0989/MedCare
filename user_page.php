<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- Add the Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Add Google Fonts for a modern font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: url('userpage.jpg') center/cover no-repeat;
            color: #495057; /* Dark gray text color */
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
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            max-width: 400px; /* Adjust as needed */
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #dee2e6; /* Light gray border */
        }

        button {
            background-color: #fff; /* White button */
            color: #007bff; /* Blue text */
            padding: 12px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #007bff; /* Blue background on hover */
            color: #fff; /* White text on hover */
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <h1>Welcome User!</h1>

    <table>
        <tr>
            <td><button onclick="location.href='patient_input.php'"><i class="fas fa-users"></i> Patients</button></td>
        </tr>
        <tr>
            <td><button onclick="location.href='appointment.php'"><i class="far fa-calendar"></i> Appointments</button></td>
        </tr>
        <tr>
            <td><button onclick="location.href='srh_pat.php'"><i class="fas fa-search"></i> Search</button></td>
        </tr>
    </table>

</body>
</html>
