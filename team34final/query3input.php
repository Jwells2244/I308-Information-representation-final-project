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
    <title>Customer Late Fees</title>
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

    <h3>Customer Late Fees</h3>

    <form action="query3.php" method="post">
        <select name="form-ssn">
            <?php
                $conn = mysqli_connect("db.luddy.indiana.edu", "i308f23_team34", "my+sql=i308f23_team34", "i308f23_team34");
                if (!$conn) { die("Connection failed: " . mysqli_connect_error());}
                $sql = "SELECT CONCAT(c.fName, ' ', c.lName) as name, c.ssn as ssn FROM customer as c order by name;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['ssn'] . "'>" . $row['name'] . "</option>";
                }
                mysqli_free_result($result);
                mysqli_close($conn);
            ?>
        </select>

        <br>
        
        <input type="submit" value="Submit">
        <br><br>
    </form>

    <form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
        <button type="submit">Back to homepage</button>
    </form>
</body>
	</html>
