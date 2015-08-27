<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<html>
<head></head>
<body>
<h1 style="text-align: center;"><?php echo $_SERVER['SERVER_ADDR']; ?></h1>
<h2 style="text-align: center;">Requested from: <?php echo $_SERVER['REMOTE_ADDR']; ?></h2>

<form action="/create.php">
<input type="submit" value="Create New Record"><br></br>
</form>
<?php
$servername = "192.168.0.26";
$username = "hamish";
$password = "hamish";
$dbname = "workexp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, age FROM WorkExp";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo'  <table> <tr> <th>ID</th><th>Name</th><th>Age</th><th>Actions</th> </tr>';
    while($row = $result->fetch_assoc()) {
	echo'<tr>  <td>' . $row['id'] . '</td><td>' . $row['name'] . '</td><td>' . $row['age'] . '</td><td>' .  "<a href='/update.php?id=" . $row['id'] . "'>update</a> <a href='/delete.php?id=" . $row['id'] . "'>delete</a>". '</td> </tr>';
    }
}
echo '</table>';

$conn->close();
?>

</body>

</html>
