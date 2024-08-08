<?php
// 開啟錯誤訊息
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ******** update your personal settings ******** 
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'restaurant_reservation';

// Connecting to and selecting a MySQL database
$conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['fullname']) && isset($_POST['account']) && isset($_POST['password']) && isset($_POST['comfirm_password'])) {
        // 取得當前最大的 id 並轉換為數值型
        $checkId_sql = 'SELECT MAX(ID_num) AS maxNum FROM user';
        $check_result = $pdo->query($checkId_sql);
        $row = $check_result->fetch(PDO::FETCH_ASSOC);
        $maxNum = $row['maxNum'] + 1;
        
        // 將最大 id 轉換為字串
        // $strmaxNum = strval($maxNum);
        $Fullname = $_POST['fullname'];
        $Account = $_POST['account'];
        $Password = $_POST['password'];

        $stmt = $pdo->prepare("INSERT INTO user (ID_num, Account, password, Name) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            //綁定參數
            $stmt->bindParam(1, $maxNum, PDO::PARAM_STR);
            $stmt->bindParam(2, $Account, PDO::PARAM_STR);
            $stmt->bindParam(3, $Password, PDO::PARAM_STR);
            $stmt->bindParam(4, $Fullname, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                echo "Create successfully!!<br> <a href='login.html'>Back to Login page</a>";
                exit;
            } 
            $stmt->closeCursor();
        } 
    } else {
        echo "資料不完全";
    }
} catch(PDOException $e) {
    $errorMessage = $e->getMessage(); 
    if (strpos($errorMessage, "Duplicate account") !== false) {
        echo "This account already exists！<br> ";
		echo "<a href='login.html'>Back to previous page</a>";
    } else {
        // others
    }
}
$pdo = null;
?>
