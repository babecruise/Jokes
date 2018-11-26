<?php 
//session_start();
//header("location:login.php");

//establish connection with the database
$conn = mysqli_connect("localhost", "root", "Green200%", "jokes");
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$username'";
$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "User name Already Taken";
} else {
    $reg = "INSERT INTO users(name, email , password) VALUES ('$name' ,'$username', '$password')";
    mysqli_query($conn, $reg);
    echo "Registration successful";
}

?>