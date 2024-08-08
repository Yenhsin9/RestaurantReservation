<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_POST['account']) {
        $Account = $_POST['account'];
        include 'db_connection.php';
        
        $FindName_sql = "SELECT * FROM user WHERE Account = '$Account'";
        $FindName_result = $conn->query($FindName_sql);
        $row = $FindName_result->fetch_assoc();
        $id= $row['ID_num'];
        $_SESSION['memberID'] = $id; 
        header("Location: mainpage.php");
    }else{
        echo 'nothing';
    }
?>
