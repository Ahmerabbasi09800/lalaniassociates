
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - Lalani Assoociates</title>
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
                <h5 class="card-title">Detail Form</h5>
                <div>
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
              <div class="table-responsive">               
              <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Number</th>
                <th>City</th>
                <th>State</th>
                <th>Child above 18</th>
                <th>Action</th>
                <th>Country</th>
                <th>Nationality</th>
                <th>Program Title</th>
                <th>Program Image</th>
                <th>User Lcation</th>
                <th>Edu: level of Education</th>
                <th>Edu: Program Name</th>
                <th>Edu: Institute / University</th>
                <th>Edu: Edu Country</th>
                <th>Edu: Program Start</th>
                <th>Edu: Program Completion</th>
                <th>Edu: Program Duration</th>
                <th>EMP: Name of Organization</th>
                <th>EMP: Job Title</th>
                <th>EMP: Job From</th>
                <th>EMP: Job To</th>
                <th>EMP: Employment Status</th>
                <th>EMP: Program Complete</th>
                <th>EMP: Resume</th>
                <th>Lang: Test</th>
                <th>Lang: Eng Speaking</th>
                <th>Lang: Eng Writing</th>
                <th>Lang: Eng Reading</th>
                <th>Lang: Eng Listening</th>
                <th>Lang: French Speaking</th>
                <th>Lang: French Writing</th>
                <th>Lang: French Reading</th>
                <th>Lang: French Listening</th>
                <th>Relatives</th>
                <th>Relationship</th>
                <th>Province</th>
                <th>Legal Status</th>
                <th>About Us</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'php_action/config.php' ;

            $sql = "SELECT d.*, p.id AS programid, p.title AS p_title, p.Image AS p_image
            FROM detail_form d
            JOIN program p ON d.pro_id = p.id WHERE d.pro_id = p.id ORDER BY id DESC";
            $counter = 0;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            $counter++; 
            ?>
            <tr>
            <td><?php echo $counter ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['dob'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['number'] ?></td>
                <td><?php echo $row['city'] ?></td>                
                <td><?php echo $row['state'] ?></td>
                <td><?php echo $row['no_child_18'] ?></td>
                <td><a href="delete_detail.php?id=<?php echo $row['id']; ?>" onclick="return ourteamDelete();">
                <i class="bi bi-trash" style="color: red; font-size: 20px;"></i>
                </td>
                <td><?php echo $row['country1'] ?></td>
                <td><?php echo $row['nationality'] ?></td>
                <td><?php echo $row['p_title'] ?></td>
                <td><img src="<?php echo $row['p_image'] ?>" height="100px" width="100px"></td>
                <td><?php echo $row['user_location'] ?></td>
                <td><?php echo $row['level_of_edu'] ?></td>
                <td><?php echo $row['p_name'] ?></td>
                <td><?php echo $row['uni'] ?></td>
                <td><?php echo $row['country2'] ?></td>
                <td><?php echo $row['program_Start'] ?></td>
                <td><?php echo $row['program_completion'] ?></td>
                <td><?php echo $row['program_duration'] ?></td>
                <td><?php echo $row['n_of_org'] ?></td>
                <td><?php echo $row['job_title'] ?></td>
                <td><?php echo $row['job_from'] ?></td>
                <td><?php echo $row['job_to'] ?></td>
                <td><?php echo $row['employment_status'] ?></td>
                <td><?php echo $row['program_complete'] ?></td>
                <td>
                <?php 
                $file = $row['upload_resume'];
                $file_extension = pathinfo($file, PATHINFO_EXTENSION);

                if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                    <img class="myImg" src="<?php echo htmlspecialchars($file); ?>" height="100" width="100" style="cursor: pointer;">
                    <br>
                    <a href="<?php echo htmlspecialchars($file); ?>" download>Download Resume</a>
                <?php elseif (in_array($file_extension, ['pdf', 'doc', 'docx'])): ?>
                    <a href="<?php echo htmlspecialchars($file); ?>" download>Download Resume</a>
                    <script>
                        // Adding a content-type header for better compatibility
                        document.querySelectorAll('a[download]').forEach(function(link) {
                            link.addEventListener('click', function(event) {
                                var xhr = new XMLHttpRequest();
                                xhr.open('GET', this.href, true);
                                xhr.responseType = 'blob';
                                xhr.onload = function() {
                                    var a = document.createElement('a');
                                    a.href = window.URL.createObjectURL(xhr.response);
                                    a.download = '<?php echo basename($file); ?>';
                                    document.body.appendChild(a);
                                    a.click();
                                    document.body.removeChild(a);
                                };
                                xhr.send();
                                event.preventDefault();
                            });
                        });
                    </script>
                <?php else: ?>
                    <p>No valid file available</p>
                <?php endif; ?>

              </td>
                <!-- <td><img class="myImg" src="../uploads/<?php echo $row['upload_resume'] ?>" height="100" width="100" style="cursor: pointer;"></td> -->
                <td><?php echo $row['test'] ?></td>
                <td><?php echo $row['eng_speaking'] ?></td>
                <td><?php echo $row['eng_writing'] ?></td>
                <td><?php echo $row['eng_reading'] ?></td>
                <td><?php echo $row['eng_listening'] ?></td>                
                <td><?php echo $row['fre_speaking'] ?></td>
                <td><?php echo $row['fre_writing'] ?></td>
                <td><?php echo $row['fre_reading'] ?></td>
                <td><?php echo $row['fre_listening'] ?></td>
                <td><?php echo $row['relatives'] ?></td>
                <td><?php echo $row['relationship'] ?></td>
                <td><?php echo $row['province'] ?></td>
                <td><?php echo $row['legal_status'] ?></td>
                <td><?php echo $row['about_us'] ?></td>
                <td><?php echo $row['created_at'] ?></td>
                <td><?php echo $row['updated_at'] ?></td>
            </tr>
            <?php }} ?>
            </tbody>
            </table>
            </div>
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
  <script src="assets/js/popup.js"></script>
  <script>
    function ourteamDelete() {
      return confirm('Are you sure you want to delete this Record?');
    }
  </script>
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
