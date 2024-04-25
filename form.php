<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "practice";

    $conn = mysqli_connect($servername, $username, $password, $database);

    $name = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ('$name', '$pwd')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your entry has been submitted successfully!
    </div>';

    header("Location: index.php");
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> There was an issue submitting your entry.
        </div>';
    }
?>
