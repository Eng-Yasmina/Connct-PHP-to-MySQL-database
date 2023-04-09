<?php
//I use MAMP :)
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


//create table
$sql = "CREATE TABLE IF NOT EXISTS usero(
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gender VARCHAR(25) NOT NULL,
    mail_status VARCHAR(25) NOT NULL)";

$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('Error! could not create table: ' . mysqli_error($conn));
    }

// echo "Connected successfully :)";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Yasmina Database</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style> 
        .crud-actions { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
        } 
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="col-sm-8"><h2>Users Details</h2></div>
            <div class="col-sm-4">
                <a href="form.php" class="btn btn-success">Add New User</a> 
            </div>
        </div>
 
        <div class="container mt-5">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Mail Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM usero ORDER BY id ASC'; // to order by id ASC first so the oldest record is returned first 
                    $result = mysqli_query($conn, $sql);
                    // echo "Connected successfully :)";
                    $count = 1;
                    //fetch the database results
                    while ($row = mysqli_fetch_assoc($result)) {
                        //print_r($row);
                        //if condition for the mail status
                        $mail_status = $row["mail_status"] == 'Yes' ? "Yes" : "No";
                        echo '<tr>';
                            echo '<th scope="row">' . $count . '</th>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['gender'] . '</td>';
                            echo '<td>' . $mail_status . '</td>';
                            //------------------------------------------------
                            //----------------BONUS----------------
                            //------------------------------------------------
                            //View record
                            echo "<td class='crud-actions'>
                            <a href='view.php?id=" . $row["id"] . "'>
                                <span class='glyphicon glyphicon-eye-open'></span>
                            </a>";
                            //------------------------------------------------
                            //----------------BONUS----------------
                            //------------------------------------------------
                            //Edit record
                            echo "<a href='edit.php?id=" . $row["id"] . "'>
                                <span class='glyphicon glyphicon-pencil'></span>
                                </a>";
                            //------------------------------------------------
                            //----------------BONUS----------------
                            //------------------------------------------------
                            //Delete record
                            echo "<a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>
                            <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            </td>";
                            echo '</tr>';
                            $count++;
                        } 
                        mysqli_close($conn);?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi+UwoJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>

