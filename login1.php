
<?php
include("connection.php");
$er = "";
// request method is a idex of array of server
if ($_SERVER['REQUEST_METHOD']=="POST"){    
    $email = $_POST['your-email'];
    $passwd = $_POST['password'];
    if (!empty($passwd) ){
        $query = "select * from admission where mail = '$email' limit 1";
        $result = mysqli_query($conna, $query);
        if($result)
        {
            
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data["password"]==$passwd )
                {
                    // create session variable
                    // user object in session
                    session_start();
                    $_SESSION['user'] = $user_data; 
                    header("Location: dash.php");
                    die;
                }
                else{
                    $er ="invalid credentials";
                }
            }else{
                $er ="invalid credentials";
            }
           }
           else{
               $er ="invalid input";
                }
    } else {
        $er ="invalid input";
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
			<form id=formlogin class="form-detail" action="#" method="post">
				<h2>User Login</h2>
                <div style="color: red; text-align: center;"> <?php  echo $er;   ?></div>
				<div class="form-row">
					<label for="your-email">Your Email</label>
					<input type="text" name="your-email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
				<input class="register" type=button onClick="location.href='index.html'" value='Cancel'>
					<input type="submit" name="register" class="register" value="Login">

					
				</div>
                
			</form>
		</div>
	</div>

  

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>