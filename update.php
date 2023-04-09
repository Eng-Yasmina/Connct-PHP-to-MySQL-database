<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cmsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully :)";

//get values from form
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    //if the user checked the checkbox to recieve emails, set the mail status to yes
    $mail_status = isset($_POST['mail_status']) ? 'Yes' : 'No';
    //update record in database
    $sql = "UPDATE usero SET name='$name', email='$email', gender='$gender', mail_status='$mail_status' WHERE id='$id'";
    $retval = mysqli_query($conn, $sql);
    if ($retval) {
        echo '<script>alert("User updated successfully!");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }

    //don't forget to close the connection 
mysqli_close($conn);
//redirect to index page
header("Location: index.php");

?>