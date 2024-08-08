<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_POST['account']) {
        $Account = $_POST['account'];
        // ******** update your personal settings ******** 
        $host = 'localhost';
        $dbuser ='root';
        $dbpassword = '';
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
