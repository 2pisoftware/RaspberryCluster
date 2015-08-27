
<html>
<head></head>
<body>
<p>hello</p>

<?php
echo "test page load";
var_dump ($_POST [name]);

$servername = "192.168.0.26";
$username = "hamish";
$password = "hamish";
$dbname = "workexp";

$conn = new mysql($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE WorkExp SET name=$_POST[name]";
//$result = $conn->query($sql);

if(mysql_query($sql, $conn)){
    echo "Records Updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();


?>

</body>
</html>



