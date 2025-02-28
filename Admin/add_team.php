<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Team/Advisor - Lalani Assoociates</title>
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
              <h5 class="card-title">Add New Team / Advisor</h5>
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
              <form class="row g-3" id="teamForm" method="POST" action="insert_team.php" enctype="multipart/form-data">
                <div class="col-md-6">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col-md-6">
                  <label for="field" class="form-label">Field</label>
                  <input type="text" class="form-control" name="field" id="field" required>
                </div>
                <div class="col-md-6">
                  <label for="profile_pic" class="form-label">Profile</label>
                  <input type="file" class="form-control" name="fileToUpload" id="profile_pic" accept=".png, .jpeg, .jpg, .webp" required>
                  <div id="error-message" style="color: red; margin-top: 10px;"></div>
                </div>
                <div class="col-md-6">
                  <label for="team" class="form-label">Team / Advisor</label>
                  <select id="team" class="form-select" name="team" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="1">Team</option>
                        <option value="0">Advisor</option>
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
<script>
  document.getElementById('profile_pic').addEventListener('change', function(event) {
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
    if (img.width !== 150 || img.height !== 150) {
      errorMessage.textContent = 'Image dimensions must be 150x150 pixels.';
    }
  };
  img.onerror = function() {
    errorMessage.textContent = 'Error loading image. Please try another file.';
  };
  img.src = URL.createObjectURL(file);
});

</script>
</html>
