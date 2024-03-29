<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Social Media Aggregator">
        <meta name="author" content="Team">
        <title> SMB </title>
        <link rel="stylesheet" href="./views/templates/css/style.css">
    </head>
    <body >
    <script src="./views/templates/scripts/photosscripts.js"></script>
        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./views/templates/img/logo.jpeg" alt="Logo">
                </div>
                <nav>
                    <ul>
                        <li><a href="./?load=accounts">Accounts</a></li>
                        <li class="current"><a href="./?load=photos">Photos</a></li>
                        <li><a href="./?load=logout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="gallery" id="gallery">
           <h1> Select a platform to load your photos</h1>
        </div>
    <!-- Side navigation -->
        <div class="sidenav">
            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Show Photos</button>
                    <div class="dropdown-content" id="dropdown-content-1">
                        <button class="dropbtn" onclick="getUnsplashPhotos()">Unsplash</button>
                        <button class="dropbtn" onclick="getTumblrPhotos()">Tumblr</button>
                    </div>
                </div>
            </div>

            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn" onclick="window.location='./?load=photos/collage';">Create collage</button>
                </div>
            </div>
            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Filter</button>
                    <div class="dropdown-content">

                        <div class="likes" onchange="getPhotos();">
                            <p> Number of likes:</p>
                            <ul>
                                <li>
                                    <input type="checkbox" id="cb8" name="cb8">
                                    <label for="cb8">0-500 likes</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb10" name="cb10">
                                    <label for="cb10">500-max likes</label>
                                </li>
                            </ul>
                        </div>

                        <div class="share" onchange="getPhotos();">
                            <p> Number of shares:</p>
                            <ul>
                                <li>
                                    <input type="checkbox" id="cb11" name="cb11">
                                    <label for="cb11">0-200 shares</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb13" name="cb13">
                                    <label for="cb13">200-max shares</label>
                                </li>
                            </ul>
                        </div>

                        <div class="Date" onchange="getPhotos();">
                            <p> Post date:</p>
                            <ul>
                                <li>
                                    <input type="checkbox" id="cb14" name="cb14">
                                    <label for="cb14">Last month</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb15" name="cb15">
                                    <label for="cb15">Last year</label>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>