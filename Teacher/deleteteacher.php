<?php

include '../config/connect.php';
if(!isset($_COOKIE['Admin'])){
  header('location:./login.php');
}

$id =$_REQUEST['id'];
$sql = "SELECT * FROM teacher WHERE id='$id'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
        // echo $r=$row['t_image'];
    }


  // $path = "../images/$r";
  // if(!unlink($path))
  // {
  //   echo "Not Working";
  // }
  // else {
  //  echo "Image deleted";
  // }


// sql to delete a record
// $sql = "DELETE FROM teacher WHERE id='".$_GET['id']."'";
// if ($conn->query($sql) === TRUE) {
  $sql = mysqli_query($conn,"DELETE FROM user_main WHERE username='".$_GET['username']."'");
  echo'<script>alert("Data Deleted Successful")</script>';

  echo'<script>window.location.replace("selectteacher.php");</script>';
  
// } else {
//   echo "Error deleting record: " . $conn->error;
// }

?>