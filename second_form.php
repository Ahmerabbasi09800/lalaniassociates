<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="modinatheme">
    <meta name="description" content="Immigration and Visa Consulting Html Template">
    <!-- ======== Page title ============ -->
    <title>Detail Form || LaLani Associates</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="assets/img/logo/logo.svg">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--<< Font Awesome.css >>-->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!--<< Slick.css >>-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--<< Swiper Slider.css >>-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!--<< Style.css >>-->
    <link rel="stylesheet" href="style.css">

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T7HPW9R2');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
<?php include 'loader.php'; ?>
    <?php include 'header.php';
    include 'php_action/config.php';
    if (isset($_GET['src']) && !empty($_GET['src'])) {
        $src = $_GET['src'];
    } else {
        $src = "Website";
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Sanitize the input to avoid SQL injection
        $program_id = intval($_GET['id']);
        $sql = "SELECT * FROM `program` WHERE id = $program_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>



    <!--<< Breadcrumb Section Start >>-->
    <div class="breadcrumb-wrapper section-padding bg-cover"
        style="background-image: url('Admin/<?php echo $row['deatil_image'] ?>">
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo $row['title'] ?></h1>

            </div>
        </div>
    </div>

    <!--<< Contact Section Start >>-->
    <section class="contact-main-area fix section-padding">

        <div class="container">
            <div class="contact-main-wrapper">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="contact-form-items">
                            <!-- <div class="contact-title">
                                <h3 class="wow fadeInUp" data-wow-delay=".3s">APPLICATION INFORMATION</h3>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                     fields are marked *</p>
                            </div> -->
                            <form action="detail_from.php" id="contact-form" method="POST">
                                <div class="row g-4">
                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s"><?php echo $row['title'] ?>
                                            </h3>
                                        </div>
                                    </div>
                                    <hr class="mb-50">
                                    <input name="pro_id" class="input" value="<?php echo $row['id'] ?>" type="hidden">
                                    <?php }
        }
    } ?>
                                    <input type="hidden" name="referrer" id="referrer"
                                        value="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''; ?>">



                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s">APPLICATION INFORMATION</h3>
                                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                                Required fields are marked *</p>

                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <label for="title">Title</label>
                                            <select id="title" name="title">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Mr.">Mr.</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="name" id="name"
                                                placeholder="Your Name*" required>
                                            <div class="icon">
                                                <i class="fal fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="dob" id="dob"
                                                placeholder="Age&nbsp;*" required>
                                            <div class="icon">
                                                <i class="fal fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="email" name="email" id="email"
                                                placeholder="Email">
                                            <div class="icon">
                                                <i class="fal fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="input" name="number" type="text" pattern="\d{11}"
                                                title="Please enter exactly 11 digits" required
                                                oninput="validateCellNumber(this)" placeholder="Cell Number&nbsp;*">
                                            <div class="icon">
                                                <i class="fal fa-phone"></i>
                                            </div>
                                            <span id="error-message" style="color:red; display:none;">Please
                                                enter exactly 11 digits</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="city" id="city" placeholder="City">
                                            <div class="icon">
                                                <i class="far fa-map-marker-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="state" id="state"
                                                placeholder="State">
                                            <div class="icon">
                                                <i class="far fa-map-marker-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label for="country-dropdown">Country</label>
                                            <select id="country-dropdown" name="country1">
                                                <option value="" disabled selected>Select your country</option>
                                            </select>
                                            <!-- <div class="icon">
                                                <i class="far fa-map-marker-alt"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="nationality" id="nationality"
                                                placeholder="Nationality">
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <br>
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s">EDUCATION</h3>
                                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                                Required fields are marked *</p>

                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="level_of_edu" id="level_of_edu"
                                                placeholder="Level of Education(Degree)&nbsp;*" required>
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="p_name" id="p_name"
                                                placeholder="Program Name">
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label for="educountry">Country</label>
                                            <select id="educountry" name="country2">
                                                <option value="" disabled selected>Select your country</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label>Program Start</label>
                                            <input class="'input" type="date" name="program_Start" id="program_Start"
                                                placeholder="Program Start">

                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label>Program Completion</label>
                                            <input class="'input" type="date" name="program_completion"
                                                id="program_completion" placeholder="Program Completion">

                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label for="program_duration">Program Duration</label>
                                            <select id="program_duration" name="program_duration">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Less Than 1 Year">Less Than 1 Year</option>
                                                <option value="Less Than 2 Year">Less Than 2 Year</option>
                                                <option value="Less Than 3 Year">Less Than 3 Year</option>
                                                <option value="Less Than 4 Year">Less Than 4 Year</option>
                                                <option value="5 or More Years">5 or More Years</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <br>
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s">EMPLOYMENT</h3>


                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="n_of_org" id="n_of_org"
                                                placeholder="Name of Organization">
                                            <div class="icon">
                                                <i class="far fa-city"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input class="'input" type="text" name="job_title" id="job_title"
                                                placeholder="Job Title">
                                            <div class="icon">
                                                <i class="far fa-city"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label>From</label>
                                            <input class="'input" type="date" name="job_from" id="job_from"
                                                placeholder="From">
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label>To</label>
                                            <input class="'input" type="date" name="job_to" id="job_to"
                                                placeholder="To">
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label for="employment_status">Employment Status</label>
                                            <select id="employment_status" name="employment_status">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Self Employed">Self Employed</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label>Program Completion</label>
                                            <input class="'input" type="date" name="program_complete"
                                                id="program_complete" placeholder="Program Completion">


                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <label>Upload Resume</label>
                                            <input class="'input" type="file" name="fileToUpload" id="fileToUpload"
                                                placeholder="Resume">
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <br>
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s">LANGUAGE</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <lable>Do You Have Given Language Test?</lable><br>
                                            <div class="radio-inline" style="display: flex;">
                                                <label style="display: flex;gap:5px">
                                                    <input type="radio" name="test" value="yes"
                                                        onclick="toggleInputs()">
                                                    Yes
                                                </label>&nbsp; &nbsp; &nbsp;
                                                <label style="display: flex;gap:5px">
                                                    <input type="radio" name="test" value="no" onclick="toggleInputs()">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->


                                    <div class="col-md-8"></div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="english-inputs">
                                        <div class="form-clt">
                                            <label>English</label>
                                            <input class="input" name="english" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="speaking-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Speaking</label>
                                            <select id="dropdown" name="eng_speaking">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="writing-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Writing</label>
                                            <select id="dropdown" name="eng_writing">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" data-wow-delay=".5s" id="empty-inputs"></div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="reading-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Reading</label>
                                            <select id="dropdown" name="eng_reading">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="listening-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Listening</label>
                                            <select id="dropdown" name="eng_listening">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="f-english-inputs">
                                        <div class="form-clt">
                                            <label>French</label>
                                            <input class="input" name="french" type="hidden">
                                        </div>
                                    </div>
                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="f-speaking-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Speaking</label>
                                            <select id="dropdown" name="fre_speaking">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="f-writing-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Writing</label>
                                            <select id="dropdown" name="fre_writing">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" data-wow-delay=".5s" id="f-empty-inputs"></div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="f-reading-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Reading</label>
                                            <select id="dropdown" name="fre_reading">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="f-listening-inputs">
                                        <div class="form-clt">
                                            <label for="dropdown">Listening</label>
                                            <select id="dropdown" name="fre_listening">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="9">9</option>
                                                <option value="8.5">8.5</option>
                                                <option value="8">8</option>
                                                <option value="7.5">7.5</option>
                                                <option value="7">7</option>
                                                <option value="6.5">6.5</option>
                                                <option value="6">6</option>
                                                <option value="5.5">5.5</option>
                                                <option value="5">5</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <br>
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s">Other Details</h3>
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <div class="col-4">
                                                <label>Do you or your spouse have any relatives residing in
                                                    Canada?</label><br>
                                                <div class="radio-inline" style="display:flex">
                                                    <label style="display: flex;gap:5px">
                                                        <input type="radio" name="relatives" value="yes"
                                                            onclick="checkInputs()"> Yes
                                                    </label>&nbsp; &nbsp; &nbsp;
                                                    <label style="display: flex;gap:5px">
                                                        <input type="radio" name="relatives" value="no"
                                                            onclick="checkInputs()">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <style>
                                    /* Align radio buttons and labels in a row */
                                    .form-clt label {
                                        display: flex;
                                        align-items: center;
                                        gap: 10px;
                                        /* Adjust spacing between radio button and text */
                                    }

                                    /* Ensure radio buttons are aligned properly */
                                    .form-clt input[type="radio"] {
                                        margin: 0 5px 0 0;
                                        /* Reduce extra spacing */
                                        transform: scale(1.1);
                                        /* Slightly increase size if needed */
                                    }

                                    /* Wrap radio buttons in a flex container for better alignment */
                                    .form-clt .radio-group {
                                        display: flex;
                                        gap: 15px;
                                        /* Adjust spacing between radio options */
                                    }
                                    </style> -->

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="relation"
                                        style="display:none;">
                                        <div class="form-clt">
                                            <label for="relation">Relationship</label>
                                            <select id="relation" name="relationship">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Parent(s)">Parent(s)</option>
                                                <option value="Siblings">Siblings</option>
                                                <option value="Aunt or Uncle">Aunt or Uncle</option>
                                                <option value="Niece or Nephew">Niece or Nephew</option>
                                                <option value="Grandparent(s)">Grandparent(s)</option>
                                                <option value="Step-family Member">Step-family Member</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="province"
                                        style="display:none;">
                                        <div class=" form-clt">
                                            <label for="dropdown">Province</label>
                                            <select id="dropdown" name="province">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Alberta">Alberta</option>
                                                <option value="British Columbia">British Columbia</option>
                                                <option value="Manitoba">Manitoba</option>
                                                <option value="New Brunswick">New Brunswick</option>
                                                <option value="Newfoundland and Labrador">Newfoundland and
                                                    Labrador</option>
                                                <option value="Nova Scotia">Nova Scotia</option>
                                                <option value="Ontario">Ontario</option>
                                                <option value="Prince Edward Island">Prince Edward Island
                                                </option>
                                                <option value="Quebec">Quebec</option>
                                                <option value="Saskatchewan">Saskatchewan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="legal"
                                        style="display:none;">
                                        <div class=" form-clt">
                                            <label for="dropdown">Legal Status</label>
                                            <select id="dropdown" name="legal_status">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Citizen">Citizen</option>
                                                <option value="Permanent Resident">Permanent Resident</option>
                                                <option value="Work Permit">Work Permit</option>
                                                <option value="Study Permit">Study Permit</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>





                                    <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <br>
                                            <h3 class="wow fadeInUp" data-wow-delay=".3s">How Did You Hear About Us?
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" id="legal">
                                        <div class="form-clt">
                                            <label for="dropdown">How did you hear about us?</label>
                                            <select id="dropdown" name="about_us">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Social Media">Social Media</option>
                                                <option value="Website">Website</option>
                                                <option value="Family And Friends">Family And Friends</option>
                                            </select>
                                        </div>



                                        <div class="col-12 wow fadeInUp" data-wow-delay=".8s">
                                            <button type="submit" class="theme-btn" name="submit">
                                                <span><i class="fal fa-paper-plane"></i>Submit</span>
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--<< Footer Section Start >>-->
    <?php include 'footer.php' ?>


    <!--<< All JS Plugins >>-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--<< Gsap Js >>-->
    <script src="assets/js/gsap/gsap.js"></script>
    <!--<< Gsap Scroll Trigger Js >>-->
    <script src="assets/js/gsap/gsap-scroll-trigger.js"></script>
    <!--<< Gsap Split Text Js >>-->
    <script src="assets/js/gsap/gsap-split-text.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!--<< Slick Js >>-->
    <script src="assets/js/slick.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--<< Slick Animation Js >>-->
    <script src="assets/js/slick-animation.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="assets/js/wow.min.js"></script>
    <!--<< Circle Progress Js >>-->
    <script src="assets/js/circle-progress.js"></script>
    <!--<< Ajax.js >>-->
    <script src="assets/js/ajax-mail.js"></script>
    <!--<< Main.js >>-->
    <script src="assets/js/main.js"></script>
