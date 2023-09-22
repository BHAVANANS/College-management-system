<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION['LoginTeacher']="";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];

 		$last_name=$_POST["last_name"];
 		
		$father_name=$_POST["father_name"];

 		$email=$_POST["email"];
 		
 		$phone_no=$_POST["phone_no"];
 		
 		$teacher_status=$_POST["teacher_status"];
 		
 		$application_status=$_POST["application_status"];
 		
 		$dob=$_POST["dob"];
 		
 		$other_phone=$_POST["other_phone"];
 		
 		$gender=$_POST["gender"];
 		
 		$matric_complition_date=$_POST["matric_complition_date"];
 		
 		
 		$fa_complition_date=$_POST["fa_complition_date"];
 		
 		
 		
 		$ba_complition_date=$_POST["ba_complition_date"];
 		
 		$ma_complition_date=$_POST["ma_complition_date"];

 		$phd_status=$_POST["phd_status"];
 		
 		$specification_area=$_POST["specification_area"];

		$designation=$_POST["designation"];

 		$hire_date=date("d-m-y");

 		$password=$_POST['password'];

 		$role=$_POST['role'];

		
// *****************************************Images upload code starts here********************************************************** 
 		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		$fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

		$ba_certificate = $_FILES['ba_certificate']['name'];$tmp_name=$_FILES['ba_certificate']['tmp_name'];$path = "images/".$ba_certificate;move_uploaded_file($tmp_name, $path);

		$ma_certificate = $_FILES['ma_certificate']['name'];$tmp_name=$_FILES['ma_certificate']['tmp_name'];$path = "images/".$ma_certificate;move_uploaded_file($tmp_name, $path);

		$phd_certificate = $_FILES['phd_certificate']['name'];$tmp_name=$_FILES['phd_certificate']['tmp_name'];$path = "images/".$phd_certificate;move_uploaded_file($tmp_name, $path);

