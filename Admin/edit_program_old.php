<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Program - Lalani Assoociates</title>
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
              <h5 class="card-title">Edit Program</h5>
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
              <?php
                include 'php_action/config.php' ;
                $id = $_GET['id'];
                $sql = "SELECT * FROM program where id = $id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
       
                ?>
              <form class="row g-3" id="teamForm" method="POST" action="update_program.php" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id'] ?>">

                <div class="col-md-6">
                  <label for="title" class="form-label">Edit Program Title</label>
                  <textarea class="form-control" id="title" name="title" placeholder="Enter program title" rows="4"><?php echo $row['title'] ?></textarea>
                </div>
                <div class="col-md-6">
                  <label for="Metadata" class="form-label">Metadata</label>
                  <textarea class="form-control" id="Metadata" name="Metadata" placeholder="Enter program Metadata" rows="4" required><?php echo $row['metadata'] ?></textarea>
                </div>              
                <div class="col-md-6">
                  <label for="program_image" class="form-label">Program Image</label>
                  <input type="file" class="form-control" name="fileToUpload" id="program_image" accept=".png, .jpeg, .jpg, .webp">
                  <?php if (!empty($row['Image'])): ?>
                        <img class="myImg" src="<?php echo $row['Image'] ?>" height="100" width="100" style="cursor: pointer;">
                    <?php else: ?>
                        <img class="myImg" src="default_Image.jpg" height="100" width="100" style="cursor: pointer;">
                    <?php endif; ?>
                  <div id="error-message" style="color: red; margin-top: 10px;"></div>
                </div>
                <div class="col-md-6">
                  <label for="detail_image" class="form-label">Program Detail Image</label>
                  <input type="file" class="form-control" name="fileToUpload2" id="detail_image" accept=".png, .jpeg, .jpg, .webp" >
                  <?php if (!empty($row['deatil_image'])): ?>
                        <img class="myImg" src="<?php echo $row['deatil_image'] ?>" height="100" width="100" style="cursor: pointer;">
                    <?php else: ?>
                        <img class="myImg" src="default_deatil_image.jpg" height="100" width="100" style="cursor: pointer;">
                    <?php endif; ?>
                  <div id="error-detail" style="color: red; margin-top: 10px;"></div>
                </div>
                <div class="col-md-6">
                  <label for="p_country" class="form-label">Program Country</label>
                  <select id="p_country" class="form-select" name="p_country">
                        <option value="<?php echo $row['country'] ?>"><?php echo $row['country'] ?></option>
                        <option value="Australia">Australia</option>
                        <option value="Canada">Canada</option>
                        <option value="USA">USA</option>
                        <option value="Caribbean">Caribbean</option>
                        <option value="Europe">Europe</option>                        
                        <option value="Turkey">Turkey</option>
                    </select>
                </div>
                <div class="col-md-6">
                  <label for="p_form" class="form-label">Program Form</label>
                  <select id="p_form" class="form-select" name="p_form">
                        <option value="<?php echo $row['program_form'] ?>"><?php echo $row['program_form'] ?></option>
                        <option value="detail_form">Detail Form</option>
                        <option value="sample_form">Sample Form</option>
                    </select>
                </div>
                <div class="col-md-12">
                  <label for="details" class="form-label">Program Detail</label>
                  <textarea class="tinymce-editor" id="details" name="details" placeholder="Enter program detail" rows="4" ><?php echo $row['program_detail'] ?></textarea>
                </div>
                <div class="text-center">
                  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
              <?php }} ?>
            </div>
          </div>
          <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
  </main><!-- End #main -->

 
  <?php include 'include/footer.php'; ?>

</body>
<script>
  document.getElementById('program_image').addEventListener('change', function(event) {
  const file = event.target.files[0];
  const errorMessage = document.getElementById('error-message');
  errorMessage.textContent = '';

  if (!file) {
    return;
  }

  // Validate file type
  const validTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
  if (!validTypes.includes(file.type)) {
    errorMessage.textContent = 'Only PNG or JPEG or JPG or WebP files are allowed.';
    return;
  }

// Validate file size (less than 1 MB)
const maxSizeInBytes = 1 * 1024 * 1024; // 1 MB in bytes
if (file.size > maxSizeInBytes) { // Less than or equal to 1 MB
  errorMessage.textContent = 'File size must be less than 1 MB.';
  return;
}
  // Validate image dimensions (150x150)
  const img = new Image();
  img.onload = function() {
    if (img.width > 1342 || img.height > 897) {
      errorMessage.textContent = 'Image dimensions must be less than or equal to  width=1342, Height=897 pixels.';
    }
  };
  img.onerror = function() {
    errorMessage.textContent = 'Error loading image. Please try another file.';
  };
  img.src = URL.createObjectURL(file);
});


document.getElementById('detail_image').addEventListener('change', function(event) {
  const file = event.target.files[0];
  const errorMessage = document.getElementById('error-detail');
  errorMessage.textContent = '';

  if (!file) {
    return;
  }

  // Validate file type
  const validTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
  if (!validTypes.includes(file.type)) {
    errorMessage.textContent = 'Only PNG or JPEG or JPG or WebP files are allowed.';
    return;
  }

// Validate file size (less than 1 MB)
const maxSizeInBytes = 1 * 1024 * 1024; // 1 MB in bytes
if (file.size > maxSizeInBytes) { // Less than or equal to 1 MB
  errorMessage.textContent = 'File size must be less than 1 MB.';
  return;
}
  // Validate image dimensions (150x150)
  const img = new Image();
  img.onload = function() {
    if (img.width > 1920 || img.height > 600) {
      errorMessage.textContent = 'Image dimensions must be less than or equal to  width=1920, Height=600 pixels.';
    }
  };
  img.onerror = function() {
    errorMessage.textContent = 'Error loading image. Please try another file.';
  };
  img.src = URL.createObjectURL(file);
});

</script>
 <!-- Vendor JS Files -->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/tinymce/int-tinymce.js"></script>
  <script src="assets/js/popup.js"></script>
</html>
