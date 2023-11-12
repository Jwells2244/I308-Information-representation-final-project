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
$query = "SELECT * FROM empLogins WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$sql = "delete from empLogins where username = '$username'";

if ($result){
	$row = mysqli_fetch_assoc($result);
	if ($row){
		if (mysqli_query($conn, $sql))
        		{echo "<h3>Employee with the username: " . $username . " successfully removed from the database</h3>";}
		else
 		       { die('SQL Error: ' . mysqli_error($conn)); }	
	}
	else{
		echo "<h3>Employee with the username: " . $username . " does not exist in the database</h3>";
	}
	mysqli_free_result($result);
}
else{
	echo "<h3>Employee with the username: " . $username . " does not exist in the database</h3>";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Removing an Employee's Login Result</title>
    <style>
        body {
            background-color: #8C706D;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 800px;
            margin: 0;
        }

        form {
            background-color: #F2E2CE;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: 1em;
			margin-bottom: 2em;
        }

        h3 {
            color: #261A1A;
            text-align: center;
			margin-top: 0;
        }

        h6 {
            color: #261A1A;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #261A1A;
            border-radius: 4px;
        }

        button {
    		background-color: #A65C32;
    		border: none;
    		color: white;
    		padding: 10px 28px;
    		text-align: center;
    		text-decoration: none;
   		 	display: inline-block;
    		font-size: 16px;
    		margin-top: 1em;
    		margin-bottom: 2em;
    		border-radius: 8px;
}

		button:hover {
   		 	background-color: #964d28;
}


        input[type="submit"] {
            background-color: #261A1A;
            color: #F2E2CE;
        }

        input[type="submit"]:hover {
            background-color: #402E3A;
        }
    </style>
</head>
<body>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/removeEmp.php">
        <button type="submit">Remove another employee</button>
        </form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
        <button type="submit">Back to homepage</button>
        </form>
</body>
</html>
