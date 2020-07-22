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
    <title>Update Class</title>


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
</head>

<style type="text/css">
.ahref:hover {
    color: #ffffff !important;
    text-decoration: none !important;

}
</style>

<body>


    <div class="container-fluid login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 logg">
                    <div class="dropdown">
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
                        </div>
                    </div>

                    <!-- <a class="sign" href="#SignIn"><i class="fa fa-user-circle"></i>SignIn</a> -->
                </div>

                <div class="col-lg-12">
                    <h1 class="wer">SCHOOL</h1>
                </div>
                <form method="post">
                    <?php
                if (isset($_POST['submit'])) {


                  $c_class= $_POST['c_class'];
                  $c_subject= implode(', ', $_POST['c_subject']);
              
              
                  // $c_batch= $_POST['c_batch'];
              
              $sql=mysqli_query($conn,"UPDATE class SET c_class='$c_class', c_subject='$c_subject',WHERE id='".$_GET['id']."'");
              
                 
                  if (mysqli_query($conn,$sql)) {
                      echo "Record has been Update";
                      }
              
                  mysqli_close($conn);
                
              }
              
                $qur = "Select * from class WHERE id='".$_GET['id']."'";
                $result = mysqli_query($conn, $qur);
                if (mysqli_num_rows($result) > 0) { 
                      
                    while($row = mysqli_fetch_assoc($result)) {
              ?>
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
                                            <input type="tect" id="user" name="c_class"
                                                value="<?php echo $row['c_class']?>" class="input"
                                                placeholder="Class Name">

                                        </div>

                                        <div>
                                            <label class="label">Subject Code</label>
                                            <!-- <select name="c_subject" id="user" class="input"> -->
                                            <select multiple class="chosen-select"
                                                value="<?php echo $row['c_subject[]']?>" name="c_subject[]">
                                                <option disabled="disabled" selected="selected">Choose subject
                                                </option>


                                                <?php
$userData = mysqli_query($conn,"select * from subject order by id asc");
while($row = mysqli_fetch_assoc($userData)){
           echo"<option>".$row['subjectname']."(".$row['subjectcode'].")"."</option>";

        }
        ?>



                                            </select>

                                        </div>


                                        <!-- <div class="group">

           <label for="user" class="label">Batch</label>
          <select name="c_batch" id="user" class="input">
      <option disabled="disabled" selected="selected" >Choose year
      </option>
      <option>2017-2018</option>
      <option>2018-2019</option>
      <option>2019-2020</option>
      <option>2020-2021</option>                                 
      <option>2021-2022</option>
      <option>2022-2023</option> 
      </select>
</div> -->





                                        <div class="hr"></div>

                                        <div class="group">
                                            <button class="but" name="submit">Submit</button>
                                        </div>


                                    </div>
                                    <!-- <div class="for-pwd-htm">
        <div class="group">
          <label for="user" class="label">Username or Email</label>
          <input id="user" type="text" class="input">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Reset Password">
        </div>
        <div class="hr"></div>
      </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <?php

}
}
?>

            </div>
            <div class="col-lg-12">
                <h1 class="head1">All Right Reserved To <a class="web" href="http://webcodice.com/">WEBCODICE</a></h1>
            </div>
        </div>
    </div>


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