<?php
// ******** update your personal settings ******** 
$servername = "140.122.184.129:3310";
$username = "team20";
$password = "5EGyOY_grkiT[U0j";
$dbname = "team20";

// Connecting to and selecting a MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['account']) && isset($_POST['password'])) {
	$Account = $_POST['account'];
	$Password = $_POST['password'];
	$checkAcc_sql = "SELECT count(id) as count, password FROM login WHERE account = '$Account' ";		   
	$check_result = $conn->query($checkAcc_sql);
    $row = $check_result->fetch_assoc();
	$count = $row['count'];
    $CorrectPassword = $row['password'];
    if($count === '0'){
        echo "查無此用戶<br> <a href='login.html'>返回主頁</a>";
    }elseif($count !== '0' and $Password!==$CorrectPassword){
        echo "密碼或帳號錯誤<br> <a href='login.html'>返回主頁</a>";
    }
    else{
        echo '<form id="redirectForm" action="Global.php" method="post">
        <input type="hidden" name="account" value="' . $Account . '" />
        </form>';
        echo '<script>
              document.getElementById("redirectForm").submit();
          </script>';
    }

}else{
	echo "資料不完全";
}
				
?>

