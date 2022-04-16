<body class="large-screen-container" style="background-color: #4a524d">
    <!-- Intro and picture-->
    <div class="pt-4 container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="homepagebody" style="color:white">
                    <h4 class="text-center">Your Card Collection</h4>
                    <p class="text-center">View your hard-earned cards here!</p>
                    <?php if(isset($_SESSION["add_success"])) {
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
    <h4>Search for cards by name or use another sorting option!</h4>
        <div class="pt-4 container-fluid">
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
        <div class="pt-4 container-fluid" style = "color:white">
            <h4>Card List</h4>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="pt-2 table">
                        
                        <th>Card Name</th>
                        <th>Card Artist</th>
                        <th>Set</th>
                        <th>Cards Owned</th>
                        <?php 
                        //print_r($data);
                        //echo $inserted;
                        foreach($data as $cardIndex => $card) {
                            echo "<tr>";
                            echo "<td>" . $card["name"] . "</td>";
                            echo "<td>" . $card["artist"] . "</td>";
                            echo "<td>" . $card["s_name"] . "</td>";
                            echo "<td>" . $card["count"] . "</td>";
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