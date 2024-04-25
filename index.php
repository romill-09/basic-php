<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>WPL</title>
</head>
<body>
    <h2>Insert Form</h2>
    <form action = form.php method="POST">
        username: <input type="text" name="username"><br>
        password: <input type="password" name="password"><br>
        <input type=submit>
    </form>
    
    <h2>Update Form</h2>
    <form action = update.php method="POST">
        username: <input type="text" name="username"><br>
        password: <input type="password" name="password"><br>
        <input type=submit>
    </form>

    <h2>Delete Form</h2>
    <form action = delete.php method="POST">
        username: <input type="text" name="username"><br>
        password: <input type="password" name="password"><br>
        <input type=submit>
    </form>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "practice");
    $result = $mysqli->query("SELECT * FROM user");

    if($result->num_rows > 0)
    {
        echo("<table class='ta'>");
        while($row = $result->fetch_assoc())
        {
            echo("<tr class='ta'> <td>". $row['id']. "</td> <td>". $row['username'] ."</td> <td>". $row['password'] . "</td> </tr>");
        }
        echo("</table>");
    }
    ?>
</body>
</html>