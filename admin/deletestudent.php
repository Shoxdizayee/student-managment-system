<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>
<?php include('admin.header.php') ?>


<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3  jumbotron ">
			<div  style="text-align: center;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" >
				Choose Standard: <select name="standard" class="btn btn-info" style="margin-right: 30px;">					<option>Select</option>
									<option>1st</option>
									<option>2nd</option>
									<option>3rd</option>
									<option>4th</option>
									<option>5th</option>
								</select>
				<input type="submit" name="search" value="SEARCH" class="btn btn-success">
			</form>
			</div>
		</div>
	</div>


<table class="table table-striped table-bordered table-responsive text-center">
	<h2 class="text-center">Student's Information</h2>
	<tr>
	
		<th class="text-center">Roll No.</th>
		<th class="text-center">Full Name</th>
		<th class="text-center">GPA</th>
		<th class="text-center">Grade.</th>
		<th class="text-center">Course</th>
		<th class="text-center">Delete</th>
		
	</tr>
<?php 
	include('../dbcon.php');
	if (isset($_POST['search'])) {

		$standard = $_POST['standard'];

		$sql = "SELECT * FROM `student` WHERE `standard` = '$standard'";

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$Id = $DataRows['id'];
				$RollNo = $DataRows['rollno'];
				$Name = $DataRows['name'];
				$gpa = $DataRows['gpa'];
				$grade = $DataRows['grade'];
				$course = $DataRows['course'];
				?>
				<tr>
					<td><?php echo $RollNo;?></td>
					<td><?php echo $Name; ?></td>
					<td><?php echo $gpa; ?></td>
					<td><?php echo $grade; ?></td>
					<td><?php echo $course; ?></td>
					<td><a href="deleterecord.php?Delete=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
				</tr>
				<?php
				
			}
			
		} else {
			echo "<tr><td colspan ='6' class='text-center'>No Record Found</td></tr>";
		}
	}

 ?>
	

</table>
</div>

<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2><?php echo @$_GET['deleted']; ?></h2>
			</div>
		</div>
	</div>	



<?php include('../footer.php') ?>