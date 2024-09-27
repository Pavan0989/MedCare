<?php
// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get user type and password from the request
$userType = sanitize_input($_POST["userType"]);
$enteredPassword = sanitize_input($_POST["password"]);

// Define correct passwords
$adminPassword = "admin_password";
$userPassword = "user_password";

// Check user type and validate password
if ($userType === "admin" && $enteredPassword === $adminPassword) {
    echo "Admin login successful!";
} elseif ($userType === "user" && $enteredPassword === $userPassword) {
    echo "User login successful!";
} else {
    echo "Invalid password for " . ucfirst($userType);
}
?>
