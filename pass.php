<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('main7.jpg'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        /* Style for the heading */
        h1 {
            color: #3498db;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        button {
            font-size: 18px;
            padding: 12px 20px;
            margin: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
    <script>
        function showPasswordPrompt(userType) {
            var password = prompt("Enter password for " + userType);

            if (password !== null) {
                // Send the password to the server for validation
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Check the response to determine the next action
                        if (xhr.responseText === "Admin login successful!") {
                            window.location.href = "admin_page.php";
                        } else if (xhr.responseText === "User login successful!") {
                            window.location.href = "user_page.php";
                        } else {
                            alert("Invalid password for " + userType);
                        }
                    }
                };

                xhr.open("POST", "firstpage.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("userType=" + userType + "&password=" + password);
            }
        }
    </script>
</head>

<body>

    <div class="container">
        <h1>Hospital Management System</h1>

        <button onclick="showPasswordPrompt('admin')">Admin Login</button>
        <button onclick="showPasswordPrompt('user')">User Login</button>
    </div>

</body>

</html>
