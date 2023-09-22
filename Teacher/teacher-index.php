 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
	$_SESSION["LoginAdmin"]="";
	$teacher_email=$_SESSION['LoginTeacher'];
	$query1="select * from teacher_info where email='$teacher_email'";
	$run1=$run=mysqli_query($con,$query1);
	while($row=mysqli_fetch_array($run1)) {
		$teacher_id=$row["teacher_id"];
	}
	$_SESSION['teacher_id']=$teacher_id;
?>


<html lang="en">
	<head>
		<title>Teacher - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Welcome To <?php $roll_no=$_SESSION['LoginTeacher'];
					$query="select * from teacher_info where email='$teacher_email'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?> Dashboard </h4> </h4>
				</div>
				<div class="row">
					<div class="col-lg-9 col-md-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-three text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-money mr-3" aria-hidden="true"></i> Salary Report</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<table class="w-100 table-elements table-three-tr"cellpadding="2">
										<tr class="pt-5 table-three text-white" style="height: 32px;">
											<th>Salary Voucher</th>
											<th>Teacher ID</th>
											<th>Total Amount</th>
											<th>Status</th>
											<th>Paid Date</th>
										</tr>
										<?php  
											$teacher_id=$_SESSION['teacher_id'];
											$query="select * from teacher_salary_report where teacher_salary_report.teacher_id='$teacher_id'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
												<tr>
													<td><?php echo $row['salary_id'] ?></td>
													<td><?php echo $row['teacher_id'] ?></td>
													<td><?php echo $row['total_amount'] ?></td>
													<td><?php echo $row['status'] ?></td>
													<td><?php echo $row['paid_date'] ?></td>
												</tr>		
											<?php
											}
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12 mt-4">
						<table class="w-100 table-striped table-hover table-dark"cellpadding="2" >
							<tr>
								<td colspan="12" class="text-center text-white"><h5>Attendance Report</h5></td>
							</tr>
							<tr>
								<th>Month</th>
								<th>Working Days</th>
								<th>Presents</th>
								<th>Absents</th>
								<th>L.A</th>
								<th>C.L</th>
								<th>M.L</th>
								<th>S.L</th>
							</tr>
							
							<?php
								$query="select month(attendance_date) as attendance_date,sum(attendance) as present from teacher_attendance  where teacher_id='$teacher_id' group by month(attendance_date) ";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row['attendance_date'] ?></td>						
										<td><?php echo $row['present'] ?></td>
										<td><?php echo $row['present'] ?></td>
										<td><?php echo $row['present']-$row['present'] ?></td>
										<td>00</td>
										<td>15</td>
										<td>15</td>
										<td>15</td>
									</tr>
								<?php }
							?>
						</table>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>