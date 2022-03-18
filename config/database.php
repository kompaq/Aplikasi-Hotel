<?php
$servername = "localhost";
$username = "root";
$password = "kompaq2022";
$database = "ukk_hotel";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>