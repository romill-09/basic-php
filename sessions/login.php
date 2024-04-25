<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password']; 

$mysqli = new mysqli("localhost", "root", "", "login");

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(empty(trim($username)) || empty(trim($password)))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($username);
        $password = trim($password);
    }

}
