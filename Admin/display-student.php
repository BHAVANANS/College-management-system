<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginAdmin"])
	{
		$roll_no=$_GET['roll_no'] ?? $_SESSION['LoginStudent'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']){
		$roll_no=$_SESSION['LoginStudent'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
	$query="select * from student_info where roll_no='$roll_no'";
	$run=mysqli_query($con,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Father Name:</h5> <?php echo $row['father_name']  ?><br><br>
							<h5>Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['mobile_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>Address:</h5> <?php echo $row['permanent_address']  ?><br><br>
							
							<h5>Roll No:</h5> <?php echo $row['roll_no']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Applicant Status:</h5> <?php echo $row['applicant_status']  ?></div>
				<div class="col-md-4"><h5>Application Status:</h5> <?php echo $row['application_status']  ?></div>
				<div class="col-md-4"><h5>Admission Quota:</h5> <?php echo $row['prospectus_issued']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Phone No:</h5> <?php echo $row['mobile_no']  ?></div>
				<div class="col-md-4"><h5>Gender:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>Course:</h5> <?php echo $row['course_code']  ?></div>
				
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row['dob']  ?></div>
				<div class="col-md-4"><h5>Place of Birth:</h5> <?php echo $row['place_of_birth']  ?></div>
				<div class="col-md-4"><h5>Admission Date:</h5> <?php echo $row['admission_date']  ?></div>
				
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Permanent Adress:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>Current Address:</h5> <?php echo $row['current_address']  ?></div>
				
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Matric/10th Pass Year:</h5> <?php echo $row['matric_complition_date']  ?></div>
				
				<div class="col-md-4"><h5>Matric/10th Certificate:</h5> 
					<?php  $matric_certificate= $row["matric_certificate"] ?>
						<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$matric_certificate"  ?> >
				</div>
			

					
			</div>

			<div class="row pt-3">
				<div class="col-md-4"><h5>PUC/12th/Diploma pass year:</h5> <?php echo $row['fa_complition_date']  ?></div>
				
				<div class="col-md-4"><h5>PUC/12th/Diploma Certificate:</h5> 
					<?php  $fa_certificate= $row["fa_certificate"] ?>
						<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$fa_certificate"  ?> >
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Aadhar Number:</h5> <?php echo $row['aadhar_number']  ?></div>
				
				<div class="col-md-4"><h5>Aadhar Card:</h5> 
					<?php  $aadhar_card= $row["aadhar_card"] ?>
						<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$aadhar_card"  ?> >
				</div>
			</div>
		</div>
	<?php } ?>
</body>
</html>