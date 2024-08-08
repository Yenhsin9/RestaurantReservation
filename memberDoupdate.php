<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>Restaurant reservation - Member Page</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css" />
    <link rel="stylesheet" href="assets/css/owl-carousel.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />

    <style>
    .member-info-container {
        text-align: center;
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .member-info-container h2 {
        margin-bottom: 20px;
    }

    .info-row {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 10px;
    }

    .info-row label {
        width: 120px;
        text-align: right;
        margin-right: 10px;
    }

    .info-row span {
        display: inline-block;
        text-align: left;
    }

    .info-row input {
        flex: 1;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .member-info-container form {
        margin-top: 20px;
    }

    .member-info input[type="submit"] {
        background-color: #000;
        color: white;
        /* 文字颜色为白色 */
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .member-info input[type="submit"]:hover {
        background-color: #000;
    }
    </style>
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <?php include 'Header.php'; ?>
    <!-- ***** Header Area End ***** -->

    <!-- *****  會員資訊 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="member-info-container">
            <h2>Member information</h2>
            <br>

            <div class="info-row">
                <?php
                    $FindName_sql = "SELECT * FROM user WHERE ID_num = '$memberID'";
                    $FindName_result = $conn->query($FindName_sql);
                    $row = $FindName_result->fetch_assoc();

                    $Account = $row['Account'];
                ?>
                <label>Account：</label>
                <span><?php echo $Account; ?></span>
            </div>

            <form class="member-info" action="memberUpdate.php" method="post" onsubmit="return validateForm()">
                <div class="info-row">
                    <label for="member_password">Password：</label>
                    <input type="text" id="member_password" name="member_password" placeholder="Password" />
                </div>
                <div class="info-row">
                    <label for="fullname">Name：</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Name" />
                </div>
                <div class="info-row">
                    <label for="phone_number">Phone number：</label>
                    <input type="text" id="phone_number" name="phone_number" placeholder="Phone number" />
                </div>
                <div class="info-row">
                    <label for="E_mail">Email：</label>
                    <input type="e-mail" id="E_mail" name="E_mail" placeholder="Email" />
                </div>
                <input type="submit" value="confirm" class="submit" />
            </form>
        </div>
    </section>

    <!-- ***** Footer Start ***** -->
    <?php include 'Footer.php'; ?>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div")
                .not("." + selectedClass)
                .fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);
        });
    });

    function validateForm() {
        //var phoneNumber = document.getElementById("phone_number").value;
        var email = document.getElementById("E_mail").value;
        //var taiwanPhonePattern = /^09\d{8}$/;
        var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        // if (phoneNumber && !taiwanPhonePattern.test(phoneNumber)) {
        //     alert("請輸入有效的台灣電話號碼（09開頭，總共10位數字）");
        //     return false;
        // }

        if (email && !gmailPattern.test(email)) {
            alert("Please enter a valid Gmail email address");
            return false;
        }

        return true;
    }
    </script>
</body>

</html>