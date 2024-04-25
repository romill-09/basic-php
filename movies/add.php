<?php
$mysqli = new mysqli("localhost", "root", "", "movie");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $cost = $_POST['cost'];

    // Check if show already exists
    $result = $mysqli->query("SELECT * FROM shows WHERE name = '$name'");
    if ($result && $result->num_rows > 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Show already exists!
            </div>';
    } else {
        // Validate cost - ensure it contains only unsigned integers
        if (!ctype_digit($cost)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Cost should be a positive integer!
                </div>';
        } else {
            // Validate category - ensure it contains only alphabetic characters
            if (!ctype_alpha($category)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Category should contain only alphabetic characters!
                    </div>';
            } else {
                // Insert show into database
                $mysqli->query("INSERT INTO shows (name, category, cost) VALUES ('$name', '$category', '$cost');");
                if($mysqli) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Show has been added!
                        </div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Show could not be added!
                        </div>';
                }
            }
        }
    }
}
?>
