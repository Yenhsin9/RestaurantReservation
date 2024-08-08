<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
      rel="stylesheet"
    />

    <title>Restaurant Reservation</title>

    <!-- Additional CSS Files -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
    />

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css" />

    <link rel="stylesheet" href="assets/css/owl-carousel.css" />

    <link rel="stylesheet" href="assets/css/lightbox.css" />

    <script>
        // 法國餐廳: 禁用週末日期
        function validateFranceDate() {
            const dateInput = document.getElementById('france-date');
            const timeSelect = document.getElementById('france-time');
            const submitButton = document.querySelector('#france-form input[type="submit"]');

            const selectedDate = new Date(dateInput.value);
            const day = selectedDate.getUTCDay();

            // 如果選擇的日期是週末，禁用時間選擇和提交按鈕
            if (day === 0 || day === 6) {
                alert("The French restaurant does not allow weekend reservations, please select a non-weekend date");
                dateInput.value = '';
                timeSelect.setAttribute('disabled', true);
                submitButton.setAttribute('disabled', true);
            } else {
                timeSelect.removeAttribute('disabled');
                submitButton.removeAttribute('disabled');
            }
        }
    </script>
    <script src="assets/js/dateOption.js"></script>
    <!--
TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
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

    <!-- ***** Top Area Starts ***** -->
    <section class="section" id="chinese">
      <div class="container">
        <div class="row">
        <h2>Restaurant Opening time</h2>
        </div>
      </div>
      <div class="container">
      <div class="row">
        <table style="width:100%" border="1">
          <tr>
          <th>Italy</th>
          <th>China</th>
          <th>France</th>
          </tr>
          <tr>
          <td>Open every day from 7pm - 10pm</td>
          <td>Open everyday from 5pm - 10pm</td>
          <td>Open Monday - Friday from 7pm - 10pm</td>
          </tr>
          <tr> 
          <td>
            <a href="#korean">Go to Reserve</a>
					</td>
          <td>
            <a href="#japanese">Go to Reserve</a>
					</td>
          <td>
            <a href="#english">Go to Reserve</a>
					</td>
          </tr>
        </table>
      </div>
      </div>
    </section>
    <!-- ***** Top Area Ends ***** -->

    <!-- *****Italy Area Starts ***** -->
    <section class="section" id="korean">
      <div class="container">
        <div class="row">
        <h2>Italy Restaurant Booking form</h2>
        </div>
      </div>
      <div class="container">
      <div class="row">
      <form action="process_reservation.php" method="POST">
      <input type="hidden" name="type" value="Italy" />
        <label for="date1">Choose the date:</label>
        <input type="date" id="date1" name="date" min="<?php echo date("Y-m-d");?>"required><br><br>

        <label for="time1">Choose the time period:</label>
        <select id="time1" name="time" required>
            
        </select><br><br>
        <label for="people">Number of people:</label>
        <input type="number" id="people" name="people" min="1" max="20" required><br><br>

        <input type="submit" value="Sent the reservation">
    </form>
      </div>
      </div>
    </section>
    <!-- ***** Italy Area Ends ***** -->

    <!-- ***** China Area Starts ***** -->
    <section class="section" id="japanese">
    <div class="container">
        <div class="row">
        <h2>China Restaurant Booking form</h2>
        </div>
      </div>
      <div class="container">
      <div class="row">
      <form action="process_reservation.php" method="POST">
      <input type="hidden" name="type" value="China" />
        <label for="date2">Choose the date:</label>
        <input type="date" id="date2" name="date" min="<?php echo date("Y-m-d");?>"required><br><br>

        <label for="time2">Choose the time period:</label>
        <select id="time2" name="time" required>
        <option value="5pm-6pm">5pm-6pm</option>

        </select><br><br>

        <label for="people">Number of people:</label>
        <input type="number" id="people" name="people" min="1" max="20" required><br><br>

        <input type="submit" value="Sent the reservation">
    </form>
      </div>
      </div>
    </section>
    <!-- ***** China Area Ends ***** -->

<!-- ***** France Area Starts ***** -->
<section class="section" id="english">
        <div class="container">
            <div class="row">
                <h2>France Restaurant Booking form</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <form id="france-form" action="process_reservation.php" method="POST">
                  <input type="hidden" name="type" value="France" />
                    <label for="france-date">Choose the date:</label>
                    <input type="date" id="france-date" name="date" min="<?php echo date("Y-m-d");?>" required onchange="validateFranceDate()"><br><br>

                    <label for="france-time">Choose the time period:</label>
                    <select id="france-time" name="time" required>
                    </select><br><br>

                    <label for="france-people">Number of people:</label>
                    <input type="number" id="france-people" name="people" min="1" max="20" required><br><br>

                    <input type="submit" value="Sent the reservation">
                </form>
            </div>
        </div>
    </section>
    <!-- ***** France Area Ends ***** -->

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
      $(function () {
        var selectedClass = "";
        $("p").click(function () {
          selectedClass = $(this).attr("data-rel");
          $("#portfolio").fadeTo(50, 0.1);
          $("#portfolio div")
            .not("." + selectedClass)
            .fadeOut();
          setTimeout(function () {
            $("." + selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
          }, 500);
        });
      });
    </script>
  </body>
</html>