// *****************************************Images upload code end here********************************************************** 


 		$query="Insert into teacher_info(first_name,middle_name,last_name,email,phone_no,profile_image,teacher_status,application_status,dob,other_phone,gender,matric_complition_date,matric_certificate,fa_complition_date,fa_certificate,ba_complition_date,ba_certificate,ma_complition_date,ma_certificate,phd_status,phd_certificate,designation,specification_area,hire_date)values('$first_name','$middle_name','$last_name','$email','$phone_no','$profile_image','$teacher_status','$application_status','$dob','$other_phone','$gender','$matric_complition_date','$matric_certificate','$fa_complition_date','$fa_certificate','$ba_complition_date','$ba_certificate','$ma_complition_date','$ma_certificate','$phd_status','$phd_certificate','$designation','$specification_area','$hire_date')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 		$query2="insert into login(user_id,Password,Role)values('$email','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			echo "Your Data has been submitted into login";
 		}
 		else {
 			echo "Your Data has not been submitted into login";
 		}
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$teacher_id=$_POST['teacher_id'];

		$subject_code=$_POST['subject_code'];

		$total_classes=$_POST['total_classes'];

		$date=date("d-m-y");

		$query3="insert into teacher_courses(course_code,semester,teacher_id,subject_code,assign_date,total_classes)values('$course_code','$semester','$teacher_id','$subject_code','$date','$total_classes')";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Teacher</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Teacher Management System </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Teacher</button>
					</div>
				</div>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add New Teacher</h4>
									</div>
									<div class="modal-body">
										<form action="teacher.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">First Name: *</label>
														<input type="text" name="first_name" class="form-control" required="" placeholder="First Name">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Middle Name: </label>
														<input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
													</div>
												</div><div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Last Name: *</label>
														<input type="text" name="last_name" class="form-control" required="" placeholder="Last Name">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Teacher Email: *</label>
														<input type="text" name="email" class="form-control" required="" placeholder="Enter Email">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Mobile No: *</label>
														<input type="number" name="phone_no" class="form-control"placeholder="Enter Mobile Number" required>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Other Phone: </label>
														<input type="number" name="other_phone" class="form-control" placeholder="Other Phone No">
													</div>
												</div>
												
											</div>
											<div class="row">
											<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Father Name: * </label>
														<input type="text" name="father_name" class="form-control" required>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Select Your Profile: * </label>
														<input type="file" name="profile_image" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Hire Date  : * </label>
														<input type="date" name="hire_date" class="form-control" required>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Teacher Status: *</label>
														<select class="browser-default custom-select" name="teacher_status" required>
															<option selected>Select Status</option>
															<option value="Permanent">Permanent</option>
															<option value="Contract">Contract</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Application Status: *</label>
														<select class="browser-default custom-select" name="application_status">
															<option >Select Status</option>
															<option value="Approved">Approved</option>
															<option value="With-held">With-held</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Date of Birth: *</label>
														<input type="date" name="dob" class="form-control" required>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Gender: *</label>
														<select class="browser-default custom-select" name="gender">
															<option selected>Select Gender</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Matric/10th Complition year: *</label>
														<input type="number" name="matric_complition_date" class="form-control" required>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Certificate: *</label>
														<input type="file" name="matric_certificate" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">12th Complition year: *</label>
														<input type="number" name="fa_complition_date" class="form-control" required>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Certificate: *</label>
														<input type="file" name="fa_certificate" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">UG Complition year: *</label>
														<input type="number" name="ba_complition_date" class="form-control" required>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Certificate: *</label>
														<input type="file" name="ba_certificate" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">PG Complition year: *</label>
														<input type="number" name="ma_complition_date" class="form-control" required>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Certificate: *</label>
														<input type="file" name="ma_certificate" class="form-control" required>
													</div>
												</div>

											</div>

											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputEmail1">PhD completed: *</label>
														<select class="browser-default custom-select" name="phd_status" required>
															<option selected>Select option</option>
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Certificate (if Yes):</label>
														<input type="file" name="phd_certificate" class="form-control">
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputEmail1">Designation: *</label>
														<input type="text" name="designation" class="form-control" required>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Area of Specification:</label>
														<input type="text" name="specification_area" class="form-control" required>
													</div>
												</div>
												
											</div>

											<!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
											<div>
												<input type="hidden" name="password" value="teacher123*">
												<input type="hidden" name="role" value="Teacher">
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<div class="row">
								<div class="col-md-3 offset-9 pt-5 mb-2">
									<!-- Large modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Assign Subjects</button>
									<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-info text-white">
													<h4 class="modal-title text-center">Assign Subjects To Teachers</h4>
												</div>
												<div class="modal-body">
													<form action="teacher.php" method="POST" enctype="multipart/form-data">
														<div class="row mt-3">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputEmail1">Select Course:*</label>
																	<select class="browser-default custom-select" name="course_code" required="">
																		<option >Select Course</option>
																		<?php
																			$query="select distinct(course_code) from time_table";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																			}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1" required>Enter Semester:*</label>
																	<input type="text" name="semester" class="form-control">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1">Enter Teacher Id:*</label>
																	<input type="text" name="teacher_id" class="form-control" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1">Please Select Subject:*</label>
																	<select class="browser-default custom-select" name="subject_code" required="">
																		<option >Select Subject</option>
																		<?php
																			$query="select subject_code from time_table";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputPassword1">Enter Total Classes:*</label>
																	<input type="text" name="total_classes" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<input type="submit" class="btn btn-primary" name="btn_save2">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
									</div>
									</div>
								</div>
							</div>
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Teacher ID</th>
									<th>Teacher Name</th>
									<th>Phone number</th>
									<th>Email</th>
									<th>Hire Date</th>
									<th>Profile</th>
									<th>Operations</th>
								</tr>
								<?php 
								$query="select teacher_id,first_name,middle_name,last_name,phone_no,email,hire_date,profile_image from teacher_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["teacher_id"] ?></td>
										<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
										<td><?php echo $row["phone_no"] ?></td>
										
										<td><?php echo $row["email"] ?></td>
										<!-- date_format($date,"Y/m/d H:i:s"); -->
										<td><?php echo date("Y-M-d",strtotime($row["hire_date"])); ?></td>
										<td><?php  $profile_image= $row["profile_image"] ?>
										<img height='50px' width='50px' src=<?php echo "images/$profile_image"  ?> >
										</td>
										<td width='170'> 
											<?php 
												echo "<a class='btn btn-primary' href=display-teacher.php?teacher_id=".$row['teacher_id'].">Profile</a> 
												<a class='btn btn-danger' href=delete-function.php?teacher_id=".$row['teacher_id'].">Delete</a> "
											?>
										</td></tr>"
									<?php }
									?>
							</table>				
						</section>
					</div>
				</div>	 	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


