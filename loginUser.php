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
	$checkAcc_sql = "SELECT count(ID_num) as count, password FROM user WHERE Account = '$Account' ";		   
	$check_result = $conn->query($checkAcc_sql);
    $row = $check_result->fetch_assoc();
	$count = $row['count'];
    $CorrectPassword = $row['password'];
    if($count === '0'){
        echo "Can not find the user<br> <a href='login.html'>Back to Login page</a>";
    }elseif($count !== '0' and $Password!==$CorrectPassword){
        echo "Wrong password or account<br> <a href='login.html'>Back to Login page</a>";
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

