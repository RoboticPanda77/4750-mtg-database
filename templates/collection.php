<body class="large-screen-container" style="background-color: #4a524d">
    <!-- Intro and picture-->
    <div class="pt-4 container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="homepagebody" style="color:white">
                    <h4 class="text-center">Your Card Collection</h4>
                    <p class="text-center">View your hard-earned cards here!</p>
                    <?php if (isset($_SESSION["add_success"])) {
                        unset($_SESSION["add_success"]);
                        echo "<h3 class = \"text-center\" style = \"color: red\">Card Successfully Added!</h3>";
                    } ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--Body paragraphs-->
    <div class="pt-5 text-center" style="color:white">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <ul class="list-group">

                    <?php if (isset($_SESSION["display_full_info"])) :
                        unset($_SESSION["display_full_info"]); ?>
                        <li class="list-group-item">
                            <h2 class="text-center">
                                <?php echo "Card Name: " . $card_to_display[0]["name"];
                                echo "<br>"; ?>
                            </h2>
                            <h3 class="text-center">
                                <?php echo "Set: " . $card_to_display[0]["s_name"];  ?>
                            </h3>


                        </li>
                        <?php
                        $card = $card_to_display[0];
                        foreach ($card as $cardItem => $val) :
                            switch ($cardItem):
                                case "artist": ?>
                                    <li class="list-group-item">
                                        <a href="?command=artist&aname=<?php echo $val ?>">
                                            <?php echo "Artist Name" . ": " . $val; ?>
                                        </a>
                                    </li>
                                <?php break;
                                case "colors": ?>
                                    <li class="list-group-item">
                                        <?php echo "Color" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "convertedManaCost": ?>
                                    <li class="list-group-item">
                                        <?php echo "Converted Mana Cost" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "flavor_text": ?>
                                    <li class="list-group-item">
                                        <?php echo "Flavor Text" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "loyalty": ?>
                                    <li class="list-group-item">
                                        <?php echo "Loyalty" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "manaCost": ?>
                                    <li class="list-group-item">
                                        <?php echo "Mana Cost" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "manaValue": ?>
                                    <li class="list-group-item">
                                        <?php echo "Mana Value" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "power": ?>
                                    <li class="list-group-item">
                                        <?php echo "Power" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "price": ?>
                                    <li class="list-group-item">
                                        <?php echo "Price" . ": $" . $val; ?>
                                    </li>
                                <?php break;
                                case "rarity": ?>
                                    <li class="list-group-item">
                                        <?php echo "Rarity" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "rules_text": ?>
                                    <li class="list-group-item">
                                        <?php echo "Rules Text" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "subtypes": ?>
                                    <li class="list-group-item">
                                        <?php echo "Subtypes" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "toughness": ?>
                                    <li class="list-group-item">
                                        <?php echo "Toughness" . ": " . $val; ?>
                                    </li>
                                <?php break;
                                case "types": ?>
                                    <li class="list-group-item">
                                        <?php echo "Types" . ": " . $val; ?>
                                    </li>

                            <?php break;
                                default:

                            endswitch; ?>



                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="pt-4 container-fluid">
            <h5>Search for cards by name or use another sorting option!</h5>
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-4 justify-content-center text-center">
                    <div class="input-group">
                        <form action="?command=collection" method="post" class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control rounded" name="searchforcard" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary">Search</button>
                            </div>
                        </form>
                        <a class="btn btn-danger mx-2" href="?command=collection" role="button">Clear Search Bar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4 container-fluid" style="color:white">
            <h4>Card List</h4>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="pt-2 table"  style="background-color:gray">

                        <th>Card Name</th>
                        <th>Card Artist</th>
                        <th>Set</th>
                        <th>Cards Owned</th>
                        <th>Full Info</th>
                        <?php
                        //print_r($data);
                        //echo $inserted;
                        //print_r($card_to_display);
                        foreach ($data as $cardIndex => $card) {
                            echo "<tr>";
                            echo "<td>" . $card["name"] . "</td>";
                            echo "<td>" . $card["artist"] . "</td>";
                            echo "<td>" . $card["s_name"] . "</td>";
                            echo "<td>" . $card["count"] . "</td>";
                            echo "<td><form action = \"?command=collection&cn=" . $card["cn"] . "&s_id=" .
                                $card["s_id"] . "\" method=\"post\"><button type=\"submit\" class=\"btn btn-outline-primary\">Click here</button></form></td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </div>
            </div>

        </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
</body>