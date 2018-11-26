<?php 
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
 }
include "public/functions.php"; 
$joke = get_joke();

include "header.php";
include "footer.php";


$id = $joke['id'];
$setup = $joke['setup'];
$punchline = $joke['punchline'];



  if(isset($_POST['submit'])) {
   
    $conn = mysqli_connect("localhost", "root", "Green200%", "jokes");
    $user_id = 1;
    $joke_id = $joke['id'];
    $rating = $_POST['inlineRadioOptions'];

    $query = "SELECT * FROM review WHERE joke_id = '$joke_id'";
    $result = mysqli_query($conn, $query);


    $num = mysqli_num_rows($result);
   

    if($num == 1){
     
      return false;
    } else {
      $query = "INSERT INTO review (user_id, joke_id, rating) VALUES('$user_id', '$joke_id', '$rating');";
      //var_dump($query);
      $result = mysqli_query($conn, $query);
      //var_dump($result);
    
    }
  }

?>
    <!--<h1>Welcome <?php echo $_SESSION['username'];?></h1>-->
    <h1 class="text-center"><?php echo $setup; ?></h1>
    <h1 class="text-center"> <?php echo $punchline; ?></h1> <br>


      <form class="form-inline" method="POST">
      <div class="container d-flex justify-content-center" >
          <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
      <label class="form-check-label" for="inlineRadio1">1</label>
    </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
          <label class="form-check-label" for="inlineRadio2">2</label>
        </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
              <label class="form-check-label" for="inlineRadio3">3 </label>
            </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4">
                  <label class="form-check-label" for="inlineRadio3">4 </label>
                </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="5">
                      <label class="form-check-label" for="inlineRadio3">5 </label>
                    </div>
        <button type="submit" class="btn btn-primary my-1" name="submit">Rate</button>
        </form> 
      </div>
 