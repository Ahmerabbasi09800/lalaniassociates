<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact Us - Lalani Assoociates</title>
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


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Contact Us</h5>
                <div>
                    <a href="add_contact.php" class="btn btn-primary">Add New</a>
                </div>
            </div>
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

              <!-- Table with stripped rows -->
              <div class="table-responsive">               
              <table class="table datatable text-center">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Subject</th>
                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                    <th>Interest</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include 'php_action/config.php' ;
                $sql = "SELECT * FROM contact_us ORDER BY id DESC";
                $counter = 0;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  $counter++;
                ?>
                  <tr>
                    <td><?php echo $counter ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><?php echo $row['subject'] ?></td>
                    <td><?php echo $row['interest'] ?></td>
                    <td><?php echo $row['message'] ?></td>
                    <td><?php echo date('F j, Y h:i:s A', strtotime($row['created_at'])); ?></td>
                    <td><?php echo date('F j, Y h:i:s A', strtotime($row['updated_at'])); ?></td>
                    <td><a href="edit_contact.php?id=<?php echo $row['id']?>" ><i class="bi bi-pencil" style="color: blue; font-size: 20px;"></i></a>&nbsp;
                    <a href="delete_contact.php?id=<?php echo $row['id']; ?>" onclick="return confirmDelete();">
                    <i class="bi bi-trash" style="color: red; font-size: 20px;"></i>
                    </td>
                  </tr>
                  <?php }} ?>
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'include/footer.php'; ?>

</body>
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this contact?');
}
</script>

</html>