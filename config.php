<?php

// Database connection details
 $servername = "localhost"; 
 $username = "root"; 
 $password = ""; 
 $database = "gsnamibi"; 

// Create a connection to the MySQL server
 $conn = new mysqli($servername, $username, $password, $database);

 // Check the connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }  
 

?>