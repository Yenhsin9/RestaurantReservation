<?php
// 開啟錯誤訊息
error_reporting(E_ALL);
ini_set('display_errors', 1);

 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];

    $memberID = $_SESSION['memberID'];
    $FindName_sql = "SELECT * FROM user WHERE ID_num = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();
    $Fullname = $row['Name'];
    $Phone = $row['phone_number'];
    $check_existing_sql = "SELECT * FROM reservations WHERE Re_id = '$memberID' AND date = '$date' AND type = '$type'";
    $result = $conn->query($check_existing_sql);
    if ($result->num_rows > 0) {
        echo "You already have a reservation at " . $type . " restaurant today, can’t make a reservation again. <br> ";
        echo "<a href='javascript:history.back()'>Back to reservation page</a>";
    }else{
        $InsertRev_sql = "INSERT INTO reservations (Re_id, 	Name, phone_number, date, time,people, type) VALUES ('$memberID', '$Fullname', '$Phone', '$date', '$time','$people', '$type')";
        if ($conn->query($InsertRev_sql) === TRUE) {
            echo "<script type='text/javascript'>
                alert('Reservation successful!');
                window.location.href = 'mainpage.php';
                </script>";
            exit;
        } else {
            echo "Error inserting record: " . $conn->error;
            echo "<h2 align='center'><font color='antiquewith'>Reservation failed!!</font></h2>";
        }
    }

} else {
    echo "請使用表單來提交數據。";
}
?>
