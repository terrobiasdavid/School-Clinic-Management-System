<?php
include('db.php');
session_start();


$id = $_GET['id'];

//Fetching privious image to update
if(isset($_GET['id'])){
    $edit_id = $_GET['id'];
    $edit_query = "SELECT * FROM card_activation WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
      
        $e_image = $edit_row['image'];
     
    }
    else{
        // header('location: index.php');
        echo "Error1";
    }
}
else{
    // header("location: index.php");
    echo "Error2";
}

//Data Updating
if(isset($_POST['submit']))
{


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
	$guardian_number = $_POST['guardian_num'];
	
	$msg = "";
	$image = $_FILES['image']['name'];
	if(empty($image)){
	    $image = $e_image;
	}
	$target = "upload_images/".basename($image);


	$update = "UPDATE card_activation SET u_card='$u_card', u_f_name = '$u_f_name', u_l_name = '$u_l_name', u_course = '$course', ys = '$year_section', u_add = '$student_add', u_birthday = '$u_birthday', u_gender = '$u_gender', u_email = '$u_email', u_phone = '$u_phone', gname = '$guardian_name', g_add = '$guardian_address', g_num = '$guardian_number', image = '$image' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
           move_uploaded_file($_FILES['image']['tmp_name'], $target);
		$_SESSION['status']= "Updated Successfully";
   		$_SESSION['status_code']="success";
   		header("Location: index1.php");
	}else{
		echo "Data not update";
	}
}



?>

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