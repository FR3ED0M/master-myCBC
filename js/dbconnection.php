<?php
           
        $host = "localhost";
        $user = "username";
        $password = "password";
        $database = "username";
        
        $conn = new mysqli($host, $user, $password, $database);        

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;        
        }
        
?>
