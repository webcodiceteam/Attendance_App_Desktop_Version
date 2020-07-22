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
    <title></title>

    <head>
        <title>Loginpage</title>
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
        <script src="../js/valid.js"></script>
<script src="../alertify/alertify.js"></script>
<link rel="stylesheet" href="../alertify/css/alertify.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    </head>
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

                    <!-- <a class="sign" href="#SignIn"><i class="fa fa-user-circle"></i>SignIn</a> -->
                </div>

                <div class="col-lg-12">
                    <h1 class="wer">SCHOOL</h1>
                </div>

            <form method="post" enctype="multipart/form-data" name="myform" >

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
			
					if ($s_password !== $s_cpassword) {
						echo "<script>alert('Password not same')</script>";
					}
					
			  $image =  $_FILES['s_image']['name'];
			  $target_dir = "../images/";
			  $target_file = $target_dir . basename($_FILES["s_image"]["name"]);
			  $image_name=basename($_FILES["s_image"]["name"]);
              
                if (move_uploaded_file($_FILES["s_image"]["tmp_name"], $target_file)) {
                      // echo "The file ". basename( $_FILES["s_image"]["name"]). " has been uploaded.";
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
			
			  if ($image_name) {		  
						$two =mysqli_query($conn,"UPDATE student SET
								s_registration='$s_registration', 
								s_rollno='$s_rollno',
								s_name='$s_name',
								s_fname='$s_fname',
								s_dob='$s_dob',
								s_gender='$s_gender',
								s_email='$s_email',
								s_phone='$s_phone',
								s_batch='$s_batch', 
								s_class='$s_class',
								s_section='$s_section',
								s_username='$s_username',
								s_password='$s_password',
								s_cpassword='$s_cpassword', 
								s_image='$image_name' 
						   		WHERE id='".$_GET['id']."'");
					  }
					  else{
						$two =mysqli_query($conn,"UPDATE student SET
						    s_registration='$s_registration', 
							s_rollno='$s_rollno',
							s_name='$s_name',
							s_fname='$s_fname',
							s_dob='$s_dob',
							s_gender='$s_gender',
							s_email='$s_email',
							s_phone='$s_phone',
							s_batch='$s_batch', 
							s_class='$s_class',
							s_section='$s_section',
							s_username='$s_username',
							s_password='$s_password',
							s_cpassword='$s_cpassword' 
						  WHERE id='".$_GET['id']."'");			
					  }
					  echo '<script>window.location.replace("viewallstudents.php");</script>';
					}

						$qur = "Select * from student WHERE id='".$_GET['id']."'";
						$result = mysqli_query($conn, $qur);
						if (mysqli_num_rows($result) > 0) {				
						while($row = mysqli_fetch_assoc($result)) {
			?>

                    <div class="col-lg-12">
                        <div class="login-wrap" style="min-height: 1530px !important;">
                            <div class="login-html">

                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                                    class="tab">Student Registration</label>
                                <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2"
                                    class="tab"></label>
                                <div class="login-form">
                                    <div class="sign-in-htm">
                                        <div class="group">
                                            <label for="user" class="label">Name</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_name']?>"
                                                class="input" name="s_name" placeholder="NAME">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Father Name</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_fname']?>"
                                                class="input" name="s_fname" placeholder="FATHER NAME">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Registration no.</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_registration']?>"
                                                class="input" name="s_registration" placeholder="REGISTRATION NO">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Email</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_email']?>"
                                                class="input" name="s_email" placeholder="EMAIL">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Contact no</label><br>
                                            <input id="user" type="tel" value="<?php echo $row['s_phone']?>"
                                                class="input" name="s_phone" placeholder=" ENTER CONTACT NO">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Password</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_password']?>"
                                                class="input" name="s_password" placeholder="PASSWORD">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Confirm Password</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_cpassword']?>"
                                                class="input" name="s_cpassword" placeholder="CONFIRM PASSWORD">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Username</label><br>
                                            <input id="user" type="text" value="<?php echo $row['s_username']?>"
                                                class="input" name="s_username" placeholder="ENTER USERNAME">
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Roll no</label><br>
                                            <input id="user" type="Rollno" value="<?php echo $row['s_rollno']?>"
                                                class="input" name="s_rollno" placeholder="ROLL NO">
                                        </div>

                                        <div class="group">
                                            <label for="user" class="label">Date of birth</label>
                                            <input type="date" id="user" name="s_dob" value="<?php echo $row['s_dob']?>"
                                                class="input" placeholder="DATE OF BIRTH">
                                        </div>

                                        <div class="group">
                                            <label for="user" class="label">Select Class</label>
                                            <select id="user" name="s_class" type="text"
                                                value="<?php echo $row['s_class']?>" class="input" value="Select Class">
                                                <option value="1"> class 1</option>
                                                <option>7th</option>
                                                <?php

                                            $userData2 = mysqli_query($conn,"select * from class order by id asc");
                                            while($row_class = mysqli_fetch_assoc($userData2)){
                                                    echo"<option>".$row_class['c_class']."</option>";

                                                    }
                                                ?>

                                            </select>


                                        </div>

                                        <div class="group">
                                            <label for="user" class="label">Select Batch</label>
                                            <select id="user" type="text" name="s_batch"
                                                value="<?php echo $row['s_batch']?>" class="input" value="Select Batch">
                                                <option>2016-2017</option>
                                                <option>2017-2018</option>
                                                <option>2018-2019</option>
                                                <option>2019-2020</option>
                                                <option>2020-2021</option>

                                            </select>


                                        </div>

                                        <div class="group">
                                            <label for="user" class="label">Select section</label>
                                            <select id="user" name="s_section" value="<?php echo $row['s_section']?>"
                                                type="text" class="input" value="Select section">
                                                <option>Section A</option>
                                                <?php
                                            $userData = mysqli_query($conn,"select * from class order by id asc");
                                            while($row_section = mysqli_fetch_assoc($userData)){
                                                    echo"<option>".$row_section['c_section']."</option>";

                                                }
                                                ?>
                                            </select>


                                        </div>

                                        <?php echo" 
	<img src='../images/".$row['s_image']."'height = '100px' width = '100px' style='border-radius:60px;'> 
	"; ?>


                                        <br>
                                        <br>


                                        <div class="group">
                                            <label for="user" class="label">Upload profile pic </label>
                                            <input id="user" class="sus" type="file" name="s_image" />

                                        </div>

                                        <div class="group">
                                            <label for="user" class="label">Select Gender</label>
                                            <input type="radio" id="male" name="s_gender" value="male"
                                                <?php echo ($row['s_gender'] == 'male') ? 'checked' : ''; ?>>
                                            <label value="male" id="male">Male</label>
                                            <input type="radio" id="female" name="s_gender" value="female"
                                                <?php echo ($row['s_gender'] == 'female') ? 'checked' : ''; ?>>
                                            <label value="female" id="female">Female</label>
                                            <input type="radio" id="other" name="s_gender" value="other"
                                                <?php echo ($row['s_gender'] == 'other') ? 'checked' : ''; ?>>
                                            <label value="other" id="other">Other</label>

                                        </div>

                                        <div class="hr"></div>
                                        <div class="group">
                                            <button class="but" name="submit"
                                                onclick="return Validate()">Update</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <?php
	  }
	}
?>



                <div class="col-lg-12">
                    <h1 class="head1">All Right Reserved To <a class="web" href="http://webcodice.com/">WEBCODICE</a>
                    </h1>
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