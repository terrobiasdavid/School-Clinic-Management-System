<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index1.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: index1.php");

	} else {
		$_SESSION['status']= "Wrong Email/Password";
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

	<title>Login Form - Pure Coding</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Home</a>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			
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
