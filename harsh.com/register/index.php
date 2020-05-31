<?php
	include('../include/db.php');
	$name = $_POST['name'];
	$number =$_POST['number'];
	$number1 = $_POST['number1'];		
	$email = $_POST['email'];		
	$date = $_POST['date'];

	$query ="INSERT INTO `contacts`(`id`, `name`, `email`, `phonenumber`, `phonenumber2`, `dateofbirth`) VALUES ('$name','$email',$number,$number1,$date)";

		$res = mysqli_query($con,$query);
		if(mysqli_affected_rows($con)){	
			echo "CONTACT ADDED SUCCESSFULL";
		}
		else{	
			echo "Error!"; 
		}
?>