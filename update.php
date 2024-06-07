<?php 
include ("connection.php");

// Fetch user data to pre-fill the form
$id = $_GET['updateid'];
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $dob = $_POST['dob'];
   $email = $_POST['email'];
   $message = $_POST['message'];
   $phonenumber = $_POST['phonenumber'];

   if ($fname != "" && $lname != "" && $dob != "" && $email != "" && $message != "" && $phonenumber) {
       $sql = "UPDATE `users` SET fname='$fname', lname='$lname', dob='$dob', email='$email', message='$message', phonenumber='$phonenumber' WHERE id=$id";
       $data = mysqli_query($conn, $sql);

       if ($data) {
           header('Location: display.php');
       } else {
           echo "Update failed";
       }
   } else {
       echo "<script>alert('Please fill out the form');</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Update Form</title>
</head>
<body>
<div class="container mt-5">
        <h2>Responsive Bootstrap Form</h2>
        <form action="#" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="fname" placeholder="Enter first name" value="<?php echo $row['fname']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lname" placeholder="Enter last name" value="<?php echo $row['lname']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $row['dob']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $row['email']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" name="message" placeholder="Enter your message" required><?php echo $row['message']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+91</span>
                    </div>
                    <input type="tel" class="form-control" id="phone" name="phonenumber" placeholder="Enter phone number" value="<?php echo $row['phonenumber']; ?>" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
