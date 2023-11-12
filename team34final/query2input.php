<?php
session_start();
if(!isset($_SESSION['userid'])){
        header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Total Damage Value</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/team34.css">
    <style>
        body {
            background-color: #8C706D;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
        h3{
            color:#261A1A;
        }
        /* styling for submit button - used w3schools as a resource */
        input[type="submit"] {
            background-color: #A65C32;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px; 
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #964d28; 
        }
    </style>
</head>

<body>
    <nav class="navigation-links">
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">Homepage</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query1input.php">Equipment Total Damage Value</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query2input.php">Equipment Availability</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query3input.php">Customer Late Fees</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query4input.php">Customer Damage Lawsuits</a>
        <a href="https://cgi.luddy.indiana.edu/~jonawell/team34final/query5input.php">Emps with work #s and transactions</a>
    </nav>
<h3>Equipment Availability</h3>
        <form action = "query2.php" method ="post">
                        Date: <input type="Date" name="form-date" min="2022-12-14" max="2023-09-19">
                        <br>
        <form action = "query2.php">
                        <input type="submit" value ="Submit">
                        </form>
                        <br><br>
        </form>
        <br>
        <form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
        <button type="submit">Back to homepage</button>
        </form>
   
</body>
</html>
