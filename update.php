<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") : 

// Select row where id is $_GET['id']
$conn = connectToDatabase();
$id = (int) $_GET['id'];;
$sql = "SELECT id, name, age FROM WorkExp WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
    echo "0 results";
}
$conn->close();


?>

<!-- FORM GOES HERE -->

<html>
<head></head>
<body>
 <form action="update.php?id=<?php echo $id;?>" method="post">
    <p>
        <label for="firstName"> Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row ['name']?>">
    </p>
    <p>
        <label for="lastName">Age:</label>
        <input type="text" name="age" id="age" value= "<?php echo $row ['age']?>">
	 <input type="submit" value="Update Records">
    </p>

 <?php echo $_GET['id']; ?>

</body></html>


<?php else : 

// Update from form goes here

$user=$_POST['name'];
$age=$_POST['age'];
$id=$_GET['id'];


$conn = connectToDatabase();
$sql = "UPDATE WorkExp SET name='$user', age=$age  WHERE id=$id"  ;
if($conn->query($sql)) {
	header('Location:/');
	exit;

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();

endif;


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
?>


