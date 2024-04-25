<?php
$mysqli = new mysqli("localhost", "root", "", "movie");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch records based on search criteria
$search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';
$search_category = isset($_POST['search_category']) ? $_POST['search_category'] : '';
$search_cost = isset($_POST['search_cost']) ? $_POST['search_cost'] : '';

// Construct the WHERE clause based on the provided search parameters
$where_clause = "WHERE 1=1";
if (!empty($search_name)) {
    $where_clause .= " AND name LIKE '%$search_name%'";
}
if (!empty($search_category)) {
    $where_clause .= " AND category LIKE '%$search_category%'";
}
if (!empty($search_cost)) {
    $where_clause .= " AND cost = '$search_cost'";
}

// Fetch and display records based on the selected filters
$sql = "SELECT * FROM shows $where_clause";
$result = $mysqli->query($sql);

echo '<style>
        .btn-delete {
            background-color: #dc3545; /* Red background color */
            color: #fff; /* White text color */
            border: none; /* Remove button border */
            border-radius: 5px; /* Add border radius for rounded corners */
            padding: 6px 12px; /* Adjust padding for better appearance */
        }

        .btn-delete:hover {
            background-color: #c82333; /* Darker red background color on hover */
        }
      </style>';

echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">Name</th>';
echo '<th scope="col">Category</th>';
echo '<th scope="col">Cost</th>';
echo '<th scope="col">Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["category"] . '</td>';
        echo '<td>$' . $row["cost"] . '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="POST">';
        echo '<input type="hidden" name="movie_id" value="' . $row["id"] . '">';
        echo '<button type="submit" class="btn btn-danger btn-delete">Delete</button>'; // Added btn-delete class
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No movies found.</td></tr>';
}

echo '</tbody>';
echo '</table>';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];

    // Delete the movie record based on the provided movie ID
    $mysqli->query("DELETE FROM shows WHERE id = $movie_id;");

    if ($mysqli->affected_rows > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Movie deleted successfully!
        </div>';
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Failed to delete the movie.
        </div>';
    }
}

$mysqli->close();
