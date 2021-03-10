<?php
session_start();
$conn = new mysqli("localhost","root","1234","php-crud");
if(mysqli_connect_error()){
    die(mysqli_connect_errno().'-'.mysqli_connect_error());
}
?>