<?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        include 'db_connection.php';
        $FindBooking_sql = "SELECT * FROM reservations WHERE Re_id = '$memberID'";
        $FindBooking_result = $conn->query($FindBooking_sql);
        if ($FindBooking_result->num_rows > 0) {
            while($row = $FindBooking_result->fetch_array()){
                $Name = $row['Name'];
                $Phone = $row['phone_number'];
                $Date = $row['date']; 
                $Time= $row['time'];
                $People = $row['people'];
                $Type = $row['type'];
                echo '<tr align="center">
                <td>'.$Type.'</td>
                <td>'.$Name.'</td>
                <td>'.$Date.'</td>
                <td>'.$Time.'</td>
                <td>'.$People.'</td>
                <td>
                    <form method="post" action="bookingdelete.php">
                        <input type="hidden" name="Date" value="' . $Date . '">
                        <input type="hidden" name="Type" value="' . $Type . '">
                        <input type="submit" name="delete" class="link" value="Delete"/>
                    </form>
                </td>
                <tr>';
            }
            echo '</table>';
          
        }else{
            echo '<tr align="center" >
                <td colspan="7">購物車目前是空的喔！</td>
                <tr>';
            echo '</table>';
            echo '</div>';
        }
?>

<script>
    function updateCart() {
        var form = document.getElementById("updateForm");
        form.submit();
    }
</script>
