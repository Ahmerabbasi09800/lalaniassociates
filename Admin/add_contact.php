<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Contact - lalaniassoociates</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/images/title_icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php include 'include/header.php'; ?>

<?php include 'include/side_bar.php'; ?>

  <main id="main" class="main">


  <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Contact US</h5>
              <?php
              // Display success message if set
              if (isset($_SESSION['success_message'])) {
                  echo '<div class="message success">' . $_SESSION['success_message'] . '</div>';
                  unset($_SESSION['success_message']);
              }

              // Display error message if set
              if (isset($_SESSION['error_message'])) {
                  echo '<div class="message error">' . $_SESSION['error_message'] . '</div>';
                  unset($_SESSION['error_message']);
              }
              ?>
              <!-- Multi Columns Form -->
              <form class="row g-3" method="POST" action="insert_contact.php">
                <div class="col-md-6">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject">
                </div>
                <div class="col-md-6">
                  <label for="interest" class="form-label">Interest</label>
                  <select id="interest" class="form-select" name="interest" required>
                        <option value="" disabled selected>Select your interest</option>
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                        <option value="third_choice">Third Choice</option>
                        <option value="turkey">Turkey</option>
                        <option value="europe">Europe</option>
                        <option value="caribbean_islands">Caribbean Islands</option>
                    </select>
                </div>
                <div class="col-8">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Enter Your Message" rows="4"></textarea>
                </div>
                <div class="text-center">
                  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

  </main><!-- End #main -->

  <?php include 'include/footer.php'; ?>

</body>

</html>