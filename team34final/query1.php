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
.query-top{
    font-size: 35px;
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
$var_id = $_POST['form-id'];
$sql = "SELECT i.iName as iName, IF(SUM(rd.damageLawsuits) IS NULL, 0, SUM(rd.damageLawsuits)) AS
TotalDamageCharges
FROM inventory AS i
LEFT JOIN rent AS r ON i.id = r.itemID
LEFT JOIN rentalTransaction AS rt ON r.transID = rt.id
LEFT JOIN paymentDetails AS rd ON rt.id = rd.transID
where i.id = " . $var_id . ";";
$result = mysqli_query($conn, $sql);
$id = $var_id;
$row = mysqli_fetch_assoc($result);
$title = $row["iName"];
echo '<div class="query-top"> Here is information about the ' . $title . '</div>';
        echo "<table>";
        echo "<tr>
                        <th>Item Name</th>
                        <th>Total Damage Charges</th>
                </tr>";
                echo "<tr>
                                <td>" . $row["iName"]."</td>
                                <td>" . $row["TotalDamageCharges"]."</td>
                        </tr>";
echo "</table>";
mysqli_free_result ($result);
mysqli_close($conn);
?>

<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/index.php">
    <button type="submit">Back to homepage</button>
</form>
<form method="get" action="https://cgi.luddy.indiana.edu/~jonawell/team34final/query1input.php">
    <button type="submit">Back to previous page</button>
</form>
  
</body>
</html>
