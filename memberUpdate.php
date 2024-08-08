<?php
    // 開啟錯誤訊息
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    $memberID = $_SESSION['memberID'];

    $FindName_sql = "SELECT * FROM user WHERE ID_num = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();

    $Account = $row['Account'];

    function updateField($conn, $memberID, $fieldName, $postValue, $rowValue) {
        if (isset($postValue) && $postValue != '') {
            $update_sql = "UPDATE user SET `$fieldName` = '$postValue' WHERE ID_num = '$memberID'";
            $conn->query($update_sql);
            return $postValue;
        } else {
            return isset($rowValue) ? $rowValue : '';
        }
    }

    $Member_password = updateField($conn, $memberID, 'password', $_POST['member_password'] ?? null, $row['password'] ?? '');
    $Fullname = updateField($conn, $memberID, 'Name', $_POST['fullname'] ?? null, $row['Name'] ?? '');
    $Phone = updateField($conn, $memberID, 'phone_number', $_POST['phone_number'] ?? null, $row['phone_number'] ?? '');
    $Mail = updateField($conn, $memberID, 'E_mail', $_POST['E_mail'] ?? null, $row['E_mail'] ?? '');

    header('Location: membercenter.php');
    exit();
?>