</body>
<!-- Include jQuery ( for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- JavaScript to populate country options -->
<!-- JavaScript Function -->
<script>
function validateCellNumber(input) {
    const errorMessage = document.getElementById('error-message');
    if (input.value.length > 11) {
        input.value = input.value.slice(0, 11);
    }
    if (input.value.length !== 11 && input.value.length > 0) {
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}

document.getElementById('fileToUpload').addEventListener('change', function() {
    const file = this.files[0];
    const allowedTypes = [
        'application/pdf',
        'image/png',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'image/jpeg'
    ];
    const maxSize = 2 * 1024 * 1024; // 2 MB in bytes
    const errorDiv = document.getElementById('fileError');

    if (file) {
        if (!allowedTypes.includes(file.type) || file.size > maxSize) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = 'File type not allowed or file is too large. Maximum size is 2MB.';
            this.value = ''; // Clear the input value
        } else {
            errorDiv.style.display = 'none';
            errorDiv.textContent = ''; // Clear the error message
        }
    }
});




// function toggleInputs() {
//     const yesTest = document.querySelector('input[name="test"][value="yes"]');
//     const englishInputs = document.getElementById('english-inputs');
//     const speakingInputs = document.getElementById('speaking-inputs');
//     const writingInputs = document.getElementById('writing-inputs');
//     const readingInputs = document.getElementById('reading-inputs');
//     const listeningInputs = document.getElementById('listening-inputs');
//     const emptyinputs = document.getElementById('empty-inputs');

//     const fenglishInputs = document.getElementById('f-english-inputs');
//     const fspeakingInputs = document.getElementById('f-speaking-inputs');
//     const fwritingInputs = document.getElementById('f-writing-inputs');
//     const freadingInputs = document.getElementById('f-reading-inputs');
//     const flisteningInputs = document.getElementById('f-listening-inputs');
//     const femptyinputs = document.getElementById('f-empty-inputs');


//     if (yesTest.checked) {
//         englishInputs.style.display = 'block';
//         speakingInputs.style.display = 'block';
//         writingInputs.style.display = 'block';
//         readingInputs.style.display = 'block';
//         listeningInputs.style.display = 'block';
//         emptyinputs.style.display = 'block';

//         fenglishInputs.style.display = 'block';
//         fspeakingInputs.style.display = 'block';
//         fwritingInputs.style.display = 'block';
//         freadingInputs.style.display = 'block';
//         flisteningInputs.style.display = 'block';
//         femptyinputs.style.display = 'block';
//     } else {
//         englishInputs.style.display = 'none';
//         speakingInputs.style.display = 'none';
//         writingInputs.style.display = 'none';
//         readingInputs.style.display = 'none';
//         listeningInputs.style.display = 'none';
//         emptyinputs.style.display = 'none';

//         fenglishInputs.style.display = 'none';
//         fspeakingInputs.style.display = 'none';
//         fwritingInputs.style.display = 'none';
//         freadingInputs.style.display = 'none';
//         flisteningInputs.style.display = 'none';
//         femptyinputs.style.display = 'none';
//     }
// }

function checkInputs() {
    const yesRadio = document.querySelector('input[name="relatives"][value="yes"]');
    const relationInputs = document.getElementById('relation');
    const provinceInputs = document.getElementById('province');
    const legalInputs = document.getElementById('legal');

    if (yesRadio.checked) {
        relationInputs.style.display = 'block';
        provinceInputs.style.display = 'block';
        legalInputs.style.display = 'block';
    } else {
        relationInputs.style.display = 'none';
        provinceInputs.style.display = 'none';
        legalInputs.style.display = 'none';
    }
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const countries = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina",
        "Armenia",
        "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus",
        "Belgium",
        "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei",
        "Bulgaria",
        "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada",
        "Central African Republic", "Chad",
        "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the",
        "Congo, Republic of the", "Costa Rica",
        "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
        "Dominican Republic", "Ecuador",
        "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji",
        "Finland",
        "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala",
        "Guinea", "Guinea-Bissau",
        "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq",
        "Ireland", "Israel", "Italy",
        "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South",
        "Kosovo", "Kuwait",
        "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
        "Lithuania", "Luxembourg",
        "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania",
        "Mauritius", "Mexico",
        "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar",
        "Namibia", "Nauru",
        "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway",
        "Oman", "Pakistan",
        "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland",
        "Portugal", "Qatar",
        "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia",
        "Saint Vincent and the Grenadines", "Samoa",
        "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles",
        "Sierra Leone", "Singapore",
        "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan",
        "Suriname",
        "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste",
        "Togo", "Tonga",
        "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
        "United Arab Emirates",
        "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela",
        "Vietnam",
        "Yemen", "Zambia", "Zimbabwe"
    ];

    const countryDropdown1 = document.getElementById('country-dropdown');
    const countryDropdown2 = document.getElementById('educountry');

    countries.forEach(function(country) {
        const option1 = document.createElement('option');
        option1.value = country;
        option1.textContent = country;
        countryDropdown1.appendChild(option1);

        const option2 = document.createElement('option');
        option2.value = country;
        option2.textContent = country;
        countryDropdown2.appendChild(option2);
    });
});
</script>
<script>
function toggleInputs() {
    let testYes = document.querySelector('input[name="test"][value="yes"]').checked;

    let englishInputs = document.querySelectorAll(
        '#english-inputs, #speaking-inputs, #writing-inputs, #reading-inputs, #listening-inputs');
    let frenchInputs = document.querySelectorAll(
        '#f-english-inputs, #f-speaking-inputs, #f-writing-inputs, #f-reading-inputs, #f-listening-inputs');

    // Show if "Yes" is selected, otherwise hide
    englishInputs.forEach(el => el.style.display = testYes ? 'block' : 'none');
    frenchInputs.forEach(el => el.style.display = testYes ? 'block' : 'none');
}
</script>
<style>
#english-inputs,
#speaking-inputs,
#writing-inputs,
#reading-inputs,
#listening-inputs,
#f-english-inputs,
#f-speaking-inputs,
#f-writing-inputs,
#f-reading-inputs,
#f-listening-inputs {
    display: none;
}
</style>

</html>