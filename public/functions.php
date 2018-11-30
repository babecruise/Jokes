<?php 

  function get_joke() {
            // create curl resource 
            $ch = curl_init();

            // set url 
            curl_setopt($ch, CURLOPT_URL, "https://safe-falls-22549.herokuapp.com/random_joke"); 
    
            //return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    
            // $output contains the output string 
            $output = curl_exec($ch); 
            //var_dump($output);

            $joke = json_decode($output, true);

            $_SESSION['current_joke'] = $joke;
            joke_exist($joke);

            // close curl resource to free up system resources 
            curl_close($ch);  
            return $joke;
            
}

function joke_exist($joke){
$conn = mysqli_connect("localhost", "root", "Green200%", "jokes");
if(!$conn){
  return false;
}

$joke_id = $joke['id'];

$sql = "SELECT id FROM jokestable WHERE id = '$joke_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) < 1){
add_joke($joke);
}
return false;
}


function add_joke($joke){
  $conn = mysqli_connect("localhost", "root", "Green200%", "jokes");
  if(!$conn){
    return false;
  }
  
  //$joke_id = $joke['id'];
$id = $joke['id'];
$setup = $joke['setup'];
$punchline = $joke['punchline'];
  $sql = "INSERT INTO jokestable(id, setup, punchline) VALUES(\"$id\", \"$setup\", \"$punchline\" )";
  return mysqli_query($conn, $sql);
}


function  add_rating(){
  
}
?>