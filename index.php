<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<html>
<head></head>
<body>
<h1 style="text-align: center;"><?php echo $_SERVER['SERVER_ADDR']; ?></h1>
<h2 style="text-align: center;">Requested from: <?php echo $_SERVER['REMOTE_ADDR']; ?></h2>
<?php
$servername = "192.168.0.79";
$username = "hamish";
$password = "hamish";
$dbname = "workexp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, age FROM WorkExp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Age: " . $row["age"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>

</html>
