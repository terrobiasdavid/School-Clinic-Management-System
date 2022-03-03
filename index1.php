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
		<?php echo "<h1 >Welcome to Admin</h1>"; ?>
    <a href="logout.php">Logout</a>
    <br></br>
	<a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Home</a>
	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Add New Student
  </button>

  <br></br>

  <!--<a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print PDF</a>-->

  <hr>

		<table class="table table-bordered table-striped table-hover" >
		<thead>
			<tr>
			   <th class="text-center" scope="col">S.L</th>
				<th class="text-center" scope="col">Name</th>
				<th class="text-center" scope="col">Student Id.</th>
				<th class="text-center" scope="col">Phone</th>
				<th class="text-center" scope="col">View</th>
				<th class="text-center" scope="col">Edit Student info</th>
				<th class="text-center" scope="col">Add</th>
				<th class="text-center" scope="col">View Diagnosis</th>
				<th class="text-center" scope="col">Delete</th>
			</tr>
		</thead>
			<?php

        	$get_data = "SELECT * FROM card_activation order by 1 desc";
        	$run_data = mysqli_query($con,$get_data);
			$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
				$sl = ++$i;
				$id = $row['id'];
				$u_card = $row['u_card'];
				$u_f_name = $row['u_f_name'];
				$u_l_name = $row['u_l_name'];
				$u_phone = $row['u_phone'];
				$diagnosis = $row['u_diag'];

        		$image = $row['image'];

        		echo "

				<tr>
				<td class='text-center'>$sl</td>
				<td class='text-left'>$u_f_name   $u_l_name</td>
				<td class='text-left'>$u_card</td>
				<td class='text-left'>$u_phone</td>
			
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>					    
					</span>
				</td>

				<td class='text-center'>
					<span>
					
						<a href='#' class='btn btn-info' title='Add Diagnosis'>
						     <i class='fa fa-stethoscope' style='font-size:20px' color:white data-toggle='modal' data-target='#u_diag$id' aria-hidden='true'></i>
						</a>
					</span>
				</td>

				<td class='text-center'>
					<span>
					
						<a href='diagnosis.php?id=$id' class='btn btn-primary' title='View Diagnosis'>
						     <i class='fa fa-stethoscope' style='font-size:20px' color:white data-toggle='modal' aria-hidden='true' ></i>
						</a>
					</span>
				</td>

				<td class='text-center'>
					<span>
					
						<a href='#' class='btn btn-danger deleteuser' title='Delete'>
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
				</td>

			</tr>


        		";
        	}

        	?>

			
			
		</table>
		<!--<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export Data" />
    </form>-->
	</div>


	<!---Add in modal---->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><img src="https://codingcush.com/uploads/logo/logo_61b79976c34f5.png" width="300px" height="80px" alt=""></center>
        <h4 class="modal-title text-center">Add Student</h4>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">
			
			<!-- This is test for New Card Activate Form  -->
			<!-- This is Address with email id  -->
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">Student Id.</label>
<input type="text" class="form-control" name="card_no" placeholder="Enter 11-digit Student Id." maxlength="11" required>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Mobile No.</label>
<input type="phone" class="form-control" name="user_phone" placeholder="Enter 11-digit Mobile no." maxlength="11" required>
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label for="firstname">First Name</label>
<input type="text" class="form-control" name="user_first_name" placeholder="Enter First Name">
</div>
<div class="form-group col-md-6">
<label for="lastname">Last Name</label>
<input type="text" class="form-control" name="user_last_name" placeholder="Enter Last Name">
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label for="coursename">Course</label>
<input type="text" class="form-control" name="user_course" placeholder="Ex: BSCpE">
</div>
<div class="form-group col-md-6">
<label for="ysname">Year and Section</label>
<input type="text" class="form-control" name="user_ys" placeholder="Ex: 4201">
</div>
</div>


<div class="form-row" style="color: skyblue;">
<div class="form-group col-md-6">
<label for="email">Email Id</label>
<input type="email" class="form-control" name="user_email" placeholder="Enter Email id">
</div>
<div class="form-group col-md-6">
<label for="student_address">Present Address</label>
<input type="text" class="form-control" name="student_add" placeholder="Nasugbu, Batangas">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputState">Sex</label>
<select id="inputState" name="user_gender" class="form-control">
  <option selected>Choose...</option>
  <option>Male</option>
  <option>Female</option>
</select>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Date of Birth</label>
<input type="date" class="form-control" name="user_dob" placeholder="Date of Birth">
</div>
</div>


<div class="form-group">
<label for="diagnosis">Diagnosis</label>
    <textarea class="form-control" name="diagnosis" rows="3"></textarea>
</div>



<div class="form-group">
<label for="guardian_name">Guardian's Name</label>
<input type="text" class="form-control" name="g_name" placeholder="Firstname Lastname">
</div>
<div class="form-group">
<label for="guardian_address">Guardian's Address</label>
<input type="text" class="form-control" name="guardian_add" placeholder="Enter Present Address">
</div>



