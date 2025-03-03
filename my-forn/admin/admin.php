
<?php


    $con = new mysqli("localhost", "root", "", "database");

	if (!$con){
		?>
			<script>alert("Connection Unsuccessful!!!");</script>
		<?php
	}


	if (isset($_POST['sbt'])) {

$first=$_POST['first'];
$last=$_POST['last'];

$email=$_POST['email'];
$uni_id=$_POST['uni_id'];
$description=$_POST['description'];
$date=$_POST['date'];
$payment=$_POST['payment'];



$quer = "select ucode code from unicode";
$sql_result = mysqli_query($con, $quer);
$resultstring = $sql_result->fetch_row();
if ($resultstring[0] == $uni_id) {
   

	if (isset($_FILES['file']['name']))
	{
	$file_name = $_FILES['file']['name'];
	$file_tmp = $_FILES['file']['tmp_name'];


	move_uploaded_file($file_tmp,"./Adminpdf/".$file_name);

	$insertquery =
	"insert into admin(first,last,email,uni_id,description,date,file,payment) values('$first','$last','$email','$uni_id','$description','$date','$file_name','$payment')";
	$iquery = mysqli_query($con, $insertquery);
	}
	echo '<script>alert("success");window.open("index.html","_self")</script>';
   
}

else{

	
		echo '<script>alert("Invalid User");window.open("signup.html","_self")</script>';
		die;

	}

}
?>