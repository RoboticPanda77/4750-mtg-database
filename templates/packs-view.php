<?php

$list_of_packs = $data;

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
  <div style="color:white" class="h1"><?php echo $_SESSION["username"]?>'s Packs</div>
  <table class="w3-table w3-bordered w3-card-4" style="width:90%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="20%">Pack Number</th>        
    <th width="20%">Set Name</th>        
    <th width="20%">Type</th>         
    <th width="20%">Value</th> 
    <th width="20%">View</th>
  </tr>
  </thead>
  <?php foreach ($list_of_packs as $pack): 
    $val = $pack['p_num'];
  ?>
  <tr style="color:white">
    <td><?php echo $pack['p_num']; ?></td>
    <td><?php echo $pack['s_name']; ?></td>
    <td><?php echo $pack['p_type']; ?></td> 
    <td><?php echo $pack['val_d']; ?></td> 
    <td><a href="?command=pack&packnum= <?php echo $val ?>">View pack</a></td>
  </tr>
  <?php endforeach; ?>

  
  </table>
  <div class="h4"><a href="?command=input_pack" class="link-light">Add a Pack</a></div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>

</html>