<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Social Media Aggregator">
    <meta name="author" content="Team">
    <title> SMB </title>
    <link rel="stylesheet" href="./views/templates/css/style.css">
    <link rel="stylesheet" href="./views/templates/css/edit.css">
</head>
<body>
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
<div class="sidenav">
    <div class="sidebtn">
        <div class="dropdown">
            <a href="./?load=photos"><button class="dropbtn">Back</button></a>
        </div>
    </div>
    <div class="sidebtn">
        <div class="dropdown">
            <a><button class="dropbtn" onclick="seeDetails()">See Details</button></a>
        </div>
    </div>
    <div class="sidebtn">
        <div class="dropdown">
            <a><button class="dropbtn" onclick="seeEditor()">Edit</button></a>
        </div>
    </div>
</div>

<div class="box">
    <div class="result">
<!--        <img src="./img/art.jpg" >-->
        <figure class="image-container">
        <?php echo "<img id=\"chosen-image\" crossorigin=\"anonymous\" src=\"" . $link . "\" alt=\"" . $alt ."\">";?>
     <!--       <canvas id="canvasPhoto" ></canvas> -->

        </figure>
        <div class="editbuttons">
            
            <div class="sidebtn">
                <div class="dropdown">
                    <button id="reset" class="dropbtn">Reset</button>
                </div>
            </div>

            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn" onclick="Download_btn()">Save</button>
                </div>
            </div>

            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn" onclick="Post()">Post</button>
                </div>
            </div>

            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Share</button>
                    <div class="dropdown-content" id="dropdown-content-1">
                        <button class="dropbtn" onclick="Share('public')">Public</button>
                        <button class="dropbtn" onclick="Share('private')">Private</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="details" id="details">
        <h1>Details</h1>
        <ul>
            <?php
            if($platform=="unsplash")
            {
            echo "<li>Created_at:". $create_data ."</li>";
            echo "<li>Description:". $description ."</li>";
            echo "<li>Width of photo:". $width ."</li>";
            echo "<li>Height of photo:". $height ."</li>";
            echo "<li>Number of likes:". $likes ."</li>";
             echo "<li>Number of downloads:". $downloads ."</li>";

            }
            else
            {
            echo "<li>Number of likes:". $likes ."</li>";
            echo "<li>Number of comments:". $comments ."</li>";
            echo "<li>Number of shares:". $shares ."</li>";
            }
            ?>
        </ul>
    </div>
    <div class="editor" id="hideEditor">
        <div class="filter">
            <label for="blur">Blur</label>
            <input type="range" min="0" max="5" value="0" step="0.1" id="blur" >
        </div>

        <div class="filter">
            <label for="contrast">Contrast</label>
            <input type="range" min="0" max="200" value="100"   id="contrast" >
        </div>

        <div class="filter">
            <label for="saturation">Saturation</label>
            <input type="range" min="0" max="200" value="100"  id="saturation" >
        </div>

        <div class="filter">
            <label for="sepia">Sepia</label>
            <input type="range" min="0" max="100" value="0"  id="sepia" >
        </div>

        <div class="filter">
            <label for="brightness">Brightness</label>
            <input type="range" min="0" max="200" value="100"  id="brightness" >
        </div>

        <div class="filter">
            <label for="greyScale">GrayScale</label>
            <input type="range" min="0" max="100" value="0"  id="greyScale" >
        </div>

        <div class="filter">
            <label for="hue">Hue</label>
            <input type="range" min="0" max="100" value="0"  id="hue" >
        </div>

        <div class="flip-buttons">
            <div class="flip-option">
                <input type="radio" name="flip" id="no-flip" checked>
                <label for="no-flip">No flip</label>
            </div>
            <div class="flip-option">
                <input type="radio" name="flip" id="flip-x">
                <label for="flip-x">Flip Horizontal</label>
            </div>
            <div class="flip-option">
                <input type="radio" name="flip" id="flip-y">
                <label for="flip-y">Flip Vertical</label>
            </div>
        </div>
    </div>

</div>
<footer>
    <p>SMB Copyright &copy; 2022</p>
</footer>
<script src="./views/templates/scripts/editPhoto.js"></script>
</body>
</html>