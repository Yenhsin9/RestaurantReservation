<?php
// 開啟錯誤訊息
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ******** update your personal settings ******** 
$servername = "140.122.184.129:3310";
$username = "team20";
$password = "5EGyOY_grkiT[U0j";
$dbname = "team20";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['fullname']) && isset($_POST['account']) && isset($_POST['password']) && isset($_POST['comfirm_password'])) {
        // 取得當前最大的 id 並轉換為數值型
        $checkId_sql = 'SELECT MAX(CAST(id AS UNSIGNED)) AS maxNum FROM login';
        $check_result = $pdo->query($checkId_sql);
        $row = $check_result->fetch(PDO::FETCH_ASSOC);
        $maxNum = intval($row['maxNum']) + 1;
        
        // 將最大 id 轉換為字串
        $strmaxNum = strval($maxNum);
        $Fullname = $_POST['fullname'];
        $Account = $_POST['account'];
        $Password = $_POST['password'];

        $stmt = $pdo->prepare("INSERT INTO login (id, account, password, fullname) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            //綁定參數
            $stmt->bindParam(1, $strmaxNum, PDO::PARAM_STR);
            $stmt->bindParam(2, $Account, PDO::PARAM_STR);
            $stmt->bindParam(3, $Password, PDO::PARAM_STR);
            $stmt->bindParam(4, $Fullname, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                echo "新增成功!!<br> <a href='login.html'>返回主頁</a>";
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
        echo "此帳號已經存在！請重新填寫！<br> ";
		echo "<a href='javascript:history.back()'>返回上一頁</a>";
    } else {
        // others
    }
}
$pdo = null;
?>
