<?php
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "id21964418_wattanostore";
$con= mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
?>