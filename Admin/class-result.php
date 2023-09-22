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
	$message = "";
	$success_message = "";
	$error_message = "";
	if (isset($_POST['sub'])) {
		$roll_no=$_POST['roll_no'];
		$course_code=$_POST['course_code'];
		$subject_code=$_POST['subject_code'];
		$semester=$_POST['semester'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$total_marks=$_POST['total_marks'];
		$obtain_marks=$_POST['obtain_marks'];
		$count=$_POST['count'];
			$que="insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks)values('".$_POST['roll_no'][$i]."','".$_POST['course_code'][$i]."','".$_POST['subject_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['total_marks'][$i]."','".$_POST['obtain_marks'][$i].")";
			$run=mysqli_query($con,$que);
			if ($run) {
				$success_message = "All Results Has Been Submitted Successfully";
			}	
			else{
				$error_message = "All Results Has Not Been Submitted Successfully";
			}
		}
	

?>


	<!-- title of this page -->
		<title>Admin - Class Result</title>
		

		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Result Management System </h4>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">
							<?php
								if($success_message==true){
									$bg_color = "alert-success";
									$message = $success_message;
								}
								else if($error_message==true){
									$bg_color = "alert-danger";	
									$message = $error_message;
								}
							?>
							<h5 class="py-2 pl-3 <?php echo $bg_color; ?>">
								
								<?php echo $message ?>
							</h5>
						</div>
						<form action="class-result.php" method="post">
							<div class="row mt-3">
								<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Student USN:*</label>
												    <input type="text" name="roll_no" class="form-control" required>
											    </div>
											</div>
									<div class="col-md-4">
										<div class="form-group">
										<label for="exampleInputPassword1">Select Course:</label>
										<select class="browser-default custom-select" name="course_code" required>
											<option >Select Course Code</option>
											<?php
											$query="select course_code from courses";
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
										<label for="exampleInputPassword1">Select Subject Code:</label>
										<select class="browser-default custom-select" name="subject_code" required>
											<option >Select Subject Code</option>
											<?php
											$query="select subject_code from courses";
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
											        <label for="exampleInputEmail1">Enter First Name:*</label>
											        <input type="text" name="first_name" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Enter last Name:*</label>
											        <input type="text" name="last_name" class="form-control" required>
											    </div>
											</div>			
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Enter Semester: *</label>
										<input type="text" name="semester" class="form-control" required>
									</div>
								</div>
							</div>
								<div class="row mt-3">
								<div class="col-md-4">
									<input type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
								</div>
								</div>
							
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>Roll No</th>
									<th>Course Name</th>
									<th>Subject Name</th>
									<th>Semester</th>
									<th>Student Name</th>
									<th>Total Marks</th>
									<th>Obtain Marks</th>
								</tr>
								<?php  
								$i=1;
								$count=0;
									


									$que="select * from class result";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
										$count++;
									?>
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
											<td><?php echo $row['course_code'] ?></td>
											<td><?php echo $row['subject_code'] ?></td>
											<td><?php echo $row['semester'] ?></td>
											<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<td><?php echo $row['total_marks'] ?></td>
											<td><?php echo $row['obtain_marks'] ?></td>
										</tr>
								<?php		
									}
									
								?>


							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
</body>
</html>

