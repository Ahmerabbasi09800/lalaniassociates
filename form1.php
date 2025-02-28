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
        <link rel="shortcut icon" href="assets/img/favicon.svg">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        <!-- Modernizr JS -->
    <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    </head>
    <style>
    .contact-form-style select {
    width: 100%;
    padding: 10px;
    border: 2px solid #DDDDDD;
    box-sizing: border-box;
    font-size: 14px;
}

.contact-form-style label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.mb-20 {
    margin-bottom: 20px;
}

.additional-inputs {
            display: none; /* Initially hide all additional inputs */
            margin-top: 10px;
        }
        .additional-inputs label {
            display: block;
            margin-top: 5px;
        }
       

    </style>
    <body>

    <?php include 'loader.php'; ?>
      <?php include 'header.php' ?>

      <?php 
        include 'php_action/config.php' ;
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
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <!--<< Breadcrumb Section Start >>-->
        <div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
            <div class="container">
                <div class="page-heading">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Details</h1>
                    
                </div>
            </div>
        </div>
    
        <!--<< Blog Wrapper Here >>-->
         <!--Contact Section Start-->
         <div class="contact-section section pt-100 pt-lg-40 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="contact-form-wrap">
                                <form  action="detail_from.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <h3><?php echo $row['title'] ?></h3>
                                                </div>
                                            </div>
                                            <hr class="mb-50">
                                            <input name="pro_id" class="input" value="<?php echo $row['id'] ?>" type="hidden" required>                                                
                                            <?php }}} ?>
                                            <input type="hidden" name="referrer" id="referrer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <h3 style=" color: #C1915B">APPLICATION INFORMATION</h3>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label for="title">Title</label>
                                                    <select id="title" name="title">
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                        <option value="Mr.">Mr.</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Name&nbsp;<span style="color:red;">*</span></label>
                                                    <input class="input" name="name" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Age&nbsp;<span style="color:red;">*</span></label>
                                                    <input class="input" name="dob" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Email</label>
                                                    <input class="input" name="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Cell Number&nbsp;<span style="color:red;">*</span></label>
                                                    <input class="input" name="number" type="text" pattern="\d{11}" title="Please enter exactly 11 digits" required oninput="validateCellNumber(this)">
                                                    <span id="error-message" style="color:red; display:none;">Please enter exactly 11 digits</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>City</label>
                                                    <input class="input" name="city" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>State</label>
                                                    <input class="input" name="state" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style country mb-20">
                                                    <label for="country-dropdown">Country</label>
                                                    <select id="country-dropdown" name="country1">
                                                    <option value="" disabled selected>Select your country</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Nationality</label>
                                                    <input class="input" name="nationality" type="text">
                                                </div>                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style pt-30 mb-20">
                                                    <h3 style=" color: #C1915B">EDUCATION</h3>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label for="level_of_edu">Level of Education(Degree)&nbsp;<span style="color:red;">*</span></label>
                                                    <input class="input" name="level_of_edu" type="text" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Program Name</label>
                                                    <input class="input" name="p_name" type="text" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Institute / University</label>
                                                    <input class="input" name="uni" type="text" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label for="educountry">Country</label>
                                                    <select id="educountry" name="country2" >
                                                    <option value="" disabled selected>Select your country</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Program Start</label>
                                                    <input class="input" name="program_Start" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Program Completion</label>
                                                    <input class="input" name="program_completion" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label for="program_duration">Program Duration</label>
                                                    <select id="program_duration" name="program_duration" >
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="Less Than 1 Year">Less Than 1 Year</option>
                                                        <option value="Less Than 2 Year">Less Than 2 Year</option>
                                                        <option value="Less Than 3 Year">Less Than 3 Year</option>
                                                        <option value="Less Than 4 Year">Less Than 4 Year</option>
                                                        <option value="5 or More Years">5 or More Years</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style pt-30 mb-20">
                                                    <h3 style=" color: #C1915B">EMPOLYMENT</h3>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Name of Organization</label>
                                                    <input class="input" name="n_of_org" type="text" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Job Title</label>
                                                    <input class="input" name="job_title" type="text" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>From</label>
                                                    <input class="input" name="job_from" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>To</label>
                                                    <input class="input" name="job_to" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label for="employment_status">Employment Status</label>
                                                    <select id="employment_status" name="employment_status" >
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="Full Time">Full Time</option>
                                                        <option value="Part Time">Part Time</option>
                                                        <option value="Self Employed">Self Employed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Program Completion</label>
                                                    <input class="input" name="program_complete" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label>Upload Resume</label>
                                                    <input id="fileToUpload" class="input" name="fileToUpload" type="file" >
                                                    <div id="fileError" style="color: red; display: none;">Invalid file. Only PDF and PNG files under 1 MB are allowed.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <div class="contact-form-style pt-30 mb-20">
                                                    <h3 style=" color: #C1915B">LANGUAGE</h3>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-4">
                                                <lable>Do You Have Given Language Test?</lable><br>
                                                <label>
                                                <input type="radio" name="test" value="yes" onclick="toggleInputs()"> Yes
                                                </label>&nbsp; &nbsp; &nbsp;
                                                <label>
                                                <input type="radio" name="test" value="no" onclick="toggleInputs()"> No
                                                </label>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4 additional-inputs" id="english-inputs">
                                                <div class="contact-form-style mb-20">
                                                    <label>English</label>
                                                    <input class="input" name="english" type="hidden">
                                                </div>
                                            </div>
                                            <div class="col-md-4 additional-inputs" id="speaking-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="writing-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="empty-inputs"></div>
                                            <div class="col-md-4 additional-inputs" id="reading-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="listening-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="f-english-inputs">
                                                <div class="contact-form-style mb-20">
                                                    <label>French</label>
                                                    <input class="input" name="french" type="hidden">
                                                </div>
                                            </div>
                                            <div class="col-md-4 additional-inputs" id="f-speaking-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="f-writing-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="f-empty-inputs"></div>
                                            <div class="col-md-4 additional-inputs" id="f-reading-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4 additional-inputs" id="f-listening-inputs">
                                                <div class="contact-form-style mb-20">
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
                                            <div class="col-md-4">
                                                <div class="contact-form-style pt-30 mb-20">
                                                    <h3 style=" color: #C1915B">OTHER DETAILS</h3>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12 mb-20">
                                                <label>Do you or your spouse have any relatives residing in Canada?</label><br>
                                                <label>
                                                    <input type="radio" name="relatives" value="yes" onclick="checkInputs()"> Yes
                                                </label>&nbsp; &nbsp; &nbsp;
                                                <label>
                                                    <input type="radio" name="relatives" value="no" onclick="checkInputs()"> No
                                                </label>
                                            </div>
                                            <div class="col-md-4" id="relation" style="display:none;">
                                                <div class="contact-form-style mb-20">
                                                    <label for="relation">Relationship</label>
                                                    <select id="relation" name="relationship" >
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
                                            <div class="col-md-4" id="province" style="display:none;">
                                                <div class="contact-form-style mb-20">
                                                    <label for="dropdown">Province</label>
                                                    <select id="dropdown" name="province" >
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="Alberta">Alberta</option>
                                                        <option value="British Columbia">British Columbia</option>
                                                        <option value="Manitoba">Manitoba</option>
                                                        <option value="New Brunswick">New Brunswick</option>
                                                        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                                        <option value="Nova Scotia">Nova Scotia</option>
                                                        <option value="Ontario">Ontario</option>
                                                        <option value="Prince Edward Island">Prince Edward Island</option>
                                                        <option value="Quebec">Quebec</option>
                                                        <option value="Saskatchewan">Saskatchewan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="legal" style="display:none;">
                                                <div class="contact-form-style mb-20">
                                                    <label for="dropdown">Legal Status</label>
                                                    <select id="dropdown" name="legal_status" >
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="Citizen">Citizen</option>
                                                        <option value="Permanent Resident">Permanent Resident</option>
                                                        <option value="Work Permit">Work Permit</option>
                                                        <option value="Study Permit">Study Permit</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="contact-form-style pt-30 mb-20">
                                                    <h3 style=" color: #C1915B">HOW DID YOU HEAR ABOUT US?</h3>
                                                </div>
                                            </div>
                                            <hr> 
                                            <div class="col-md-4">
                                                <div class="contact-form-style mb-20">
                                                    <label for="dropdown">How did you hear about us?</label>
                                                    <select id="dropdown" name="about_us" >
                                                        <option value="" disabled selected>Select an option</option>
                                                        <option value="Social Media">Social Media</option>
                                                        <option value="Website">Website</option>
                                                        <option value="Family And Friends">Family And Friends</option>
                                                    </select>
                                                </div>
                                                <button class="btn " type="submit" name="submit"><span>Submit</span></button>
                                            </div>
                                            

                                            </div>
                                           
                                        </div>                                   
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Contact Section End-->

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
    <!--<< Main.js >>-->
    <script src="assets/js/main.js"></script>
    </body>
