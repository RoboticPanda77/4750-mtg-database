<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['btnAction']))
{
	
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
  
<form name="mainForm" action="simpleform.php" method="post">   
  <div class="row mb-3 mx-3">
    Name:
    <input type="text" class="form-control" name="name" required/>        
  </div>  
  <div class="row mb-3 mx-3">
    Year:
    <input type="number" class="form-control" name="year" required min="1" max="4"/> 
  </div>  
  <div class="row mb-3 mx-3">
    Major:
    <input type="text" class="form-control" name="major" required/>
  </div>  
  <input type="submit" value="Add" name="btnAction" class="btn btn-dark" 
        title="insert a friend" />  
  <input type="submit" value="Confirm Update" name="btnAction" class="btn btn-dark" 
        title="update info" />  
  <input type="submit" value="Confirm Delete" name="btnAction" class="btn btn-danger" 
        title="delete info" />  
</form>

  
  </table>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>

</html>