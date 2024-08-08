<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    if (isset($_POST['Date'])&&isset($_POST['Type'])) {
        $memberID = $_SESSION['memberID']; 
        $Date = $_POST['Date'];
        $Type = $_POST['Type'];
        $delete_sql = "DELETE FROM reservations WHERE Re_id = '$memberID' and date = '$Date' and type ='$Type'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "<script type='text/javascript'>
            alert('successfully deleted!');
            window.location.href = 'bookingPage.php';
            </script>";
            exit;
        }else{
            echo "Deleted failed!";
        }
    }else{
        echo "資料不完全";
    }
?>

<script>
      document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        var userConfirmed = confirm('您確定要登出嗎？'); 
        if (userConfirmed) {
          window.location.href = 'login.html';
        }
      });
</script>