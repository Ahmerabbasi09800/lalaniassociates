<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add faq - Lalani Assoociates</title>
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
              <h5 class="card-title">Add New Faq</h5>
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
              <form class="row g-3" id="teamForm" method="POST" action="insert_faq.php">
                <div class="col-6">
                    <label for="question" class="form-label">Question</label>
                    <textarea class="form-control" id="question" name="question" placeholder="Enter Your Question" rows="4"></textarea>
                </div>
                <div class="col-6">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" placeholder="Enter Your Answer" rows="4"></textarea>
                </div>
                <div class="col-md-6">
                  <label for="program" class="form-label">Add Program</label>
                  <select id="program" class="form-select" name="program" required>
                  <option value="" disabled selected>Select program</option>
                  <?php
                include 'php_action/config.php' ;
                $sql = "SELECT id, title FROM program";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>

                        <?php }} ?>
                    </select>
                </div>
                <div class="text-center">
                  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
            </div>
          </div>

  </main><!-- End #main -->

  <?php include 'include/footer.php'; ?>

</body>

</html>
