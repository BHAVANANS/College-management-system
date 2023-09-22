<!---------------- Session starts form here ----------------------->
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
	{
		$teacher_id=$_GET['teacher_id'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
		$teacher_email=$_SESSION['LoginTeacher'];
		$teacher_id="";
	}
	else{ ?>
		<script> alert("Your Are Not Autorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Teacher Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
		if($teacher_id){
			$query="select * from teacher_info where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_info where email='$teacher_email'";
		}
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" height='270px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['phone_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>Teacher I'd:</h5> <?php echo $row['teacher_id']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Status:</h5> <?php echo $row['teacher_status']  ?></div>
				<div class="col-md-4"><h5>Gender:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row['dob']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Other phone No:</h5> <?php echo $row['other_phone']  ?></div>
				<div class="col-md-4"><h5>Designation:</h5> <?php echo $row['designation']  ?></div>
				<div class="col-md-4"><h5>Specification area:</h5> <?php echo $row['specification_area']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Matric/10th Complition year:</h5> <?php echo $row['matric_complition_date']  ?></div>
				
				<div class="col-md-4"><h5>Matric/10th Certificate:</h5> 
					<?php  $matric_certificate= $row["matric_certificate"] ?>
					<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$matric_certificate"  ?> >
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>12th Complition year:</h5> <?php echo $row['fa_complition_date']  ?></div>
				
				<div class="col-md-4"><h5>12th Certificate:</h5> 
					<?php  $fa_certificate= $row["fa_certificate"] ?>
					<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$fa_certificate"  ?> >
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>UG Complition year:</h5> <?php echo $row['ba_complition_date']  ?></div>
		
				<div class="col-md-4"><h5>UG Certificate:</h5> 
				<?php  $ba_certificate= $row["ba_certificate"] ?>
					<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$ba_certificate"  ?> >
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>PG Complition year:</h5> <?php echo $row['ma_complition_date']  ?></div>
				
				<div class="col-md-4"><h5>PG Certificate:</h5>
					<?php  $ma_certificate= $row["ma_certificate"] ?>
					<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$ma_certificate"  ?> >
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>PhD Completed :</h5> <?php echo $row['phd_status']  ?></div>
				
				<div class="col-md-4"><h5>Phd Certificate:</h5> 
				<?php  $phd_certificate= $row["phd_certificate"] ?>
					<img class="ml-2 mb-2" height='100px' width='100px' src=<?php echo "images/$phd_certificate"  ?> >
				</div>
			</div>
		</div>
	<?php } ?>
</body>
</html>
