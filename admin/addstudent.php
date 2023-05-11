<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">INSERT STUDENT DETAIL</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				      Roll No.:<input type="text" class="form-control" name="roll" placeholder="Enter Roll No." >
				  </div>
				  <div class="form-group">
				    
				    full Name:<input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
				  </div>
				  <div class="form-group">
				      GPA: <input type="text" class="form-control" name="gpa" placeholder="GPA" required>
				  </div>
				  <div class="form-group">
				    
				    Grade.:<input type="text" class="form-control" name="grade" placeholder="Enter Grade." required>
				  </div>
				  <div class="form-group">
				    
				    standard:<input type="text" class="form-control" name="standard" placeholder="Enter Student Standard" required>
				  </div>

				   <div class="form-group">
				    
				    Course:<input type="text" class="form-control" name="course" required>
				  </div>

				  <button type="submit" name="submit" class="btn btn-success btn-lg">INSERT</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['roll']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$roll=$_POST['roll'];
			$name=$_POST['fullname'];
			$gpa=$_POST['gpa'];
			$grade=$_POST['grade'];
			$standard=$_POST['standard'];
			$course=$_POST['course'];

			$sql = "INSERT INTO `student`( `rollno`, `name`, `gpa`, `grade`, `standard`,`course`) VALUES ('$roll','$name','$gpa','$grade',$standard,'$course')";

			$run = mysqli_query($conn,$sql);

			if ($run == true) {
				
				?>
				<script>
					alert("Data Inserted Successfully");
				</script>
				<?php
			} else {
				echo "Error : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("Please insert atleast roll no. and fullname");
				</script>
				<?php
		}


	}

 ?>








