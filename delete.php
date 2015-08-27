<?php

function connectToDatabase() {
$servername = "192.168.0.26";
$username = "hamish";
$password = "hamish";
$dbname = "workexp";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
return $conn;
}

$id=$_GET['id'];


$conn = connectToDatabase();
$sql = "DELETE FROM  WorkExp WHERE id=$id;"  ;
if($conn->query($sql)) {

 header('Location:/index.php');
exit;

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();




?>



