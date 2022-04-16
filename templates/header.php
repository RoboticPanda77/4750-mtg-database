<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
    Bootstrap is designed to be responsive to mobile.
    Mobile-first styles are part of the core framework.
     
    width=device-width sets the width of the page to follow the screen-width
    initial-scale=1 sets the initial zoom level when the page is first loaded   
    -->

    <meta name="author" content="kmm9sz">
    <meta name="description" content="Welcome page for MTG-DB">

    <title>Welcome</title>

    <!-- 3. link bootstrap -->
    <!-- if you choose to use CDN for CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- you may also use W3's formats -->
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

    <!-- 
    Use a link tag to link an external resource.
    A rel (relationship) specifies relationship between the current document and the linked resource. 
    -->

    <!-- If you choose to use a favicon, specify the destination of the resource in href -->
    <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png">

    <!-- if you choose to download bootstrap and host it locally -->
    <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> -->

    <!-- include your CSS -->
    <!-- <link rel="stylesheet" href="custom.css" />  -->
    <link rel="stylesheet/less" type="text/css" href="styles/styles.less" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark px-3 bg-dark">
        <a class="navbar-brand" href="?command=home">Magic The Gathering Database</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- See below for how you should be handling HTML links to pass to the controller -->
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
                <a class="nav-link active" href="?command=welcome">Home</a>
            </li>
            <li class="nav-item">
                <a class = "nav-link active" href="?command=collection">Card Collection</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?command=friends">Friends List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?command=packs">Your Packs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?command=upload_card">Add A Card</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?command=wish">Wishlist</a>
            </li>
        </ul>
    </nav>
</body>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/less@4"></script>

</html>