<?php

$cards_in_pack = $data;

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
<div><?php echo $_SESSION['username']; ?>'s <?php echo $pack['p_type']?> Pack <?php echo $pack['p_num']; ?></div>
  <table class="w3-table w3-bordered w3-card-4" style="width:90%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th>Card</th>        
    <th>Value</th>
  </tr>
  </thead>
  <?php foreach ($cards_in_pack as $card): ?>
  <tr style="color:white">
    <td><?php echo $card['name']; ?></td>
    <td><?php echo $card['price']; ?></td>
  </tr>
  <?php endforeach; ?>

  
  </table>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>

</html>