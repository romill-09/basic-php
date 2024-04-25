<?php
 $username = $_POST["username"];
 $password = $_POST["password"];
 
 $mysqli = new mysqli("localhost", "root", "", "practice");

 if($mysqli->query("UPDATE user SET password = 'lmao' WHERE username = '$username';"))
 {
    echo "Updated Succesfully";
 }