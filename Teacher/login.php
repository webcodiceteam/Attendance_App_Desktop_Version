<?php


include 'config/connect.php';
//   setcookie("Auction_Item", "Luxury Car", time()+2*24*60*60);

 

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet"> -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="css/animate.css"> -->

        <!-- <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css"> -->
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/loginpage.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <!--     <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
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
                </div>

                <div class="col-lg-12 school">
                    <h1 class="wer">SCHOOL</h1>
                </div>
                <div class="col-lg-12">
                    <div class="login-wrap">
                        <div class="login-html">

                            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                                class="tab">Sign In</label>
                            <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2"
                                class="tab"></label>
                            <div class="login-form">
                                <div class="sign-in-htm">

                                <?php
                                if(isset($_POST['submit']))
                                {
                                
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $result= mysqli_query($conn,'SELECT * from user_main where username="'.$username.'" and password="'.$password.'"');
                                $sql= mysqli_query($conn,'SELECT * from student where s_username="'.$username.'" and s_password="'.$password.'"');

                                if (mysqli_num_rows($sql)==1) {
                               
                                while ($row1 = $sql->fetch_array()) {
                                //   echo "id: " . $row1["id"]. " - Name: " . $row1["s_section"]. " " . $row1["s_class"]. "<br>";
                                    setcookie("Class", $row1['s_class'], time()+2*24*60*60);
                                    setcookie("Section", $row1['s_section'], time()+2*24*60*60);
                                    setcookie("Image",$row1['s_image'], time()+2*24*60*60);

                                }
                                }

                                $teacher= mysqli_query($conn,'SELECT * from teacher where t_username="'.$username.'" and t_password="'.$password.'"');

                                if (mysqli_num_rows($teacher)==1) {
                             
                                while ($row2 = $teacher->fetch_array()) {

                                    
                                    setcookie("sImage",$row2['t_image'], time()+2*24*60*60);

                                    setcookie("TName",$row2['t_name'], time()+2*24*60*60);


                                }
                                }

                                if(mysqli_num_rows($result)==1)
                                {
                                    while($row = mysqli_fetch_array($result)){
                                            $_SESSION['isLogin'] = 'yes';
                                            setcookie("Admin", $row['role'], time()+2*24*60*60);
                                            

                                            $_SESSION["username"]=$username;
                                            if($row['role'] == 'Teacher'){
                                                    header('location:Teacher/welcometeacher.php');
                                            }
                                            if($row['role'] == 'Student'){

                                                    header('location:Student/welcomestudent.php');
                                                // echo "hello1";

                                            }
                                            if($row['role'] == 'Admin'){

                                                header('location:Admin/welcomeadmin.php');
                                            // echo "hello1";

                                        }

                                    }

                                }
                                    else
                                    { 

                                    echo '<script>alert("user not found")</script>';

                                    }

                                }

                                ?>
                                    <form method="post">
                                        <div class="group">
                                            <label for="user" class="label"></label>
                                            <input id="user" type="text" class="input" name="username"
                                                placeholder="USERNAME OR EMAIL">
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label"></label>
                                            <input id="pass" type="password" class="input" data-type="password"
                                                name="password" placeholder="PASSWORD">
                                        </div>
                                        <div class="hr"></div>
                                        <div class="group">
                                            <button class="but" name="submit">Sign In</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="col-lg-12 fo">
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
// function myFunction() {
//   document.getElementById("myDropdown").classList.toggle("show");
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }
</script>



</html>