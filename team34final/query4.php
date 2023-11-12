<?php
session_start();
if(!isset($_SESSION['userid'])){
        header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
body {
    background-color: #8C706D;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

} 
table{
  border-collapse: collapse;
  width: 70%;
  margin-top: 20px;
}
th, td {
  border: 1px solid #261A1A;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #8C706D;
  color: #F2E2CE;
}
td{
  background-color: #F2E2CE;
}
button{
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
button:hover{
    background-color: #964d28;  
}
.amt-damage{
    font-size: 30px;
    margin: 1.0em 0 0.5em;
}
.most-damage{
    font-size: 30px;
    margin: 1.0em 0 0.5em;
}
.least-damage{
    font-size: 30px;
    margin: 1.0em 0 0.5em;
}
</style>
<body>
<?php
/* Just for a change, we set up login variables */
$server = "db.luddy.indiana.edu";
$user = "i308f23_team34";
$password = "my+sql=i308f23_team34";
$database = "i308f23_team34";
$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) { die("Connection failed: " . mysqli_connect_error());}

$ssn = $_POST['form-ssn'];
$sql = "select concat(c.fName, ' ', c.lName) as customer from customer as c where c.ssn = " . $ssn . ";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['customer'];
mysqli_free_result($result);
$sql = "SELECT concat(c.fName, ' ', c.lName) as customer, IF(SUM(pd.damageLawsuits) IS NULL, 0, SUM(pd.damageLawsuits)) as damageLawsuits
FROM customer as c
JOIN paymentDetails as pd ON c.ssn = pd.ssn
WHERE c.ssn = " . $ssn . ";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo '<p class="amt-damage">Here is the amount of damage lawsuits for ' . $name . '</p><br>'; 
        echo "<table>";
        echo "<tr>
                        <th># of Damage Lawsuits</th>
                </tr>";
                echo "<tr>
                                <td>" . $row['damageLawsuits']."</td>
                        </tr>";
echo "</table>";
mysqli_free_result($result);
$sql = "SELECT concat(c.fName, ' ', c.lName) as customer, IF(SUM(pd.damageLawsuits) IS NULL, 0, SUM(pd.damageLawsuits)) as damageLawsuits FROM customer c JOIN paymentDetails pd ON c.ssn = pd.ssn WHERE pd.damageLawsuits = ( SELECT MAX(damageLawsuits) FROM paymentDetails );";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_free_result($result);
$sql = "SELECT concat(c.fName, ' ', c.lName) as customer, IF(SUM(pd.damageLawsuits) IS NULL, 0, SUM(pd.damageLawsuits)) as damageLawsuits FROM customer c JOIN paymentDetails pd ON c.ssn = pd.ssn WHERE pd.damageLawsuits = ( SELECT MIN(damageLawsuits) FROM paymentDetails );";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_free_result ($result);
mysqli_close($conn);
?>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
    <button type="submit">Back to homepage</button>
</form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/query4input.php">
    <button type="submit">Back to previous page</button>
</form>

</body>
</html>
