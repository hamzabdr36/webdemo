<?php
include("connection.php");
// request method is a idex of array of server

$error1 = "";

if ($_SERVER['REQUEST_METHOD']=="POST"){
	$name = $_POST['full-name'];
	$email = $_POST['your-email'];
	$passwd = $_POST['password'];
	$imagename = $_FILES['img']['name'];
	$tempimgname = $_FILES['img']['tmp_name'];
	move_uploaded_file($tempimgname,"images1/$imagename");

	$query = "select * from admission where mail = '$email' limit 1";
    $result = mysqli_query($conna, $query);
	$check = 0;

if($result)
{
	if($result && mysqli_num_rows($result) > 0){
		$user_data = mysqli_fetch_assoc($result);
		if($user_data["mail"]==$email )
		{
			$check = 1;
			

		}

	}
}

  if ($check==0){
	$query = "insert into admission (name, mail, password, imgpath) values ('$name', '$email', '$passwd', '$imagename')";
	mysqli_query($conna, $query);

	header("Location: login1.php");
	die;}
   else{
	   $error1 = "email already exists";
   }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>

</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<form  class="form-detail" action="" method="post" enctype="multipart/form-data">
				<h2>Register Account Form</h2>
				<div style="color: red; text-align: center;"> <?php  echo $error1;   ?></div>
				<div class="form-row">
					<label for="full-name">Full Name</label>
					<input type="text" name="full-name" id="full-name" class="input-text" placeholder="Your Name" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="your-email">Your Email</label>
					<input type="text" name="your-email" id="your-email" class="input-text" placeholder="name@email.com" required pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" minlength="8" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="file" id="img" name="img" required="required"/>					
				<input class="register" type=button onClick="location.href='index.html'" value='Cancel'>
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

