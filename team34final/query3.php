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
.error-handling{
    font-size: 30px;
    margin: 1.0em 0 0.5em;
}
.total-fees{
    font-size: 30px;
    margin: 1.0em 0 0.5em;
}
.good-cust{
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

$userSSN = $_POST['form-ssn'];

$sql = "SELECT IF(SUM(pD.lateFee) IS NULL, 0, SUM(pD.damageLawsuits)) as TotalLateFees, c.fName as fName, c.lName as lName
	FROM paymentDetails as pD
	JOIN rentalTransaction as rT ON pD.transID = rT.id
	JOIN customer as c on pD.ssn = c.ssn
	where c.ssn = " . $userSSN . ";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$userSSN = substr($userSSN, 5);
$fName = $row["fName"];
$lName = $row["lName"];
if ($fName == NULL){
	echo '<p class="error-handling"> Sorry, the entered SSN, ***-**-' . $userSSN . ', does not exist in the database. Please try again ' . '</p><br>';/*here*/
	$exists = false;
}
else{
	$exists = true;
echo '<p class="total-fees"> Here are is the information for the total late fees of ' . $fName .' '. $lName . ', ***-**-' . $userSSN . ' </p><br>' ;/*here*/
        echo "<table>";
        echo "<tr>
                        <th>Late Fees</th>
                </tr>";
                echo "<tr>
                                <td>" . $row["TotalLateFees"]."</td>
                        </tr>";
echo "</table>";
}
if ($row["TotalLateFees"] == "0" && $exists){
	echo '<p class="good-cust"> Congrats, ' . $fName . ' '  . $lName . ' has accumulated 0 dollars in Late Fees! What a great Customer! </p><br>';/*here*/
}
mysqli_free_result ($result);
mysqli_close($conn);
?>

<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
    <button type="submit">Back to homepage</button>
</form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/query3input.php">
    <button type="submit">Back to previous page</button>
</form>
</body>
</html>
