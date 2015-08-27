<html>
<head></head>
<body>
<p>hello</p>

<?php

$servername = "192.168.0.26";
$username = "hamish";
$password = "hamish";
$dbname = "workexp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO WorkExp (name, age) VALUES ('" . $_POST['name'] . "', " . $_POST['age'] . ")";
if($conn->query($sql)) {
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();

header('Location:/create.html');

exit;

?>

</body>
</html>



