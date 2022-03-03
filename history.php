<?php
include('db.php');
$id = $_GET['id'];


if(isset($_POST['submit']))
{
	$diagnosis =$_POST['diagnos'];

	$update = "UPDATE card_activation SET u_diag = '$diagnosis' WHERE id=$id";
	
	$sql= "INSERT INTO diagnosis (diag_desc, diag_datetime, student_id) VALUES ('$diagnosis', NOW(), '$id')";


	$run_update = mysqli_query($con,$update);
	$run_update1 = mysqli_query($con,$sql);
	header("Location:index1.php");
}