<div class="form-group">
<label for="guardian_number">Guardian's No.</label>
<input type="text" class="form-control" name="guardian_num" maxlength="11" placeholder="Ex: 09123456789">
</div>
			


        	<div class="form-group">
        		<label>Image</label>
        		<input type="file" name="image" class="form-control" >
        	</div>

        	
        	 <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
	
}


?>


<!-- View modal  -->
<?php 

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
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
	$diagnosis1 = $row['u_diag'];
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
						<h3 class='text-primary'>$name $name2</h3>
						<p class='text-secondary'>
						<strong>Course :</strong> $course1 <br>
						<strong>Year/Section :</strong>$ys1 <br>
						<strong>Address :</strong> $student_add1 <br>
						<i class='fa fa-venus-mars' aria-hidden='true'></i> $gender
						<br />
						<i class='fa fa-envelope-o' aria-hidden='true'></i> $email
						<br />
						<i class='fa fa-home' aria-hidden='true'> Guardian's Name : </i> $guardian_name1
						<br />
						
						
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




?>




<?php 

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$diagnosis1 = $row['u_diag'];
	echo "

	<div id='u_diag$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Add Diagnosis</h4> 
      </div>

      <div class='modal-body'>

		<form action='history.php?id=$id&dia=$diagnosis1' method='post' enctype='multipart/form-data'>
				<div class='input-group'>
				
				 <textarea class='form-control' name='diagnos' rows='3' cols='90'></textarea>
			</div>
			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>

    ";
}


?>





<?php 

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$diagnosis1 = $row['u_diag'];
	echo "

	<div id='v_diag$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Add Diagnosis</h4> 
      </div>

      <div class='modal-body'>

		<form action='history.php?id=$id&dia=$diagnosis1' method='post' enctype='multipart/form-data'>
				<div class='input-group'>
				<input type='diagnos' class='form-control' name='diagnos' required>
			</div>
			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>

    ";
}


?>



<!-- add/view diagnosis modal end -->




<!----edit Data--->

<?php

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	
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
	$guardian_num1 = $row['g_num'];
	$image = $row['image'];
	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit Student Data</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputEmail4'>Student Id.</label>
		<input type='text' class='form-control' name='card_no' placeholder='Enter 12-digit Student Id.' maxlength='12' value='$card' required>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Mobile No.</label>
		<input type='phone' class='form-control' name='user_phone' placeholder='Enter 10-digit Mobile no.' maxlength='11' value='$phone' required>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='firstname'>First Name</label>
		<input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name' value='$name'>
		</div>
		<div class='form-group col-md-6'>
		<label for='lastname'>Last Name</label>
		<input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name' value='$name2'>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='coursename'>Course</label>
		<input type='text' class='form-control' name='user_course' placeholder='Ex: BSCpE' value='$course1'>
		</div>
		<div class='form-group col-md-6'>
		<label for='ysname'>Year and Section</label>
		<input type='text' class='form-control' name='user_ys' placeholder='Ex: 4201' value='$ys1'>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='email'>Email Id</label>
		<input type='email' class='form-control' name='user_email' placeholder='Enter Email id' value='$email'>
		</div>
		<div class='form-group col-md-6'>
		<label for='student_address'>Present Address</label>
		<input type='text' class='form-control' name='student_add' placeholder='Nasugbu, Batangas' value='$student_add1'>
		</div>
		</div>
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputState'>Gender</label>
		<select id='inputState' name='user_gender' class='form-control' value='$gender'>
		  <option selected>$gender</option>
		  <option>Male</option>
		  <option>Female</option>
		  <option>Other</option>
		</select>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Date of Birth</label>
		<input type='date' class='form-control' name='user_dob' placeholder='Date of Birth' value='$Bday'>
		</div>
		</div>
		
						
		<div class='form-group'>
		<label for='guardian_name'>Guardian's Name</label>
		<input type='text' class='form-control' name='g_name' placeholder='Firstname Lastname' value='$guardian_name1'>
		</div>
		<div class='form-group'>
		<label for='guardian_address'>Guardian's Address</label>
		<input type='text' class='form-control' name='guardian_add' placeholder='Enter Present Address' value='$guardian_add1'>
		</div>
		
		
		<div class='form-group'>
		<label for='
		ber'>Guardian No.</label>
		<input type='text' class='form-control' name='guardian_num' maxlength='11' placeholder='Ex: 09123456789' value='$guardian_num1'>
		</div>
        	

        	<div class='form-group'>
        		<label>Image</label>
        		<input type='file' name='image' class='form-control'>
        		<img src = 'upload_images/$image' style='width:50px; height:50px'>
        	</div>

        	
        	
			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>


	";
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
