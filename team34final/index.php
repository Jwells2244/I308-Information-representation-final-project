<?php
session_start();
if(!isset($_SESSION['userid'])){
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joe's Equipment Rental Home</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/team34.css">
    <style>
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
        .team-num{
            font-size: 20px;
            text-align: center;
            padding-bottom: 1em;
            color:#261A1A;
}
        </style>
</head>

<body>
    <nav class="navigation-links">
        <!--Navigation Place Holders for styling-->

        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">Homepage</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query1input.php">Equipment Total Damage Value</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query2input.php">Equipment Availibility</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query3input.php">Customer Late Fees</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query4input.php">Customer Damage Lawsuits</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query5input.php">Emps with work #s and transacation</a>
	    <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/logout.php">Logout</a>
    </nav>
    <main>
        <h1 class="project-title">Joe's Equipment Rental</h1>
	<h1 class="project-title">Welcome, <?php echo $_SESSION['userid'] . "!"; 
					if ($_SESSION['userid'] === 'joejoe'){
						echo '<br><a href="createEmp.php"><button>Create New Employees</button></a>';
					echo '<br><a href="removeEmp.php"><button>Remove an Employee</button></a>';}?></h1>
	<h2 class="team-num">Team 34</h2>
        <!--Image from: Adobe Stock-->
        <img src="images/construction.jpeg" alt="construction">

    </main>

</body>

</html>
