<?php
/* Displays user information and some useful messages */
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
require('connect.php');
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$email = $_SESSION['email'];

$tmp_name = $_FILES['file']['tmp_name'];

$extension = substr($name, strpos($name, '.') + 1);

$max_size = 1000000000;
if(isset($name) && !empty($name)){
	if(($extension == "jpg" || $extension == "jpeg" || $extension == "docx" || $extension == "doc" || $extension == "pdf") && $extension == $size<=$max_size){
		$location = "uploads/";
		if(move_uploaded_file($tmp_name, $location.$name)){
			$query = "INSERT INTO `upload` (name, size, email, location) VALUES ('$name', '$size', '$email', '$location$name')";
        		$result = mysqli_query($connection, $query);
			$smsg = "Uploaded Successfully.";	
		}else{
			$fmsg = "Failed to Upload File";
		}
	}else{
		$fmsg = "File size should be 100 KiloBytes & Only JPEG File";
	}
}else{
	$fmsg = "Please Select a File";
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    <div>
        <div class="header-blue" style="height:5px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="mainprofile.php">Annotatia</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"></label></div>
                        </form><span class="navbar-text"> </span><a class="btn btn-light action-button" role="button" href="logout.php">Logout</a></div>
        </div>
        </nav>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<br>
	<div class="container">
<?php //echo $name; ?>
<?php //echo $size; ?>
<?php //echo $type; ?>
<?php //echo $tmp_name; ?>
      <form class="form-signin" method="POST" enctype="multipart/form-data">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>      
        <h2 class="form-signin-heading">Upload File</h2>
	  <div class="form-group">
	    <label for="exampleInputFile">File input</label>
	    <input type="file" name="file" id="exampleInputFile">
	    <p class="help-block">Upload JPEG Files that are below 100 KiloBytes</p>
	  </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
      </form><br><br>
	 <center> <a href="mainprofile.php" style="color:black">Home</a></center>
</div>
</body>

</html>