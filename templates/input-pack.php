<?php

$num_cards = 0;
$size_submitted = false;
$set = null;
$type = null;

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['btnAction']))
{
	if($_POST['btnAction'] == "Set")
  {
    
  }
}

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
  
<form name="mainForm" action="?command=home" method="post">   
  <div class="col mb-3 mx-3">
    Set ID:
    <input type="number" class="form-control" name="set" required min="226" max="227"/>        
  </div>  
  <div class="row mb-3 mx-3">
    Type:
    <input type="text" class="form-control" name="type" required/> 
  </div> 
  <div class="col mb-3 mx-3">
    Number of Cards:
    <input type="number" class="form-control" name="set" required/>        
  </div> 
  <input type="submit" value="Set" name="btnAction" class="btn btn-dark" 
        title="Choose Set and Type" /> 
</form>

  
  </table>

  <?php if($size_submitted):?>
  <table class="w3-table w3-bordered w3-card-4" style="width:90%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="25%">Card Number</th>
  </tr>
  </thead>
      <form action="?command=home" method="post">
  <?php for ($i = 0; $i < $num_cards; $i++): ?>
  <tr>
    <td>
        <input type="number" name="card_number"/>
    </td> 
  </tr>
  <?php endfor; ?>      
        <input type="submit" value="Update" name="btnAction" class="btn btn-primary" />
      </form>

  
  </table>
  <?php endif;?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>

</html>