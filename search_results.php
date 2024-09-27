<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    // Perform a simple search by name
    $sql = "SELECT * FROM Patient WHERE Fname LIKE '%$search_query%'";
    $result = $conn->query($sql);

    echo '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
        <style>
            body {
                font-family: "Arial", sans-serif;
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
    
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }
    
            th, td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: left;
            }
    
            th {
                background-color: #3498db;
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
    
            /* Apply animations to the table */
            table {
                animation: rotateIn 1s ease-in-out, fadeIn 1s ease-in-out;
            }
        </style>
    </head>
    
    <body>
        <h2>Search Results:</h2>';
    
    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>FName</th><th>Lname</th><th>Gender</th><th>Dob</th><th>Contact No</th><th>Doctor Id</th></tr>';
    
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["patient_id"] . '</td>';
            echo '<td>' . $row["Fname"] . '</td>';
            echo '<td>' . $row["Lname"] . '</td>';
            echo '<td>' . $row["gender"] . '</td>';
            echo '<td>' . $row["dob"] . '</td>';
            echo '<td>' . $row["contact_no"] . '</td>';
            echo '<td>' . $row["doc_id"] . '</td>';
            echo '</tr>';
        }
    
        echo '</table>';
    } else {
        // No results found
        echo '<script>';
        echo "alert('No results found.');";
        echo "window.location.href = 'search_results.php';"; // Replace 'homepage.php' with the actual homepage URL
        echo '</script>';
    }
    
    echo '</body></html>';
}
?>
