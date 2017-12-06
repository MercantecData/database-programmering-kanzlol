<html>
<body>
	<header><h1>Log in</h1></header>
<?php

include 'connectDB.php';

if(isset($_POST['login'])) {

	$id = $_POST["lUsername"];
	$pw = $_POST["lPassword"];

    $query = "SELECT * FROM user WHERE username = '$id'";
    $res = mysqli_query($con, $query);
    $row = $res->fetch_assoc();

    $dbPassword = $row['password'];

    if($dbUsername == $id and password_verify($pw, $dbPassword)) {
    	session_start();
    	$_SESSION['lUsername'] = $id;
        $_SESSION[$pw] = $dbPassword;
        header("Location: loggedIn.php");
    }
    else {
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
		<br><p style="font-size: 12px; width: 600px; height: 5px;">Har du ikke en bruger? Lav en <a style="text-decoration: none;" href="create.php">her</a>
	<form>
<body>
<html>