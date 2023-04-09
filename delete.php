<?php $id = $_GET['id'];
// I will first retrieves the user's ID from the URL parameter. It then connects to the database and deletes
//the record with the corresponding ID. 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cmsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
// echo "Connected successfully :)";

$sql = "DELETE FROM usero WHERE id=$id";
$retval = mysqli_query($conn, $sql);
if ($retval) {
    echo "Record deleted successfully";
    } else {
        die('Error! could not create table: ' . mysqli_error($conn));
    }
mysqli_close($conn);
header('Location: index.php');
?>