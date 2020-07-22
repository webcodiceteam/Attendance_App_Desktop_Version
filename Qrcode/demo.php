<?php
//   = "Hello";
// echo md5($str);



if (isset($_POST['submit'])) {

    $str = $_POST['password'];

        echo md5($str);

    
    $enc = base64_encode($str);
    echo'<br>';
    echo base64_decode($enc); 
}
?>



<form method="POST">


<input type="password" name="password">

<!-- <input type="text" name="fname"> -->

<br>

<input type="submit" name="submit">

</form>
