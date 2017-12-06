<html>
<body>
	<header><h1>Create user</h1></header>
<?php 

include 'connectDB.php';

if(isset($_POST['create'])) {
	$hash = password_hash($_POST["cPassword"], PASSWORD_DEFAULT);	
	$sql = "INSERT INTO user (username, password)
	VALUES ('".$_POST["cUsername"]."' , '".$hash."')";

	$query = "SELECT * FROM user WHERE username = '".$_POST["cUsername"]."'";
	$res = mysqli_query($con, $query);
	$rows = mysqli_num_rows($res);
	if ($rows>=1) 
	{	
		$message = "User exists, please choose another";
		echo "<script type='text/javascript'>alert('$message');</script>";
	} 
	else
	{
		$con->query($sql);
		header("Location: login.php");
	}
}

?>
	<br><br>
	<form id="create" method="post">
		<input type="text" name="cUsername" placeholder="Username">

		<br><br>
		<input type="password" name="cPassword" placeholder="Password">
		<input type="submit" value="create" name="create">
	<form>
</html>