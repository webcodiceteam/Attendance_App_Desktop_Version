<?php

include '../config/connect.php';
// sql to delete a record
$sql = "DELETE FROM subject WHERE id='".$_GET['id']."'";

if ($conn->query($sql) === TRUE) {
  

    echo'<script>alert("Subject Deleted Successful")</script>';

    echo'<script>window.location.replace("selectsubject.php");</script>';
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>


