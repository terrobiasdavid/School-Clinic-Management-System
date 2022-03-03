<?php
//database connection
include('db.php');

//adding data to the database
if(isset($_POST['submit'])){
	$u_card = $_POST['card_no'];
	$u_f_name = $_POST['user_first_name'];
	$u_l_name = $_POST['user_last_name'];
	$course = $_POST['user_course'];
	$student_add = $_POST['student_add'];
	$u_birthday = $_POST['user_dob'];
	$u_gender = $_POST['user_gender'];
	$u_email = $_POST['user_email'];
	$u_phone = $_POST['user_phone'];
	$guardian_name = $_POST['g_name'];
	$guardian_address = $_POST['guardian_add'];
	$year_section = $_POST['user_ys'];
	$diagnosis = $_POST['diagnosis'];
	$guardian_number = $_POST['guardian_num'];
	
	//image upload
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "upload_images/".basename($image);
	
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$insert_data = "INSERT INTO card_activation(u_card, u_f_name, u_l_name, u_course, u_add, u_birthday, u_gender, u_email, u_phone, gname, g_add, ys,  g_num,image,uploaded) VALUES ('$u_card','$u_f_name','$u_l_name','$course','$student_add','$u_birthday','$u_gender','$u_email','$u_phone','$guardian_name','$guardian_address','$year_section','$guardian_number','$image',NOW())";
  	$run_data = mysqli_query($con,$insert_data);
  	
  	$insert_diagnosis = "INSERT INTO diagnosis(student_id, diag_desc, diag_datetime) VALUES ('$u_card','$diagnosis',NOW())";
 
  	$run_data1 = mysqli_query($con,$insert_diagnosis);

  	if($run_data){


  		header("Location: register.php");
  	}
  	else{
  		echo "Data not inserted ";
  	}
  	

}

