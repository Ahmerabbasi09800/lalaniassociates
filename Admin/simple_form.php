<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Simple Form - Lalani Assoociates</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/images/title_icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
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
                <h5 class="card-title">Simple Form Detail</h5>
                <div>
                    <a href="#" class="btn btn-primary">Add New</a>
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
              <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Program Name</th>
                      <th>Program Image</th>
                      <th>Age</th>
                      <th>Education</th>
                      <th>Occupation</th>
                      <th>Number</th>
                      <th>City</th>
                      <th>No of child</th>
                      <th>No of child above 18</th>
                      <th>Location</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  include 'php_action/config.php' ;
                 
                  $sql = "SELECT s.*, p.id AS programid, p.title AS p_title, p.Image
                  FROM sample_form s
                  JOIN program p ON s.pro_id = p.id WHERE s.pro_id = p.id ORDER BY id DESC";
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
                      <td><?php echo $row['p_title'] ?></td>
                      <td><img class="myImg" src="<?php echo $row['Image'] ?>" height="100" width="100" style="cursor: pointer;"></td>                   
                      <td><?php echo $row['age'] ?></td>
                      <td><?php echo $row['eduction'] ?></td>
                      <td><?php echo $row['occupation'] ?></td>
                      <td><?php echo $row['number'] ?></td>
                      <td><?php echo $row['city'] ?></td>
                      <td><?php echo $row['no_of_child'] ?></td>
                      <td><?php echo $row['no_child_18'] ?></td>
                      <td><?php echo $row['user_location'] ?></td>
                      <td><?php echo date('F j, Y h:i:s A', strtotime($row['created_at'])); ?></td>
                      <td><?php echo date('F j, Y h:i:s A', strtotime($row['updated_at'])); ?></td>
                      <td><a href="delete_testimonial.php?id=<?php echo $row['id']; ?>" onclick="return ourteamDelete();">
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

    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
      <div id="caption"></div>
    </div>
  </main><!-- End #main -->

  <?php include 'include/footer.php'; ?>
  
  <!-- JS -->
  <script>
    function ourteamDelete() {
      return confirm('Are you sure you want to delete this Testimonial?');
    }
  </script>
  <script src="assets/js/popup.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Initialize DataTable with buttons and responsive features
  var table = $('#example').DataTable({
    dom: 'Blfrtip',
    buttons: ['colvis'],
    responsive: true
  });
});

</script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<!-- Other DataTables extensions scripts -->

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

</body>
</html>
