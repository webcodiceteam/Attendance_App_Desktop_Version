<?php
include '../config/connect.php';
if( $_SESSION['isLogin'] == 'no' ){
  header('location:../login.php');
}

// for check user is loged in or not
if(!isset($_COOKIE['Admin'])){
  header('location:../login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <title> Qr Scanner</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport" />
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
    <link rel="stylesheet" href="../css/viewallstudents.css">
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/responsive-tables.min.css" type="text/css" />
    <style>
    .ahref:hover {
        background-color: #1f3f4a !important;
    }

    img.one {
        width: 50px;
        height: 50px;
        border-radius: 50px;
        padding: 5px 5px;

    }

    .three {
        float: right !important;
    }



    .scan {
        text-align: center;
    }

    select#subject {
        padding: 12px 95px !important;
        background-color: #1F3F4A !important;
        color: #fff !important;
        border-radius: 15px;
        -webkit-appearance: button;
    }

    #result {
        text-align: center;
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
                        <a class="ahref" href="welcomestudent.php">Home</a>
                        <a class="ahref" href="profilepagestudent.php">Profile</a>
                        <a class="ahref" href="qrcodepagestudent.php">Qr Code Scann</a>
                        <a class="ahref" href="../logout.php">logout</a>
                    </div>
                    <div class='three'>
                        <?php echo "<img src='../images/".$_COOKIE['Image']."' class='one' >"; ?>
                    </div>
                    <!-- <a class="sign" href="#SignIn"><i class="fa fa-user-circle"></i>SignIn</a> -->
                </div>
                <div class="col-lg-12 col-md-6">
                    <h1 class="wer1">Scann Qr code</h1>
                </div>


                <?php


 $c=  $_COOKIE['Class'];



 if(isset($_POST['subject'])){

  echo $_POST['subject'];
   # code...
 }
$userData2 = mysqli_query($conn,"select * from class where c_class = '".$c."'");

while($row = mysqli_fetch_assoc($userData2)){
 
    $v =$row['c_subject'];
    $t=  explode(",", $v);
    $len = count($t);
?>
                <form method='POST' class="scan">
                    <center>
                        <div class="group">
                            <select name='subject' onChange="getSubject()" class="input" id='subject' class="qr">
                                <option>Select Subject</option>
                                <?php
        for($i = 0; $i <$len; $i++)
        {
            echo $t[$i]."<br>";
          ?>
                                <option value="<?php echo$t[$i]?>"> <?php echo$t[$i]?></option>
                                <!-- <button name='submit'>Submit</button> -->

                                <?php
        }
        ?>
                            </select>
                        </div>
                    </center>
                </form>
                <?php
        //    echo "Subject".$row['c_subject']."<br>";
}

?>
                <p id="result" style="color:black;"></p>

                <div class="col-lg-12">
                    <h1 class="head1">All Right Reserved To <a class="web" href="http://webcodice.com/">WEBCODICE</a>
                    </h1>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../js/jquery.responsive-tables.min.js"></script>
    <script src="../js/app.js"></script>
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

function getSubject() {
    var sn = document.getElementById("subject").value;
    //  alert(sn)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "showqr.php?n=" + sn, true);
    xhttp.send();
}
</script>

</html>