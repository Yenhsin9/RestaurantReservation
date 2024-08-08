<?php
// error message
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

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

