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
.handled{
    font-size: 30px;
    text-align: center;
}
.not-handled{
    font-size: 30px;
    text-align: center;
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

$eid = $_POST['form-eid'];

$sql = "select concat(e.fName, ' ', e.lName) as employee from emp as e where e.id = " . $eid . ";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['employee'];
mysqli_free_result ($result);
$sql = "SELECT 
    (COUNT(e.id) > 0 AND COUNT(eP.emp_id) > 0) AS result
FROM 
    emp AS e 
JOIN 
    employeePhn AS eP ON (e.id = eP.emp_id AND eP.type = 'W') 
JOIN 
    manages AS m ON (e.id = m.emp_id) 
JOIN 
    paymentDetails AS pD ON (m.transID = pD.transID AND pD.returnedDeposit = 1)
WHERE 
    e.id = " . $eid . ";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$res = $row['result'];


mysqli_free_result ($result);


if ($res == 1){
$sql = "select concat(e.fName, ' ', e.lName) as employee, eP.phone as WorkNumber
From emp as e join employeePhn as eP on (e.id = eP.emp_id and e.id IN(
select emp_id from employeePhn where type='W')) join manages as m on
(e.id=m.emp_id) join
(select transID from paymentDetails where returnedDeposit = 1) as pD on (m.transID
= pD.transID)
where e.id = " . $eid . ";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo '<p class="handled">' . $name . ' has handled a transaction with a returned deposit and has their work number in the system. </p><br>'; 
        echo "<table>";
        echo "<tr>
			<th>Employee Name</th>
			<th>Work Phone Number</th>
                </tr>";
                echo "<tr>
				<td>" . $row["employee"]."</td>
				<td>" . $row['WorkNumber']."</td>
                        </tr>";
echo "</table>";
mysqli_free_result ($result);
}
else {
	echo '<p class="not-handled">Sorry, ' . $name . ' has not handled a transaction with a returned deposit, and/or does not have their work number in the system. </p><br>';
}
mysqli_close($conn);
?>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
    <button type="submit">Back to homepage</button>
</form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/query5input.php">
    <button type="submit">Back to previous page</button>
</form>

</body>
</html>
