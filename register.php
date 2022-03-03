<?php 

include 'config.php';

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users1 WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users1 (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$_SESSION['status']= "Wow! User Registration Completed.";
   				$_SESSION['status_code']="success";
				
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				$_SESSION['status']= "Woops! Something Wrong Went.";
   				$_SESSION['status_code']="error";
			}
		} else {
				$_SESSION['status']= "Woops! Email Already Exists.";
   				$_SESSION['status_code']="error";
	
		}
		
	} else {
		$_SESSION['status']= "Password Not Matched.";
   		$_SESSION['status_code']="error";
		
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style1.css">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login_stud.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>

<script src="js/sweetalert.min.js"></script>

<?php 
    
    if(isset($_SESSION['status']))
    {
        ?>
            <script>
            	swal({
            		title: "<?php echo $_SESSION['status']; ?>",
            	
            		icon: "<?php echo $_SESSION['status_code']; ?>",
            		button: "Confirm!",
            	});

            </script>
        <?php 
        unset($_SESSION['status']);
    }
    ?>