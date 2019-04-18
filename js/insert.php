<?php
    
    session_start();
    $host = "localhost";
    $user = "lgarcia2013";
    $password = "UCT2m21h4q";
    $database = "lgarcia2013";
    
    $conn = new mysqli($host, $user, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;        
    }

    //$ID = $_POST['id'];
    $Publisher = $_POST['tag'];
    $Title = $_POST['Title'];
    $Sub_Title = $_POST['subTitle'];
    $iNumber = $_POST['iNumber'];
    $iDate = $_POST['iDate'];
    $cPrice = $_POST['cPrice'];
    $Xondition = $_POST['condTag'];
    $TRover = $_POST['img'];
    
    $sql = "INSERT INTO myCBC (`tag`,`Title`,`subTitle`,`iNumber`,`iDate`,`cPrice`,`condTag`, `img`)
             VALUES ('$Publisher','$Title','$Sub_Title', '$iNumber','$iDate','$cPrice','$Xondition', '$TRover')";
    
    if(!mysqli_select_db($conn,'lgarcia2013'))
    {
        echo 'DB Not Selected';
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    header("refresh:2; url=http://lamp.cse.fau.edu/~lgarcia2013/cbc2");
?>