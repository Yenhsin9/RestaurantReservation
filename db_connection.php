<?php
    $host = 'localhost';
    $dbuser ='root';
    $dbpassword = ''; //enter your own password here
    $dbname = 'restaurant_reservation';

    // Connecting to and selecting a MySQL database
    $conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

    if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $conn->error);
        exit();
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>
