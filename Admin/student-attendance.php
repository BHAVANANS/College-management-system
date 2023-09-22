<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['sub'])) {

	$attendance_id= $_POST["attendance_id"];

	$student_id=$_POST["student_id"];

	$course_code=$_POST["course_code"];

	$subject_code=$_POST["subject_code"];

	$semester=$_POST["semester"];

	$attendance=$_POST["attendance"];

	$attendance_date=$_POST["attendance_date"];

	$que="insert into student_attendance(attendance_id,course_code,subject_code,semester,student_id,attendance,attendance_date)values('$attendance_id','$course_code','$subject_code','$semester','$student_id',  '$attendance', '$attendance_date')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Attendance</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Student Attendance Management System </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Attendance</button>
					</div>
				</div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   	<div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">Add New Attendace</h4>
						        </div>
							    <div class="modal-body">
							        <form action="student-attendance.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
													<label for='exampleInputPassword1'>Enter Attendace ID:*</label>
													<input type="text" name="attendance_id" class="form-control" required>
												</div>
											</div>
										</div>	
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
													<label for='exampleInputPassword1'>Enter Student ID:*</label>
													<input type="text" name="student_id" class="form-control" required>
												</div>
											</div>	
											<div class="col-md-4">
												<div class="form-group" style="z-index: 10;">
													<label for='exampleInputEmail1'>Enter Course Code: *</label>
													<select class="browser-default custom-select" name="course_code" required>
													<option >Select Course</option>
													<?php
													$teacher_id=$_SESSION['teacher_id'];
													$query="select distinct(course_code) as course_code from time_table";
													$run=mysqli_query($con,$query);
													while($row=mysqli_fetch_array($run)) {
													echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
													}
													?>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for='exampleInputPassword1'>Enter Subject code:*</label>
													<select class="browser-default custom-select" name="subject_code" required="">
														<option >Select Subject</option>
														<?php
														$teacher_id=$_SESSION['teacher_id'];
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
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
													<label for="exampleInputEmail1">Select Semester:</label>
													<select class="browser-default custom-select" name="semester" required>
														<option >Select Semester</option>
														<?php
														$teacher_id=$_SESSION['teacher_id'];
														$query="select distinct(semester) as semester from course_subjects";
														$run=mysqli_query($con,$query);
														while($row=mysqli_fetch_array($run)) {
														echo	"<option value=".$row['semester'].">".$row['semester']."</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for='exampleInputPassword1'>Enter Attendace:*</label>
													<input type="number" name="attendance" value="0" class="form-control" required>
												</div>
											</div>	
											<div class="col-md-4">
												<div class="form-group">
													<label for='exampleInputPassword1'>Enter Attendance date:*</label>
													<input type="date" name="attendance_date" class="form-control" required>
												</div>
											</div>
										</div>	

										<div class="modal-footer">
											<input type="submit" name="sub" class="btn btn-primary px-5" value="Save">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>	
									</form>
								</div>
							</div>
						</div>	
					</div>	
				</div>		
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Attendance ID</th>
									<th>Student ID</th>
									<th>Course code</th>
									<th>Subject Code</th>
									<th>Semester</th>
									<th>Attendance</th>
									<th>Date</th>
								</tr>
								<?php
								$que="select attendance_id,student_id,course_code,subject_code,semester,attendance,attendance_date from student_attendance";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["attendance_id"] ?></td>
										<td><?php echo $row["student_id"] ?></td>
										<td><?php echo $row["course_code"] ?></td>
										<td><?php echo $row["subject_code"] ?></td>
										<td><?php echo $row["semester"] ?></td>
										<td><?php echo $row["attendance"] ?></td>
										<td><?php echo $row["attendance_date"] ?></td>
								</tr>	
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

 