<!-- Include jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- JavaScript to populate country options -->
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




        function toggleInputs() {
            const yesTest = document.querySelector('input[name="test"][value="yes"]');
            const englishInputs = document.getElementById('english-inputs');
            const speakingInputs = document.getElementById('speaking-inputs');
            const writingInputs = document.getElementById('writing-inputs');
            const readingInputs = document.getElementById('reading-inputs');
            const listeningInputs = document.getElementById('listening-inputs');
            const emptyinputs = document.getElementById('empty-inputs');

            const fenglishInputs = document.getElementById('f-english-inputs');
            const fspeakingInputs = document.getElementById('f-speaking-inputs');
            const fwritingInputs = document.getElementById('f-writing-inputs');
            const freadingInputs = document.getElementById('f-reading-inputs');
            const flisteningInputs = document.getElementById('f-listening-inputs');
            const femptyinputs = document.getElementById('f-empty-inputs');


            if (yesTest.checked) {
                englishInputs.style.display = 'block';
                speakingInputs.style.display = 'block';
                writingInputs.style.display = 'block';
                readingInputs.style.display = 'block';
                listeningInputs.style.display = 'block';
                emptyinputs.style.display = 'block';

                fenglishInputs.style.display = 'block';
                fspeakingInputs.style.display = 'block';
                fwritingInputs.style.display = 'block';
                freadingInputs.style.display = 'block';
                flisteningInputs.style.display = 'block';
                femptyinputs.style.display = 'block';
            } else {
                englishInputs.style.display = 'none';
                speakingInputs.style.display = 'none';
                writingInputs.style.display = 'none';
                readingInputs.style.display = 'none';
                listeningInputs.style.display = 'none';
                emptyinputs.style.display = 'none';

                fenglishInputs.style.display = 'none';
                fspeakingInputs.style.display = 'none';
                fwritingInputs.style.display = 'none';
                freadingInputs.style.display = 'none';
                flisteningInputs.style.display = 'none';
                femptyinputs.style.display = 'none';
            }
        }

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
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
        "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
        "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
        "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad",
        "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Costa Rica",
        "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador",
        "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland",
        "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
        "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy",
        "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait",
        "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
        "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico",
        "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
        "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman", "Pakistan",
        "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar",
        "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
        "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore",
        "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname",
        "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga",
        "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
        "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam",
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
</html>