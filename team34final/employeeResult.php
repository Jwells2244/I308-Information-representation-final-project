<?php
session_start();
if(!isset($_SESSION['userid'])){
        header("Location: login.php");
}
else if ($_SESSION['userid'] != 'joejoe'){
        header("Location: index.php");
}
/* Just for a change, we set up login variables */
$server = "db.luddy.indiana.edu";
$user = "i308f23_team34";
$password = "my+sql=i308f23_team34";
$database = "i308f23_team34";
$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) { die("Connection failed: " . mysqli_connect_error());}
$username = mysqli_real_escape_string($conn, $_POST['form-username']);
$postPassword = mysqli_real_escape_string($conn, $_POST['form-password']);
$encPswd = password_hash($postPassword, PASSWORD_DEFAULT);

$sql = "INSERT INTO empLogins (username, pass)
	VALUES ('$username','$encPswd')";

if (mysqli_query($conn, $sql))
        {echo "Employee with the username: " . $username . " successfully added to the database";}
else
        { die('SQL Error: ' . mysqli_error($conn)); }

mysqli_free_result ($result);
mysqli_close($conn);
?>

<html>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/createEmp.php">
        <button type="submit">Create another employee</button>
        </form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
        <button type="submit">Back to homepage</button>
        </form>
</html>
