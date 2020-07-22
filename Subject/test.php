<?php
include '../config/connect.php';
$sql = "SELECT * FROM  subject";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo"<table class='table table-hover custab'>
    <thead>
    <tr>
        <th>Subject Name</th>
        <th>Subject Code</th>
        <th>Update</th>
        <th>Delete</th>       
    </tr>
    </thead>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tbody>
        <tr>
        <td>".$row["subjectname"]."</td>
        <td>".$row["subjectcode"]."</td>
        <td><a href ='updatesubject.php?id=".$row['id']."'><i class='fa fa-edit'><i></a></td>
        <td><i onclick='loadDoc(".$row['id'].")' class='fa fa-trash'></td>
        </tr>
        </tbody>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>