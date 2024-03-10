<?php 
$conn = mysqli_connect("localhost","root","","signupform");
if(!$conn) {
    die("Connection Failed". mysqli_connect_error());
}
