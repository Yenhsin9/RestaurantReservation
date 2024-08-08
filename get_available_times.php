<?php
// 開啟錯誤報告
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db_connection.php';

// 獲取用戶選擇的日期和餐廳類型
$date = $_GET['date'] ?? '';
$type = $_GET['type'] ?? '';
$memberID = $_SESSION['memberID']; 

// 設置根據餐廳類型可用的時間段
if ($type == "Italy" || $type == "France") {
    $allTimes = ['7pm-8pm', '8pm-9pm', '9pm-10pm'];
} else if($type == "China"){
    $allTimes = ['5pm-6pm', '6pm-7pm', '7pm-8pm', '8pm-9pm', '9pm-10pm'];
} else {
    // 預設邏輯
    $allTimes = ['5pm-6pm', '6pm-7pm', '7pm-8pm', '8pm-9pm', '9pm-10pm'];
}

// 查詢已預訂的時間
if ($type) {
    $query = $conn->prepare("SELECT time FROM reservations WHERE date = ? AND type = ? AND Re_id = ?");
    $query->bind_param("sss", $date, $type, $memberID);
} else {
    $query = $conn->prepare("SELECT time FROM reservations WHERE date = ?");
    $query->bind_param("s", $date);
}

$query->execute();
$result = $query->get_result();

$bookedTimes = [];
while ($row = $result->fetch_assoc()) {
    $bookedTimes[] = $row['time'];
}

// 過濾掉已預訂的時間段
$availableTimes = array_diff($allTimes, $bookedTimes);

// 返回可用時間段作為 JSON
header('Content-Type: application/json');
echo json_encode(array_values($availableTimes));

$conn->close();
?>
