<?php

$con = mysqli_connect('localhost', 'root', '', 'furniture');

if (!$con) {
    echo "Connection unsuccessful";
}

// if (mysqli_connect_error()){
//     echo"<script>alert('cannot connect to the database'); </script>";
//     }
//     exit();
?> 