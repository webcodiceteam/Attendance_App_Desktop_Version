<?php
include '../config/connect.php';
if( $_SESSION['isLogin'] == 'no' ){
  header('location:../login.php');
}

// for check user is loged in or not
if(!isset($_COOKIE['Admin'])){
  header('location:./login.php');
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Teacher</title>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https:/fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/animate.css">

        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">

        <link rel="stylesheet" href="../css/ionicons.min.css">

        <link rel="stylesheet" href="../css/flaticon.css">
        <link rel="stylesheet" href="../css/icomoon.css">
        <link rel="stylesheet" href="../css/teacherregistration.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
        <!--   <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="../js/valid.js"></script>
        <script src="../alertify/alertify.js"></script>
        <link rel="stylesheet" href="../alertify/css/alertify.css">
        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

        <style>
        .ahref:hover {
            background-color: #1f3f4a !important;
        }
        </style>
    </head>
</head>

<body>


    <div class="container-fluid login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 logg">
                    <button onclick="myFunction()" class="dropbtn">☰</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a class="ahref" href="../Admin/welcomeadmin.php">Home</>
                            <a class="ahref" href="../Student/Studentregistration.php">Add Student</>
                                <a class="ahref" href="../Student/viewallstudents.php">View Student</a>
                                <a class="ahref" href="../Teacher/teacherregistration.php">Add Teacher</a>
                                <a class="ahref" href="../Teacher/selectteacher.php">View Teacher</a>
                                <a class="ahref" href="../Class/class.php">Add class</a>
                                <a class="ahref" href="../Class/selectclass.php">View class</a>
                                <a class="ahref" href="../Subject/subject.php">Add Subject</a>
                                <a class="ahref" href="../Subject/selectsubject.php">View Subject</a>
                                <a class="ahref" href="../Qrcode/showallqr.php">Show All Qr</a>
                                <a class="ahref" href="../logout.php">logout</a>
                                <!-- <a href="../">Qr Code Scann</a> -->
                                <!-- <a href="#contact">Contact</a> -->
                    </div>

                    <!-- <a class="sign" href="../loginpage.php"><i class="fa fa-user-circle"></i>SignIn</a> -->
                </div>

                <div class="col-lg-12">
                    <h1 class="wer">SCHOOL</h1>
                </div>
                <div class="col-lg-12">

                <form method="post" enctype="multipart/form-data" name="myform"  onsubmit="return validregteacherform()">
                    <?php
               if (isset($_POST['submit'])) {
                   
                  $t_name = $_POST['t_name'];
                   $t_fname =     $_POST['t_fname'];
                      $t_dob =    $_POST['t_dob'];
                      $t_qualification = $_POST['t_qualification'];
                      $t_email =     $_POST['t_email'];
                      $t_phone =    $_POST['t_phone'];
                      $t_jdate = ($_POST['t_jdate']);
                      $t_username =     $_POST['t_username'];
                      $t_gender =     $_POST['t_gender'];
                      $t_cpassword =    $_POST['t_cpassword'];
                      $t_password =   $_POST['t_password'];
                      $t_image =  $_FILES['t_image']['name'];
                      $target_dir = "../images/";
                      $target_file = $target_dir . basename($_FILES["t_image"]["name"]);
                
                if (move_uploaded_file($_FILES["t_image"]["tmp_name"], $target_file)) {
                      // echo "The file ". basename( $_FILES["t_image"]["name"]). " has been uploaded.";
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              
                   $userData = mysqli_query($conn,"SELECT * FROM teacher WHERE t_email='".$t_email."'");
                if(mysqli_num_rows($userData) == 0){
                  $sql="INSERT INTO  teacher(t_name,t_fname,t_dob,t_qualification,t_email,t_phone,t_jdate,t_username,t_password,t_cpassword,t_image,t_gender)
                   VALUES
                   ('$t_name','$t_fname','$t_dob','$t_qualification','$t_email','$t_phone','$t_jdate','$t_username','$t_cpassword','$t_password','$t_image','$t_gender')";
                 mysqli_query($conn,$sql); 
                      // echo "Record has been Created";
              
                      $main= "INSERT INTO user_main(username,password,role) VALUES ('$t_username','$t_password','Teacher')";
                   mysqli_query($conn,$main);
                  echo "<script>alert('Data Inserted successfully')</script>";
                      
                }else{
                  echo '<script>alert("Email Already exist")</script>';
                } 
                echo '<script>window.location.replace("../Admin/welcomeadmin.php");</script>';
              }
              ?>
                        <div class="login-wrap">
                            <div class="login-html">
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                                    class="tab">Teacher</label>
                                <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2"
                                    class="tab"></label>
                                <div class="login-form">
                                    <div class="sign-in-htm">
                                        <div class="group">
                                            <label for="user" class="label">Name</label><br>
                                            <input id="user" type="text" class="input" name="t_name" placeholder="NAME">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Father's Name</label><br>
                                            <input id="user" type="text" class="input" name="t_fname"
                                                placeholder="FATHER'S NAME">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Date of birth</label>
                                            <input type="date" id="user" name="t_dob" class="input"
                                                placeholder="DATE OF BIRTH">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Email</label><br>
                                            <input id="user" type="text" class="input" name="t_email"
                                                placeholder="EMAIL">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Phone no</label><br>
                                            <input id="user" type="tel" class="input" name="t_phone"
                                                placeholder=" ENTER PHONE NO">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Qualification</label><br>
                                            <input id="user" type="text" class="input" name="t_qualification"
                                                placeholder="Qualification">
                                        </div>

                                        <div class="group">
                                            <label for="user" class="label">Joining Date</label>
                                            <input type="date" id="user" name="t_jdate" class="input"
                                                placeholder="JOINING DATE">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Username</label><br>
                                            <input id="user" type="text" class="input" name="t_username"
                                                placeholder="USERNAME">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Password</label>
                                            <input id="user" type="password" class="input" data-type="password"
                                                name="t_password" placeholder="PASSWORD">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Confirm Password</label><br>
                                            <input id="user" type="password" class="input" data-type="password"
                                                name="t_cpassword" placeholder="CONFIRM PASSWORD">
                                        </div>

                                        <br>
                                        <br>

                                        <div class="group">
                                            <label>Upload profile pic
                                                <input id="user" class="sus" type="file" name="t_image" />
                                            </label>
                                        </div>


                                        <div class="group">
                                            <label for="user" class="label">Select Gender</label>
                                            <input type="radio" id="male" name="t_gender" value="male">
                                            <label for="male">Male</label>
                                            <input type="radio" id="female" name="t_gender" value="female">
                                            <label for="female">Female</label>
                                            <input type="radio" id="other" name="t_gender" value="other">
                                            <label for="other">Other</label>
                                        </div>
                                        <div class="hr"></div>
                                        <div class="group">
                                            <!-- <input type="submit" class="but" name="submit" value="Add Teacher"
                                               > -->
                                               <button class="but" name="submit">Add
                                            Teacher</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>



                <div class="col-lg-12">
                    <h1 class="head1">All Right Reserved To <a class="web" href="http://webcodice.com/">WEBCODICE</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
    </script>
</body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>

<script type="text/javascript">
$(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
})
</script>



</html>