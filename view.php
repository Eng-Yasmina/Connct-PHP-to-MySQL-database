<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View User</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center my-5">View User</h1>
            <?php if (isset($_GET['id'])) {
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
                //get user data from database
                $id = $_GET['id'];
                $sql = "SELECT * FROM usero WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) { $row = mysqli_fetch_assoc($result);
                echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                echo "<p><strong>Gender:</strong> " . $row["gender"] . "</p>";
                echo "<p><strong>Mail Status:</strong> " . ($row["mail_status"] ? "Yes" : "No") . "</p>";
                } else {
                    echo "<p>User not found.</p>";
                    }
                //close connection
                mysqli_close($conn); 
                } else { 
                    echo "<p>No user selected.</p>"; 
                    }
                    ?> 
                <div class="text-center">
                    <a href="index.php" class="btn btn-primary">Back to User List</a>
                </div>
            </div>
        </body>
        </html>