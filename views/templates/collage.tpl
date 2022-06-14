<!DOCTYPE html>
<html>
    <head>
        <title>Collage photo's</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Social Media Aggregator">
        <meta name="keywords" content="project, infoiasi, web">
        <meta name="author" content="Team">
        <title> SMB | Welcome</title>
        <link rel="stylesheet" href="./views/templates/css/style.css">
    </head>

    <body id="body"> 

        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./img/logo.jpeg">
                </div>
                <nav>
                    <ul>
                        <li><a href="./?load=accounts">Accounts</a></li>
                        <li class="current"><a href="./?load=photos">Photos</a></li>
                        <li><a href="./?load=wall">My Wall</a></li>
                        <li><a href="./?load=logout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="row">
            <div class="column">

                <div id="leftSide">
                    <div id="dropZone">
                        <p>Drag your images from your file or click <u>here</u>!</p>
                    </div>

                    <div id="images_preview"></div>
                </div>

            </div>
            <div class="column">

                <div id="buttonsArea">
                    <select id="modelSelect" onchange="modelSelect()">
                        <option value="">Select the pattern</option>
                        <option value="model1">Model 1</option>
                        <option value="model2">Model 2</option>
                        <option value="model3">Model 3</option>
                    </select>

                    <div id="singleUploadSection">
                        Click "Browse" to select a background image for your canvas!
                        <input id="singleUpload" type="file" onchange="setBackground()"/>
                    </div>

                    <a href="#" class="button" id="btn-download">Save your collage image</a>
                </div>

            </div>

            <div id="photo">

                <canvas id="background" width="600" height="600"></canvas>

            </div>

            <div id="images"></div>
        </div>

        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>

        
        <script src="js/fileUpload.js"></script>
        <script src="scripts/collagescript.js"></script>
    </body>
</html>

