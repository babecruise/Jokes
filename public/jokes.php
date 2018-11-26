<?php 
include "functions.php"; 
$joke = get_joke();
var_dump($joke);
include "templates/header.php";
include "templates/footer.php";

$id = $joke['id'];
$setup = $joke['setup'];
$punchline = $joke['punchline'];


?>

    <h1 class="text-center"><?php echo $setup; ?></h1>
    <h1 class="text-center"> <?php echo $punchline; ?></h1> <br>


<form class="form-inline">
<div class="container d-flex justify-content-center" >
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Rate Joke</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Choose...</option>
    <option value="1" name="one">One</option>
    <option value="2" name="two">Two</option>
    <option value="3" name="three">Three</option>
    <option value="4" name="four">Four</option>
    <option value="5" name="five">Five</option>
  </select>
  <input type="hidden" value=<?php echo $joke['setup']; ?> name="setup" >
  <input type="hidden" value=<?php echo $joke['punchline']; ?> name="punchline" >
  <button type="submit" class="btn btn-primary my-1" name="submit">Rate</button>
  </form> 
 </div>
 