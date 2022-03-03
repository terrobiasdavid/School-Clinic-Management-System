<?php
include('db.php');

?>
<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index2.php");
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
		<?php echo "<h1 style='text-align: center'>DIAGNOSIS</h1>"; ?>
    
    <br></br>
	<a href="index2.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left" ></i> Back</a>

  <br></br>


  <hr>

		<table class="table table-bordered table-striped table-hover" >
		<thead>
			<tr>
			   <th class="text-center" scope="col">No. of Diagnosis</th>
				<th class="text-center" scope="col">Description</th>
				<th class="text-center" scope="col">Date/Time</th>
			
			</tr>
		</thead>
		
			
			<?php
			$id = $_GET['id'];
			$i = 0;
			$get_data = "SELECT * FROM diagnosis WHERE student_id = '$id'";
        	$run_data = mysqli_query($con,$get_data);
        	while($row = mysqli_fetch_array($run_data))
        	{
        		$diag_desc = $row['diag_desc'];
				$diag_dt = $row['diag_datetime'];
        		$sl = ++$i;
        		echo "
				<tr>
				<td class='text-left'>$sl</td>
				<td class='text-left'>$diag_desc</td>
				<td class='text-left'>$diag_dt</td>
			</tr>
        		";
        		
        	
    	
   			 }
        	?>		
		</table>
