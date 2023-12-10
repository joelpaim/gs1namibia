<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
include 'config.php'; // Include the configuration file with database credentials

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    

    // Basic form validation
    if (empty($name) || empty($email)) {
        die("Invalid form data");
    }

   

    // Prepare and execute the SQL query with prepared statements
    $stmt = $conn->prepare("INSERT INTO subscribers (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {

            echo "Subscription successful!";
        
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    header("Location:index.html");
}
?>
