<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Social Media Aggregator">
        <meta name="author" content="Team">
        <title> SMB </title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body onload="getWall()">
    <script src="./views/templates/scripts/wallscripts.js"></script>
        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./img/logo.jpeg">
                </div>
                <nav>
                    <ul>
                        <li class="current"><a href="./index.php?load=photos">Photos</a></li>
                        <li><a href="./index.php?load=wall">My Wall</a></li>
                        <li><a href="./index.php?load=accounts">Accounts</a></li>
                        <li><a href="./index.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="wallcolumn">
            <div id="profile">
                <img src="./img/portrait-square-06.jpeg" id = "profilePicture">
                <div class="profileSection">
                    <div id="name">
                        <p>FirstName LastName</p>
                    </div>
                    <div class="wall_buttons">
                        <button onclick="navigate()">Copy profile link</button>
                        <script>
                            function navigate(){
                                window.open("publicwall.html",'_self');
                            }
                        </script>
                    </div>

                </div>
            </div>
            <div class="post">
                <a href="photo.html"><img src="./img/art.jpg"></a>
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Private</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./img/dice.jpg">
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Public</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./img/urban.jpg">
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Public</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./img/love.jpg">
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Public</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./img/money.jpg">
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Public</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./img/nature.jpg">
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Public</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
            <div class="post">
                <img src="./img/stone.jpg">
                <div class="postText">
                    <ul>
                        <li>Likes: 245</li>
                        <li>Comments: 223</li>
                        <li>Visibility: Public</li>
                    </ul>
                    <div class="wall_buttons">
                        <button >Change visibility</button>
                        <button>Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>