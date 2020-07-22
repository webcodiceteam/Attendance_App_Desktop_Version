<?php
include '../config/connect.php';
if( $_SESSION['isLogin'] == 'no' ){
  header('location:../login.php');
}

if(!isset($_COOKIE['Admin'])){
  header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/subject.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    <!--    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <link rel="stylesheet" href="../alertify/css/alertify.css">
</head>


<body>


    <div class="container-fluid login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 logg">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">☰</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="../Admin/welcomeadmin.php">Home</>
                                <a href="../Student/Studentregistration.php">Add Student</>
                                    <a href="../Student/viewallstudents.php">View Student</a>
                                    <a href="../Teacher/teacherregistration.php">Add Teacher</a>
                                    <a href="../Teacher/selectteacher.php">View Teacher</a>
                                    <a href="../Class/class.php">Add class</a>
                                    <a href="../Class/selectclass.php">View class</a>
                                    <a href="../Subject/subject.php">Add Subject</a>
                                    <a href="../Subject/selectsubject.php">View Subject</a>
                                    <a href="../Qrcode/showallqr.php">Show All Qr</a>
                                    <a href="../logout.php">logout</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h1 class="wer">SCHOOL</h1>
                </div>
                <?php
                if (isset($_POST['submit'])) {
  
                  $c_class= $_POST['c_class'];
                  $c_subject= implode(",",$_POST['c_subject']);
                  $sql="INSERT INTO class (c_class,c_subject) VALUES('$c_class','$c_subject')";
                    if (mysqli_query($conn,$sql)) {
                        echo "<script>alert('Class has been Created')</script>";
                        }
                    mysqli_close($conn);
      
                }
                ?>
                <form method="post" name="myform" onsubmit="return validclassform()">
                    <div class="col-lg-12">
                        <div class="login-wrap">
                            <div class="login-html">
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                                    class="tab">Class Form</label>
                                <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2"
                                    class="tab"></label>
                                <div class="login-form">
                                    <div class="sign-in-htm">
                                        <div class="group">
                                            <label for="user" class="label">Class Name</label>
                                            <input type="tect" id="user" name="c_class" class="input"
                                                placeholder="Class Name">
                                        </div>
                                        <div>
                                            <label class="label">Subject Code</label>
                                            <select multiple class="chosen-select" name="c_subject[]">
                                                <option disabled="disabled" selected="selected">Choose subject
                                                </option>
                                                <?php
                                                  $userData = mysqli_query($conn,"select * from subject order by id asc");
                                                  while($row = mysqli_fetch_assoc($userData)){
                                                            echo"<option>".$row['subjectname']."</option>";

                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="hr"></div>
                                        <div class="group">
                                            <button class="but" name="submit">Add class</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">
                <h1 class="head1">All Right Reserved To <a class="web" href="http://www.webcodice.com/">WEBCODICE</a>
                </h1>
            </div>
        </div>
    </div>
    </div>


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

    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
    </script>
    <script>
    function validclassform() {
        var c_class = document.forms["myform"]["c_class"].value;
        var c_subject = document.forms["myform"]["c_subject[]"].value;

        if (c_class == "") {
            alertify.error('Enter your class');
            return false;
        } 
       else if (c_subject == "") {
            alert("Enter your Subject");
            return false;
        }

    }
    </script>
    <script src="../alertify/alertify.js"></script>
</body>

</html>