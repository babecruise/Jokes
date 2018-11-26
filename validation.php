<?php 
session_start();
//establish connection with the database
$conn = mysqli_connect("localhost", "root", "Green200%", "jokes");

$name = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM usertable WHERE username = '$name' && password = '$password'";
var_dump($query);


$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);
if($num == 1){
    
    $_SESSION["id"] = $user_id;
    $_SESSION["username"] = $name;
    $_SESSION["password"] = $password;
    echo $name . " ". "Logged in succesfully <br>";
    echo "Your password is". " ". $password. " ". "Don't share it with any one";
    header("location: jokes.php");
} else {
   
   echo "Run away, you are not a user";
   header("location: login.php");
}

//var_dump($_SESSION);

?>