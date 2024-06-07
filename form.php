<?php
include ("connection.php") 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>form</title>
</head>
<body>
<div class="container mt-5">
        <h2>Responsive Bootstrap Form</h2>
        <form action="#" method="POST"  >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="fname" placeholder="Enter first name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lname" placeholder="Enter last name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control"  name="dob" id="dob" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"  name="message" placeholder="Enter your message" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+91</span>
                    </div>
                    <input type="tel" class="form-control" id="phone"  name="phonenumber" placeholder="Enter phone number" required>
                </div>
            <!-- </div>
            <div class="form-group">
                <label for="fileUpload">File Upload</label>
                <input type="file" class="form-control-file" name="file" id="fileUpload" required>
            </div> -->
            <!-- <div class="form-group">
                <div class="g-recaptcha"  name="captcha" data-sitekey="your-site-key"></div>
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $id=$_POST['id'];
   $fname =$_POST['fname'];
   $lname =$_POST['lname'];
   $dob =$_POST['dob'];
   $email =$_POST['email'];
   $message =$_POST['message'];
   $phonenumber =$_POST['phonenumber'];
//    $file =$_POST['file'];



if($fname !="" &&  $lname !="" && $dob !="" && $email !="" && $message !="" && $phonenumber){
   
   $sql=" insert into users values('$id','$fname','$lname','$dob','$email','$message','$phonenumber')";
   $data=mysqli_query($conn,$sql);
   if($data){
    header('location:display.php');
   }
   else{
    echo "failde";
   }
}
else{
    echo "<script>alert('please fil form');</script>";
}
}


?>