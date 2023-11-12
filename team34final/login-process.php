<?php
session_start();
$server = "db.luddy.indiana.edu";
$user = "i308f23_team34";
$password = "my+sql=i308f23_team34";
$database = "i308f23_team34";
$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) { die("Connection failed: " . mysqli_connect_error());}
$username = mysqli_real_escape_string($conn, $_POST['form-username']);
$postPassword = mysqli_real_escape_string($conn, $_POST['form-password']);
$sql = "select pass from empLogins where username = '$username';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$encPswd = $row['pass'];
if (password_verify($postPassword, $encPswd)){
	$_SESSION['userid'] = $username;
	mysqli_free_result($result);
	mysqli_close($conn);
	header("Location: index.php");
	exit();
}
else{
	mysqli_free_result ($result);
	mysqli_close($conn);
	header("Location: login.php");
	exit();
}
?>
