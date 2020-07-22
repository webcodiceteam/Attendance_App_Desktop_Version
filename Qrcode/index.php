<?php
  include "../config/connect.php";
//  if($_SESSION['isLogin'] == 'no' ){
//     header('location:../login.php');
//   }
?>

<!DOCTYPE html>
<html>

<head>
    <title>QR Code Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description"
        content="QR Code Generator Developed By Developer Ravi Khadka .It's Free Online QR Code Generator to make your own QR Codes.No sign-up required. Create unlimited non-expiring free QR codes for a website URL, YouTube video etc.">

    <meta name="keywords" content="qr code,QR CODE,QR,CODE,HTML, CSS, XML, JavaScript,php,mysql,bootstrap">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <!-- <script src="../valid.js"></script> -->
    <script src="../alertify/alertify.js"></script>
    <link rel="stylesheet" href="../alertify/css/alertify.css">

    <style>

    </style>
</head>

<body>
    <?php 
   
  include "meRaviQr/qrlib.php";
  // include "config.php";


 
  
  if(isset($_POST['create']))
  {
    $qc =  $_POST['qrContent'];
     $qd =  $_POST['datemax'];
    $qrUname = $_POST['qrUname'];
    $teacher=$_COOKIE['TName'];
    $qrImgName = "meravi".rand();
    if($qc=="" && $qrUname=="" && $qd=="")
    {
      echo "<script>alert('Please Enter Your Name And Msg For QR Code');</script>";
    }
    elseif($qc=="")
    {
      echo "<script>alert('Please Enter QR Code Msg');</script>";
    }
    elseif($qrUname=="")
    {
      echo "<script>alert('Please Enter Your Name');</script>";
    }
    elseif($qd=="")
    {
      echo "<script>alert('Please Enter Date');</script>";
    }
    else
    {
    // $dev = " ...Develop By Ravi Khadka";
    $final = $qrUname.$qc.$qd;
    $qrs = QRcode::png($final,"userQr/$qrImgName.png","H","3","3");
    $qrimage = $qrImgName.".png";
    $workDir = $_SERVER['HTTP_HOST'];
    $insQr = mysqli_query($conn,"INSERT INTO qrcodes(qrClass,qrSubject,qrImg,qrDate,teacher) VALUES('$qrUname','$qc','$qrimage','$qd','$teacher')");
    if($insQr==true)
    {
      echo "<script>alert('Thank You $qrUname. Success Create Your QR Code'); window.location='index.php?success=$qrimage';</script>";

    }
    else
    {
      echo "<script>alert('cant create QR Code');</script>";
    }
  }
 }
  ?>
    <?php 
  if(isset($_GET['success']))
  {
  ?>
    <div id="qrSucc">
        <div class="modal-content animate container">
            <?php 
    ?>

            <img src="userQr/<?php echo $_GET['success']; ?>" alt="">
            <?php 
$workDir = $_SERVER['HTTP_HOST'];
    $qd = $workDir."/qrcode/userQr/".$_GET['success'];
    ?>

            <br> <br>
            <a href="index.php">Go Back To Generate Again</a>
            <br> <br> <br>
            <a href="./teachershowownqrcode.php">View All Qr</a>

        </div>
    </div>
    <?php
}
else
{
  ?>
    <div class="container-fluid login">
        <!-- <div class="container"> -->
        <div class="row">
            <div class="col-lg-12 logg">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">☰</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../Teacher/welcometeacher.php">Home</a>

                        <a href="../Teacher/profilepageteacher.php">Profile</a>
                        <a href="#">Qr Code Generated </a>
                        <a href="../Teacher/viewstudent.php">View All Student</a>
                        <a href="teachershowownqrcode.php">View All Qrcode</a>

                        <a href="../logout.php">logout</a>

                    </div>


                </div>
                <div class='three'>
                    <?php echo "<img src='../images/".$_COOKIE['sImage']."' class='one'>"; ?>
                </div>

                <!-- <a class="sign" href="#SignIn"><i class="fa fa-user-circle"></i>SignIn</a> -->
            </div>
<form class="modal-content animate" style="background-color: #8FC5EB; margin-top: 7%" method="post"
                enctype="multipart/form-data" name="myform" onsubmit=" return validqrform()">
                <!-- <div class="container"> -->
                <h2 align="center" class="main"> QR Code Generator</h2>
                <div class="we2">
                    <label for="uname" class="we">Select Class</label>
                </div>
                <select id="user" type="text" class="input" name="qrUname"
                    value="<?php if(isset($_POST['create'])){ echo $_POST['qrUname']; } ?>">
                    <option></option>

                    <?php
$userData2 = mysqli_query($conn,"select * from class order by id asc");
while($row = mysqli_fetch_assoc($userData2)){
           echo"<option>".$row['c_class']."</option>";

        }
        ?>
                </select>


                <br><br>
                <div class="we2"><label for="psw" class="we">Select Subject</label></div>
                <select id="user" type="text" class="input" name="qrContent"
                    value="<?php if(isset($_POST['create'])){ echo $_POST['qrContent']; } ?>">
                    <!-- <option value="Science">Science</option>
                       <option value="Maths">Maths</option> -->
                    <?php
$userData2 = mysqli_query($conn,"select * from subject order by id asc");
while($row = mysqli_fetch_assoc($userData2)){
           echo"<option>".$row['subjectname']."</option>";

        }
        ?>
                </select>

                <br><br>
                <div class="we2"><label for="psw" class="we">Select Date</label></div>
                <input type="date" id="user" name="datemax" class="input"
                    value="<?php if(isset($_POST['create'])){ echo $_POST['datemax']; } ?>">

                <div class="mito">
                    <input type="submit" value="Generate Your Own QR Code" name="create">
                </div>

                <!--  </div -->
            </form>
            <div class="col-lg-12 bot">
                <h1 class="head1">All Right Reserved To <a class="web" href="www.webcodice.com">WEBCODICE</a></h1>
            </div>
            <?php 
}
   ?>

            <!-- </div> -->
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
<script>
function validqrform() {
    var qrUname = document.forms["myform"]["qrUname"].value;
    var qrContent = document.forms["myform"]["qrContent"].value;
    var datemax = document.forms["myform"]["datemax"].value;

    if (qrUname == "") {
        alertify.error("Select class");
        return false;
    } else if (qrContent == "") {
        alertify.error("Select subject");
        return false;
    } else if (datemax == "") {
        alertify.error("Select date");
        return false;
    }
}
</script>

</html>