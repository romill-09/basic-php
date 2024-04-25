<?php
    $name = $_POST["username"];
    $pwd = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "practice");
    
    $sql = "DELETE FROM user WHERE username='$name' AND password='$pwd'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'Record deleted successfully';
    } else {
        echo 'Cannot delete record';
    }
?>
