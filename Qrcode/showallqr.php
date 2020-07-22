<?php
include '../config/connect.php';
// if( $_SESSION['isLogin'] == 'no' ){
//   header('location:../login.php');
// }

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
    <title>View All Qrcode</title>
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
    #myImg:hover {
        opacity: 0.7;
    }
    
    .ahref:hover{

        background-color:#1f3f4a !important;
        
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        margin-top: 10%;
        width: 80%;
        max-width: 300px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }

    .href:hover {
        background-color: #1f3f4a !important;
    }

    tr:hover {
        background-color: black;
        /* opacity: .5; */

    }

    .fa.fa-trash:hover {
        -ms-transform: scale(1.7);
        -webkit-transform: scale(1.7);
        transform: scale(1.7);
    }

    .fa.fa-edit:hover {
        -ms-transform: scale(1.7);
        -webkit-transform: scale(1.7);
        transform: scale(1.7);
    }

    .button1 {
        text-decoration: none;
        list-style: none;
        border: none;
        padding: 10px 25px 10px 25px;
        text-align: center;
        font-size: 15px;
        font-family: inherit;
    }

    .button1:hover {
        text-decoration: none;
        list-style: none;
        border: none;
        padding: 10px 25px 10px 25px;
        text-align: center;
        font-size: 15px;
        font-family: inherit;
        background-color:black;
        color: white;
        border:2px solid white;
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

                    <!-- <a class="sign" href="#SignIn"><i class="fa fa-user-circle"></i>SignIn</a> -->
                </div>
                <div class="col-lg-12 col-md-6">
                    <h1 class="wer1">View All Qrcode</h1>
                </div>

                <?php


$sql = "SELECT * FROM  qrcodes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo"<table class='table table-hover custab'>
    <thead>
    <tr>
    <th>ID</th>
    <th>Image</th>
    <th>CLass</th>
    <th>Subject</th>
    <th>Date</th>
    <th>Teacher Name</th>
    <th>Download Image</th>
    </tr>
    </thead>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tbody><tr>
        <td>".$row["id"]."</td>
        <td><img src='../Qrcode/userQr/".$row['qrImg']."'height = '100px' width = '100px' id='myImg_".$row['id']."' onclick='one(".$row['id'].")'></td>
        <td>".$row["qrClass"]."</td>
        <td>".$row["qrSubject"]."</td>
        <td>".$row["qrDate"]."</td>
        <td>".$row["teacher"]."</td>
        <td><a href='../Qrcode/userQr/".$row['qrImg']."'download><button class='button1'>Download Qr</button></a></td>       
        </tr>
        </tbody>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

                <div id="myModal" class="modal">
                    <a id="close" class="close" onclick="closemodel()">&times;</a>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
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
</script>


<script>
function one(id) {
    var img = document.getElementById("myImg_" + id);
    // alert(id);

    // Get the modal
    var modal = document.getElementById("myModal").style.display = "block";

    // Get the image and insert it inside the modal - use its "alt" text as a caption

    var modalImg = document.getElementById("img01");
    modalImg.src = img.src;
    var captionText = document.getElementById("caption");
    captionText.innerHTML = img.alt;
    // img.onclick = function() {
    //     modal.style.display = "block";


    // }

    // Get the <span> element that closes the modal

}

function closemodel() {


    var modal = document.getElementById("myModal").style.display = "none";
}
// var span = document.getElementsByClassName("close");

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     alert("hii");
//     modal.style.display = "none";
//     // model.style.display = "block";
// }
</script>



</html>

<!-- <script src='../Qrcode/userQr/'></script> -->