<?php
session_start();
if(!isset($_SESSION['userid'])){
        header("Location: login.php");
}
else if ($_SESSION['userid'] != 'joejoe'){
	header("Location: index.php");
}
?>
<DOCTYPE html>
<html>
<body>
        <h3>Creating a new employee login</h3>
        <h6>Input a username and a password. Username is any character between 5 and 10 characters long, and password must be anything between 8 and 15 in length</h6>
	<form action = "employeeResult.php" method ="post">
		Username: <input type="text" name = "form-username" required maxlength=10 minlength=5 pattern="^[a-zA-Z]{5,10}$">
		<br>
		Password: <input type="password" name = "form-password" required maxlength=15 minlength=8 pattern="^.{8,15}$">
	</select>
<form action = "employeeResult.php">
                <input type="submit" value ="Submit">
                </form>
                <br><br>
    </form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
        <button type="submit">Back to homepage</button>
        </form>
</body>
</html>
