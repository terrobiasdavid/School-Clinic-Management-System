<?php
include('db.php');

?>
<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head >
	<title>Infirmary Management System</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >
	
	<div class="container" >
		<?php echo "<h1 >Welcome Student</h1>"; ?>
    <a href="logout.php">Logout</a>
    <br></br>
	<a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" ></i> Home</a>

  <br></br>


  <hr>
<table class="table table-bordered table-striped table-hover" >
		<thead>
			<tr>
			
				<th class="text-center" scope="col">View Profile</th>
				<th class="text-center" scope="col">View Diagnosis</th>
				
			</tr>
		</thead>
		
	
			<?php
					$ema=$_SESSION['email'];
        	$get_data = "SELECT * FROM card_activation where u_email = '$ema'";
        	$run_data = mysqli_query($con,$get_data);
					$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
        		if($ema==$row['u_email']){
						$sl = ++$i;
						$id = $row['id'];
        		echo "
				<tr>
			
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>	
				</td>

				<td class='text-center'>
					<span>
					
						<a href='diagnosis1.php?id=$id' class='btn btn-primary' title='View Diagnosis'>
						     <i class='fa fa-stethoscope' style='font-size:20px' color:white data-toggle='modal' aria-hidden='true'></i>
						</a>
					</span>
				</td>
			</tr>
        		";
        	}
        }
        	?>		
		</table>


<?php 

$ema=$_SESSION['email'];

$get_data = "SELECT * FROM card_activation where u_email = '$ema' ";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	if($ema==$row['u_email']){
		$id = $row['id'];
		$card = $row['u_card'];
		$name = $row['u_f_name'];
		$name2 = $row['u_l_name'];
		$course1 = $row['u_course'];
		$ys1 = $row['ys'];
		$gender = $row['u_gender'];
		$email = $row['u_email'];
		$student_add1 = $row['u_add'];
		$Bday = $row['u_birthday'];
		$phone = $row['u_phone'];
		$guardian_name1 = $row['gname'];
		$guardian_add1 = $row['g_add'];
		$time = $row['uploaded'];
		
		$image = $row['image'];
		echo "

			<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
			<div class='modal-dialog'>
				<div class='modal-content'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
				</div>
				<div class='modal-body'>
				<div class='container' id='profile'> 
					<div class='row'>
						<div class='col-sm-4 col-md-2'>
							<img src='upload_images/$image' alt='' style='width: 150px; height: 150px;' ><br>
			
							<i class='fa fa-id-card' aria-hidden='true'></i> $card<br>
							<i class='fa fa-phone' aria-hidden='true'></i> $phone  <br>
							Issue Date : $time
						</div>
						<div class='col-sm-3 col-md-6'>
							<h2 class='text-primary'>$name $name2</h2>
							<p class='text-secondary'>
							<strong>Course :</strong> $course1 <br>
							<strong>Year/Section :</strong>$ys1 <br>
							<strong>Address :</strong> $student_add1 <br>
							<i class='fa fa-venus-mars' aria-hidden='true'></i> $gender
							<br />
							<i class='fa fa-envelope-o' aria-hidden='true'></i> $email
							<br />
							<i class='fa fa-home' aria-hidden='true'> Guardian's Name : </i> $guardian_name1
							<div class='col-sm-3 col-md-6'>


						
							
							</p>
							<!-- Split button -->
						</div>
					</div>

				</div>   
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				</div>
				</form>
				</div>
			</div>
			</div> 

	    ";
	  }
}

?>





<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>
