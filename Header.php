<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="mainpage.php" class="active">Home</a>
                        </li>
                        <li class="scroll-to-section">
                            <?php include 'printFullname.php'; ?>
                        </li>
                        <li class="scroll-to-section">
                            <a href="membercenter.php">Member Informaiton</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="#footer">Contact Us</a>
                        </li>
                        <li class="scroll-to-section">
                        <a id="logout-link">Logout</a>
                        </li>
                    </ul>
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

<script>
      document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        var userConfirmed = confirm('Are you sure you want to log out？'); 
        if (userConfirmed) {
          window.location.href = 'login.html';
        }
      });
    </script>