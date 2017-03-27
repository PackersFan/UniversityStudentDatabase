<?php
$mysqli = new mysqli('127.0.0.1', 'carsons5_csci332', 'magic', 'carsons5_residency');

if ($mysqli->connect_errno) {
   
    echo "Errno: " . $mysqli->connect_errno . "</b>";
    echo "Error: " . $mysqli->connect_error . "</b>";
    
    exit;
}
?>