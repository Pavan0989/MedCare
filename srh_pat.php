<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System - Search Patients</title>
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
            color: #2c3e50;
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
    </style>
</head>

<body>

    <h1>Search Patients</h1>
    <form action="search_results.php" method="post">
        <label for="search_query">Search by Name:</label>
        <input type="text" name="search_query" required>
        <input type="submit" value="Search">

    </form>
</body>

</html>
