<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
	<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		if (isset($_POST['login'])) { //user logging in

			require 'login.php';
        
		}
    
		elseif (isset($_POST['register'])) { //user registering
        
			require 'register.php';
        
		}
	}
	?>

<body>
    <div>
        <div class="header-blue" style="height:75px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php">Annotatia</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form><span class="navbar-text"> <a href="signin.php" class="login">Log In</a></span></div>
                </div>
            </nav>
        </div>
    </div>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="signup.php" method="post" autocomplete="off">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="text" name="firstname" placeholder="First Name" required><input class="form-control" type="text" name="lastname" placeholder="Surname" required><input class="form-control" type="email" name="email" placeholder="Email" required>
                    <input
                        class="form-control" type="password" name="password" placeholder="Password" required></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="register">Sign Up</button></div><a href="signin.php" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>