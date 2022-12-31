<?php
   $name = $_POST['name'];
   $semester = $_POST['semester'];
   $branch = $_POST['branch'];
   $roll_no = $_POST['roll_no'];
   $gender = $_POST['gender'];
   $phone_no = $_POST['phone_no'];
   $email = $_POST['email'];
   
   //databse connection

   $conn = new mysqli('localhost','root','','register');
	if($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}  else  {
		$stmt = $conn->prepare("insert into details1(name, roll_no, branch, semester, phone_no, email, gender) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sisiiss", $name, $roll_no, $branch, $semester, $phone_no, $email, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
