<?php
$mysqli = new mysqli("localhost", "root", "", "login");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (empty(trim($username))) 
    {
        echo "Username cannot be blank";
    } 
    else 
    {
        $result = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
        if ($result && $result->num_rows > 0)
        {
            echo "Username already exists";
        } 
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "Invalid email format";
        }
        else if (!preg_match('/@somaiya\.edu$/', $email))
        {
            echo "Email must be from @somaiya.edu domain";
        }
        else if (empty(trim($password)))
        {
            echo "Password cannot be blank";
        } 
        else if (strlen(trim($password)) < 8) 
        {
            echo "Password must be at least 8 characters";
        } 
        else if (trim($password) != trim($cpassword))
        {
            echo "Passwords should match";
        }
        else
        {
            $password = trim($password);
            $mysqli->query("INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password');");
            if($mysqli)
            {
                header("location: login.php");
                exit;
            }
            else
            {
                echo "Something went wrong!";
            }
        }
    }
}       
?>