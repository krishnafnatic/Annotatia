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
 $email = $_SESSION['email'];
$sql = "SELECT * FROM `upload`";
$result = mysqli_query($connection, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function deleteItem(id) {
    if (confirm("Are you sure?")) {
        // your deletion code
        window.location.href='delete.php?id='+id;
    }
    return false;
}
</script>
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
	<br><div>
	<div class="container">

<table class="table" style="color:black">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Name</th>
      <th>Size</th>
      <th>Email</th>
      <th>Location</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
  	while($r = mysqli_fetch_assoc($result)){
		
   ?>
    <tr>
      <th scope="row"><?php echo $r['id'] ?></th>
      <td><?php echo $r['name'] ?></td>
      <td><?php echo $r['size'] ?></td>
      <td><?php echo $r['email'] ?></td>
      <td><a href="download.php?filename=<?php echo $r['name'] ?>">Download</a></td>
	<?php  if($email==$r['email']){
		?>
	  <td><a href="#" onclick='deleteItem(<?php  echo $r['id'] ?>)'>Delete</a></td>
	<?php
	}
	?>
    </tr>
	
    <?php
    }
    ?>
  </tbody>
</table>
      
</div></div>
</body>

</html>