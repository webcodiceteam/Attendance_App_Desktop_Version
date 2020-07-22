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
    <title>Add Student</title>
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
    <link rel="stylesheet" href="../css/Studentregistration.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/valid.js"></script>
    <script src="../alertify/alertify.js"></script>
    <link rel="stylesheet" href="../alertify/css/alertify.css">
    <style>
    .ahref:hover {
        background-color: #1f3f4a !important;
    }
    </style>

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

                    </div>
                </div>

                <!-- <a class="sign" href="../loginpage.php"><i class="fa fa-user-circle"></i>SignIn</a> -->
            </div>

            <div class="col-lg-12">
                <h1 class="wer">SCHOOL</h1>
            </div>

            <form method="post" enctype="multipart/form-data" name="myform" onsubmit="return validregform()">

                <?php
            if (isset($_POST['submit'])) {
              $s_registration = $_POST['s_registration'];
               $s_rollno =     $_POST['s_rollno'];
                $s_name =    $_POST['s_name'];
                $s_fname = $_POST['s_fname'];
                $s_dob =     $_POST['s_dob'];
                $s_gender =    $_POST['s_gender'];
                $s_email = $_POST['s_email'];
                $s_phone =     $_POST['s_phone'];
                $s_batch =     $_POST['s_batch'];
                $s_class = $_POST['s_class'];
                $s_section =     $_POST['s_section'];
                $s_username =    $_POST['s_username'];
                $s_password = $_POST['s_password'];
                $s_cpassword = $_POST['s_cpassword'];
                $image =  $_FILES['s_image']['name'];
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["s_image"]["name"]);
                $image_name=basename($_FILES["s_image"]["name"]);
                if (move_uploaded_file($_FILES["s_image"]["tmp_name"], $target_file)) {
                      // echo "The file ". basename( $_FILES["s_image"]["name"]). " has been uploaded.";
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

                  if ($s_password !== $s_cpassword) {
                    echo "<script>alert('Password not same')</script>";
                  }
                  else
                  {
                  
                    $userData = mysqli_query($conn,"SELECT * FROM student WHERE s_email='".$s_email."'");
                    if(mysqli_num_rows($userData) == 0){
                      $sql="INSERT INTO student(s_registration,s_rollno,s_name,s_fname,s_dob,s_gender,s_email,s_phone,s_batch,s_class,s_section,s_password,s_cpassword,s_image,s_username) VALUES
                      ('$s_registration','$s_rollno','$s_name','$s_fname','$s_dob','$s_gender','$s_email','$s_phone','$s_batch','$s_class','$s_section','$s_password','$s_cpassword','$image_name','$s_username')";
                  
                      mysqli_query($conn,$sql);
                      // echo "Data Inserted successfully";
                  
                      $main= "INSERT INTO user_main(username,password,role) VALUES ('$s_username','$s_password','Student')";
                      mysqli_query($conn,$main);
                      echo "<script>alert('Student Data Added Successfully')</script>";
                  
                  
                    }else{
                      echo "<script>alert('Email already exists.')</script>";
                      
                    }
                  
                  }
        
                  if (isset($_GET['id']) && is_numeric($_GET['id']))
                  {
                      // get the 'id' variable from the URL
                      $id = $_GET['id'];
                      $name = "SELECT name FROM student WHERE id=$id";
                      $name=mysql_fetch_assoc($name);
                      $name=$name['name'];
                  
                      if ($stmt = $con->prepare("DELETE FROM student WHERE id = ? LIMIT 1"))
                      {
                          $stmt->bind_param("i",$id);
                          unlink("../images/" . $name);
                  
                          $stmt->execute();
                          $stmt->close();
                      }
                  
                      else
                      {
                          echo "ERROR: could not prepare SQL statement.";
                      }
                      $con->close();
                  
                      // redirect user after delete is successful
                      header("Location: images_delete.php");
                  }
                  echo '<script>window.location.replace("../Admin/welcomeadmin.php");</script>';
          
        }
        ?>
                <div class="col-lg-12">
                    <div class="login-wrap">
                        <div class="login-html">

                            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                                class="tab">Student Registration</label>
                            <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2"
                                class="tab"></label>
                            <div class="login-form">
                                <div class="sign-in-htm">
                                    <div class="group">
                                        <label for="user" class="label">Name</label><br>
                                        <input id="user" type="text" class="input" name="s_name" placeholder="NAME">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Father Name</label><br>
                                        <input id="user" type="text" class="input" name="s_fname"
                                            placeholder="FATHER NAME">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Registration no.</label><br>
                                        <input id="user" type="text" class="input" name="s_registration"
                                            placeholder="REGISTRATION NO">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Email</label><br>
                                        <input id="user" type="text" class="input" name="s_email" placeholder="EMAIL">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Contact no</label><br>
                                        <input id="user" type="text" class="input" name="s_phone"
                                            placeholder=" ENTER CONTACT NO">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Password</label><br>
                                        <input id="user" type="password" class="input" data-type="password"
                                            name="s_password" placeholder="PASSWORD">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Confirm Password</label><br>
                                        <input id="user" type="password" class="input" data-type="password"
                                            name="s_cpassword" placeholder="CONFIRM PASSWORD">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Username</label><br>
                                        <input id="user" type="text" class="input" name="s_username"
                                            placeholder="ENTER USERNAME">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Roll no</label><br>
                                        <input id="user" type="text" class="input" name="s_rollno"
                                            placeholder="ROLL NO">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Date of birth</label>
                                        <input type="date" id="user" name="s_dob" class="input"
                                            placeholder="DATE OF BIRTH">
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Select Class</label>
                                        <select id="user" name="s_class" type="text" class="input" value="Select Class">
                                            <option value="1"> class 1</option>
                                            <option>7th</option>
                                            <?php
                                            $userData2 = mysqli_query($conn,"select * from class order by id asc");
                                            while($row = mysqli_fetch_assoc($userData2)){
                                                      echo"<option>".$row['c_class']."</option>";

                                              }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="group">
                                        <label for="user" class="label">Select Batch</label>
                                        <select id="user" type="text" name="s_batch" class="input" value="Select Batch">
                                            <option>2016-2017</option>
                                            <option>2017-2018</option>
                                            <option>2018-2019</option>
                                            <option>2019-2020</option>
                                            <option>2020-2021</option>
                                        </select>
                                    </div>

                                    <div class="group">
                                        <label for="user" class="label">Select section</label>
                                        <select id="user" name="s_section" type="text" class="input"
                                            value="Select section">
                                            <option>Section A</option>
                                            <option>Section B</option>
                                            <option>Section C</option>
                                        </select>
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Upload profile pic </label>
                                        <input id="user" class="sus" type="file" name="s_image" />
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Select Gender</label>
                                        <input type="radio" id="male" name="s_gender" value="male">
                                        <label value="male">Male</label>
                                        <input type="radio" id="female" name="s_gender" value="female">
                                        <label value="female">Female</label>
                                        <input type="radio" id="other" name="s_gender" value="other">
                                        <label value="other">Other</label>
                                    </div>
                                    <div class="hr"></div>
                                    <div class="group">
                                        <button class="but" name="submit">Add
                                            Student</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-lg-12">
                <h1 class="head1">All Right Reserved To <a class="web" href="http://webcodice.com/">WEBCODICE</a></h1>
            </div>
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
function Validate() {
    var password = document.getElementsByTagName("s_password").value;
    var confirmPassword = document.getElementsByTagName("s_cpassword").value;
    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}
</script>



</html>