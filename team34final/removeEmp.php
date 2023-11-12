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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Removing an Employee's Login</title>
    <style>
        body {
            background-color: #8C706D;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #F2E2CE;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: auto;
        }

        h3 {
            color: #261A1A;
            text-align: center;
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
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
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
        <h3>Removing an employees login</h3>
        <h6>Input an employee's username to remove</h6>
	<form action = "removeResult.php" method ="post">
		Username: <input type="text" name = "form-username" required maxlength=10 minlength=5 pattern="^[a-zA-Z]{5,10}$">
		<br>
	</select>
<form action = "removeResult.php">
                <input type="submit" value ="Submit">
                </form>
                <br><br>
    </form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
        <button type="submit">Back to homepage</button>
        </form>


</body>
</html>
