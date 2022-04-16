
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">
    ci {
    text-indent: 15px;
    color: orange;
    font-weight: bold;
    }
    ciA {
    text-indent: 15px;
    color: orange;
    font-weight: bold;
    }
    td {
      padding: 0px;
    }
  </style>
</head>
<body class="large-screen-container" style="background-color: #4a524d">
  <!-- Intro and picture-->
          <h4 class="text-center" style="color:orange;font-weight:bold;font-size:35px;">Welcome to your MTG Wishlist <?php echo $_SESSION["username"]; ?></h4>
          <div class="row">
            <p></p>
          </div>
          <div class="row">
            <p></p>
          </div>
          <form name="viewCards" method="post">
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:30px">Optional Filters:</p>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;">Set Rarity:</p>
                </div>
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;">Set Mana Cost Range:</p>
                </div>
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;">Set Price Range:</p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <select name="rarities" style="width:110px;">
                    <option disabled selected value> </option>
                    <option name="common">Common</option>
                    <option name="uncommon">Uncommon</option>
                    <option name="rare">Rare</option>
                    <option name="mythic">Mythic</option>
                  </select>
                </div>
                <div class="col-sm">
                <table>
                  <tr>
                    <td style="color:orange;">Minimum Cost:</td>
                    <td style="color:orange">Maximum Cost:</td>
                  </tr>
                  <tr>
                    <td style="padding-right:20px"><input type="number" class="form-control" name="minMana" style="width:110px"/></td>
                    <td><input type="number" class="form-control" name="maxMana" style="width:110px"/></td>
                  </tr>
                </table>
                </div>
                <div class="col-sm">
                <table>
                  <tr>
                    <td style="color:orange">Minimum Price </td>
                    <td style="color:orange">Maximum Price </td>
                  </tr>
                  <tr>
                    <td style="padding-left:auto;padding-right:20px"><input type="number" step="0.01"  class="form-control" name="minPrice" style="width:110px"/></td>
                    <td><input type="number" step="0.01" class="form-control" name="maxPrice" style="width:110px"/></td>
                  </tr>
                </table>
                </div>
              </div>
              <div class="row">
                <input class="btn btn-info" type="submit" name="viewAction" value="View Wishlist" required style="width:200px"/>
              </div>
            </div>
          </form>
          <p><p>
          <form name="addCard" method="post">
            <div class="container">
              <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:30px">Add a Card to your Wishlist:</p>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;margin-left:auto">Enter Card Number:</p>
                </div>
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;margin-left:auto">Enter Set Number:</p>
                </div>
                <div class="col-sm">

                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                    <input type="number" class="form-control" name="cardNumber" required style="width:170px"/>
                </div>
                <div class="col-sm">
                  <input type="number" class="form-control" name="setNumber" required style="width:160px"/>
                </div>
                <div class="col-sm">
                  <input class="btn btn-success" type="submit" name="addCardAction" value="Add Card" required style="width:200px"/>
                </div>
              </div>
            </div>
          </form>
          <p></p>
          <form name="deleteCard" method="post">
            <div class="container">
              <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:30px">Remove a Card from your Wishlist:</p>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;">Enter Card Number:</p>
                </div>
                <div class="col-sm">
                  <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:18px;">Enter Set Number:</p>
                </div>
                <div class="col-sm">

                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <input type="number" class="form-control" name="cardNumber2" required style="width:170px"/>
                </div>
                <div class="col-sm">
                  <input type="number" class="form-control" name="setNumber2" required style="width:170px"/>
                </div>
                <div class="col-sm">
                  <input class="btn btn-danger" type="submit" name="removeCardAction" value="Remove Card" required style="width:200px"/>
                </div>
              </div>
            </div>
          </form>
          <p></p>
          <div class="container">
            <?php
              if (isset($_POST["addCardAction"])){
                $this->db->query("insert into card_on_wishlist values(" . $_SESSION["id"] . ", " . $_POST["cardNumber"] . ", " . $_POST["setNumber"] . ")");
              }
              if (isset($_POST["removeCardAction"])){
                $this->db->query("delete from card_on_wishlist where u_id=" . $_SESSION["id"] . " and cn=" . $_POST["cardNumber2"] . " and s_id=" . $_POST["setNumber2"] . ";");
              }
              if(isset($_POST["viewAction"]))
              {
                if (isset($_POST["rarities"]) or isset($_POST["minMana"]) or isset($_POST["maxMana"])){
                  $conds = "";
                  if (isset($_POST["rarities"])){
                    $conds = "and rarity=" . "'" . $_POST["rarities"] . "' " . $conds;
                  }
                  if ($_POST["minMana"] != ''){
                    $conds = "and manaValue>="  . $_POST["minMana"] . " " . $conds;
                  }
                  if ($_POST["maxMana"]!= ''){
                    $conds = "and manaValue<=" . $_POST["maxMana"] . " " . $conds;
                  }
                  if ($_POST["minPrice"] != ''){
                    $conds = "and price>="  . $_POST["minPrice"] . " " . $conds;
                  }
                  if ($_POST["maxPrice"]!= ''){
                    $conds = "and price<=" . $_POST["maxPrice"] . " " . $conds;
                  }
                  $conds = trim($conds) . ";";
                  $data = $this->db->query("select * from (cards c JOIN card_on_wishlist cw ON c.cn=cw.cn AND c.setCode=cw.s_id) where u_id =" . $_SESSION["id"] . " " . $conds); 
                }
                else{
                  $data = $this->db->query("select * from card_on_wishlist where u_id = ?;", "i", $_SESSION["id"]);
                }
                $leng = count($data);
                if ($leng==0){
                    echo "<html>";
                    echo "<p style='color:orange;margin-left:525px;font-size:30px;font-weight:bold'>Add some cards to your wishlist!<p>";
                    echo "</html>";
                }
                else{
                    $notPrint = array('name', 'rarity', 'mtgjsonV4Id', 'multiverseId');
                    $convToDisp = array('cn'=>'Card Number', 
                                        'artist'=>'Artist', 
                                        'cardindex'=>'Card Index',
                                        'colors'=>'Colors', 
                                        'convertedManaCost'=>'Converted Mana Cost',
                                        'flavor_text'=> 'Flavor Text',
                                        'loyalty'=>'Loyalty',
                                        'manaCost'=>'Mana Cost',
                                        'manaValue'=>'Mana Value',
                                        'mtgjsonV4Id'=>'MTGJSON V4ID',
                                        'multiverseId'=>'Multiverse ID',
                                        'power'=>'Power',
                                        'price'=>'Price',
                                        'rules_text'=>'Rules Text',
                                        'setCode'=>'Set Code',
                                        'subtypes'=>'Subtypes',
                                        'toughness'=>'Toughness',
                                        'types'=>'Types');
                    $rarToCol = array('common'=> 'black', 'uncommon'=> 'silver', 'rare'=>'gold', 'mythic'=>'#CD7F32');
                    for($c=0; $c < $leng; $c++){
                        $s_data = $this->db->query("select * from cards where cn = ? AND setCode = ?", "ii", $data[$c]['cn'], $data[$c]['s_id']);
                        $c1 = $c + 1;
                        $cName = $s_data[0]['name'];
                        $cCol = $rarToCol[$s_data[0]['rarity']];
                        echo "<html>";
                        echo "<h1 style='color:$cCol'> $cName \n \n </h1>";
                        echo "</html>";
                        foreach($s_data[0] as $cardK => $cardV){
                          if (!in_array($cardK, $notPrint)){
                            $disp = $convToDisp[$cardK];
                            echo "<html>";
                            echo "<head>";
                            echo "</head>";
                            echo "<div class='row'>";
                            echo "<ci> $disp: $cardV \n </ci>";
                            echo "</div>";
                            echo "</html>";
                          }
                        }
                        echo nl2br("\n");   
                    }
                }
              }
            ?>
          </div> 
  <!--Body paragraphs-->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>
</html>
