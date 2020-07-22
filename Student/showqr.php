<?php
include '../config/connect.php';
if( $_SESSION['isLogin'] == 'no' ){
  header('location:../login.php');
}

// for check user is loged in or not
if(!isset($_COOKIE['Admin'])){
  header('location:../login.php');
}
$c=  $_COOKIE['Class'];
// echo $_GET['n'];

$check= mysqli_query($conn,'SELECT * from qrcodes where qrClass="'.$c.'" AND qrSubject="'.$_GET['n'].'"');

if(mysqli_num_rows($check)==1)
	{
		 while($row1 = mysqli_fetch_array($check)){

    //   echo $row1['qrImg'];  
      echo"<img src='../Qrcode/userQr/".$row1['qrImg']."'height = '100px' width = '100px'>";    

     }

    }

else{

    // echo'<script>alert("")</script>';

    echo 'No Qr Generated';
}



?>

<!-- <script src="../Qrcode/userQr/"></script> -->