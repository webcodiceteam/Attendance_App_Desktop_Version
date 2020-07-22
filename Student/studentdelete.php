<?php

include '../config/connect.php';
// for check user is loged in or not
if(!isset($_COOKIE['Admin'])){
  header('location:./login.php');
}
$id =$_REQUEST['id'];
$sql = "SELECT * FROM student WHERE id='$id'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
        echo $r=$row['s_image'];
    }


  // $path = "../images/$r";
  // if(!unlink($path))
  // {
  //   // echo "Not Working";
  // }
  // else {
  // //  echo "deleted";
  // }



// // sql to delete a record
// $sql = "DELETE FROM student WHERE id='".$_GET['id']."'";

// if ($conn->query($sql) === TRUE) {
  $sql = mysqli_query($conn,"DELETE FROM user_main WHERE username='".$_GET['username']."'");
    echo "<script>alert('Record deleted successfully')</script>";
    echo'<script>window.location.replace("viewallstudents.php");</script>';
// } else {
//     echo "Error deleting record: " . $conn->error;
// }






$conn->close();
?>