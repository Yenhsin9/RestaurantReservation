<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include 'db_connection.php';

    $memberID = $_SESSION['memberID']; 
    
    $FindName_sql = "SELECT * FROM user WHERE ID_num = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();
    $Fullname = $row['Name'];
    echo "<a >Hi, $Fullname</a>";
?>