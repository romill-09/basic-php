<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">   
    <title>WPL</title>
</head>
<body>
<div class="container my-4 ">
    <h2 class = "text-center"> Sign Up!</h2>
    <form action="signup.php" method="POST">
        <div class = "form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
            aria-describedby="emailHelp">
        </div>

        <div class = "form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"
            aria-describedby="emailHelp">
        </div>

        <div class = "form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class = "form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">
                Make sure to type the same password
            </small>
        </div>

        <button type="submit" class="btn btn-primary"> 
            SignUp 
        </button> 
    </form>
</div>

    
</body>
</html>