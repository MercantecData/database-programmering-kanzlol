<?php

include 'connectDB.php';

?>
<html>
<body>
<?php 

if(isset($_POST['create'])) {
	$sql = "INSERT INTO user (username, password)
	VALUES ('".$_POST["cUsername"]."' , '".$_POST["cPassword"]."')";
	//echo $sql;
	$con->query($sql);
}

?>
	<form id="create" method="post">
		<input type="text" name="cUsername" placeholder="Username">
		<br><br>
		<input type="password" name="cPassword" placeholder="Password">
		<input type="submit" value="create" name="create">
	<form>
<?php

if(isset($_POST['login'])) {

	$id = $_POST["lUsername"];
	$pw = $_POST["lPassword"];

    $query = "SELECT * FROM user WHERE username = '$id' AND password = '$pw'";
    $res = mysqli_query($con, $query);
    $rows = mysqli_num_rows($res);
    if ($rows==1) 
    {
    	session_start();
        $_SESSION['lUsername'] = $id;
        $_SESSION['lPassword'] = $pw;
        header("Location: loggedIn.php");
    }
    else 
    {
        header("Location: notLoggedIn.php");
    }
}
?>
	<br><br>
	<form id="login" method="post" >
		<input type="text" name="lUsername" placeholder="Username">
		<br><br>
		<input type="password" name="lPassword" placeholder="Password">
		<input type="submit" value="login" name="login">
	<form>
<body>
<html>