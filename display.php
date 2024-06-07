<?php 
include ("connection.php");
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Form Data Display</title>
</head>
<body>
<div class="container mt-5">
    <button class="btn btn-primary my-5"><a href="form.php" class="text-light" style="text-decoration:none;">Add User</a></button>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Sr.no</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $dob = $row['dob'];
                    $email = $row['email'];
                    $message = $row['message'];
                    $phonenumber = $row['phonenumber'];

                    echo '<tr> 
                        <th scope="row">' . $id . '</th>
                        <td>' . $fname . '</td>
                        <td>' . $lname . '</td>
                        <td>' . $dob . '</td>
                        <td>' . $email . '</td>
                        <td>' . $message . '</td>
                        <td>' . $phonenumber . '</td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="update.php?updateid=' . $id . '" class="text-light text-decoration-none">Update</a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="delete.php?deleteid=' . $id . '" class="text-light text-decoration-none">Delete</a>
                            </button>
                        </td>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
