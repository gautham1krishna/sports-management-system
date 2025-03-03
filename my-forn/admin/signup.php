

<?php


    $con = new mysqli("localhost", "root", "", "database");

	if (!$con){
		?>
			<script>alert("Connection Unsuccessful!!!");</script>
		<?php
	}


	if (isset($_POST['submit'])) {

		$name=$_POST['name'];
$email=$_POST['email'];
$ktu_id=$_POST['ktu_id'];
$college=$_POST['college'];

		if (isset($_FILES['pdf_file']['name']))
		{
		$file_name = $_FILES['pdf_file']['name'];
		$file_tmp = $_FILES['pdf_file']['tmp_name'];


		move_uploaded_file($file_tmp,"./pdf/".$file_name);

		$insertquery =
		"insert into details(name,email,ktu_id,college,certificate) values('$name','$email','$ktu_id','$college','$file_name')";
		$iquery = mysqli_query($con, $insertquery);
		echo '<script>alert("success");window.open("index.html","_self")</script>'; echo '<script>alert("success");window.open("index.html","_self")</script>';
		}
		else
		{
		?>
				<?php echo $file_name;			?>

			<div class=
			"alert alert-danger alert-dismissible
			fade show text-center">
			<a class="close" data-dismiss="alert"
				aria-label="close">x</a>
			<strong>Failed!</strong>
				File must be uploaded in PDF format!
			</div>
		<?php

		}
	}
?>
