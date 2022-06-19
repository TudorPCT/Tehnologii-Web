<!DOCTYPE html>
<html lang="EN">
    <head>
        <title>Collage photo's</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Social Media Aggregator">
        <meta name="keywords" content="project, infoiasi, web">
        <meta name="author" content="Team">
        <title> SMB | Welcome</title>
        <link rel="stylesheet" href="./views/templates/css/collage.css">
    </head>

    <body id="body">

        <header id="headerC">
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

        <div class="rowC">
            <div class="options">
            <div class="columnC">

                <div id="leftSide">
                    <div id="images_preview"></div>
                </div>

            </div>
            <div class="columnC">

                <div id="buttonsArea">
                    <select id="modelSelect" onchange="modelSelect()">
                        <option value="">Select the pattern</option>
                        <option value="model1">Model 1</option>
                        <option value="model2">Model 2</option>
                        <option value="model3">Model 3</option>
                    </select>

                    <div id="singleUploadSection">
<!--                        Click "Browse" to select a background image for your canvas!-->
                        <input id="singleUpload" type="file" style="visibility:hidden;" onchange="setBackground()" />
                        <label for="singleUpload" class="button">Choose background</label>
                    </div>

                     <a href="#" class="button" id="btn-download">Save your collage image</a>
                </div>

            </div>
            </div>

            <div id="photo">

                <canvas id="background" width="500" height="500"></canvas>

            </div>

            <div id="images"></div>
        </div>
<!--        <footer>-->
<!--            <p>SMB Copyright &copy; 2022</p>-->
<!--        </footer>-->
        <script src="./views/templates/scripts/collagescript.js"></script>
        <script src="./views/templates/scripts/fileUpload.js"></script>
    </body>

</html>

