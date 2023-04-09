<?php $id = $_GET['id'];
// here i'll retrieve the user's information from the database using their id
//When the user submits the form, the data is sent to `update.php` for processing
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
    
$sql = "SELECT * FROM usero WHERE id=$id";
$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $email = $row["email"];
        $gender = $row["gender"];
        //if the user edited the checkbox to not recieve emails, set the mail status to no
    $mail_status = isset($_POST['mail_status']) ? 'Yes' : 'No';
        }
    mysqli_close($conn);
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Edit User</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand btn btn-primary" href="index.php">Home</a>
            </nav>
            <div class="container">
                <h2>Edit User</h2>
                <form action="update.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="name">Name:</label>
                        
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled>Select Gender</option>
                            <option value="Male" <?php if ($gender == 'Male') echo 'selected="selected"';?>>Male</option>
                            <option value="Female" <?php if ($gender == 'Female') echo 'selected="selected"'; ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mail_status" name="mail_status">
                        <label class="form-check-label" for="mail_status"> Receive E-Mails from us </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </body>
    </html>