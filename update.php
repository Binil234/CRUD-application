<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from `mycrud` where id=$id";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    
    $sql = "update `mycrud` set id='$id',name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";

    $result = mysqli_query($con, $sql);
    if($result){
        //header('location:display.php');
        //echo "updated successfully";  
        header('location:display.php');
    } else {
        die("Query failed: " . mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"placeholder="Enter your name" name = "name" autocomplete="off" value=<?php echo $name;?>>
                
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control"placeholder="Enter your email" name = "email" autocomplete="off"value=<?php echo $email;?>>
                
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="mobile" class="form-control"placeholder="Enter your contact no" name = "mobile" autocomplete="off"value=<?php echo $mobile;?>>
                
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control"placeholder="Enter your password" name = "password" autocomplete="off"value=<?php echo $password;?>>
                
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>