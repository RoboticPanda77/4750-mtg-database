<?php
/* 
$num_cards = 0;
$size_submitted = false;
$set = null;
$type = null;

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['btnAction']))
{
	if($_POST['btnAction'] == "Set")
  {
    
  }
} */

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="author" content="Kevin Moritz Aidan Hesselroth Can Unlu Nathaniel Monahan">
  <meta name="description" content="Homepage for the MTG Card Collector">
  <meta name="keywords" content="define keywords for search engines">

  <title>MTG Database</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet/less" type="text/css" href="styles/styles.less" />
</head>

<body class="large-screen-container" style="background-color: #4a524d">
<div  class="pt-4 container-fluid" >
<form style="color:white" name="mainForm" action="?command=input_pack" method="post">   
  <div class="col mb-3 mx-3">
    Set ID:
    <input type="number" class="form-control" name="set" required min="226" max="227"
        value="<?php if (isset($_POST["set"])) echo $_POST["set"];?>"/>        
  </div>  
  <div class="row mb-3 mx-3">
    Type:
    <input type="text" class="form-control" name="type" required
        value="<?php if (isset($_POST["type"])) echo $_POST["type"];?>"/> 
  </div> 
  <div class="col mb-3 mx-3">
    Number of Cards:
    <input type="number" class="form-control" name="num" required
        value="<?php if (isset($_POST["num"])) echo $_POST["num"];?>"/>        
  </div> 
  <?php if(!isset($_POST["set"])):?>
    <input type="submit" value="Set" name="btnAction" class="btn btn-dark" 
        title="Choose Set and Type" /> 
  <?php endif;?>
  <?php if(isset($_POST["set"])):?>
    <div>Enter card ID numbers:</div>
    <?php for ($i = 0; $i < $_POST["num"]; $i++): ?>
  <tr>
    <td>
        <input type="number" required name="card_number[]"/>
    </td> 
  </tr>
  <?php endfor; ?>
    <input type="submit" value="Upload" name="btnAction" class="btn btn-dark" 
        title="Submit Pack" /> 
  <?php endif;?>

</form>

  
    </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>

</html>