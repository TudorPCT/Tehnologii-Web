<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Social Media Aggregator">
        <meta name="author" content="Team">
        <title> M-Pic | Welcome</title>
        <link rel="stylesheet" href="./views/templates/css/style.css">
    </head>
    <body>
        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./img/logo.jpeg">
                </div>
                <nav>
                    <ul>
                        <li><a href="photos.tpl">Photos</a></li>
                        <li><a href="wall.html">My Wall</a></li>
                        <li class="current"><a href="accounts.tpl">Accounts</a></li>
                        <li><a href="index.html">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="accounts">
            <div id="title">
                Linked accounts
            </div>

            <div class="account">
                <div class="id">
                    <img src="./img/instagram.png">
                    <a href="https://www.instagram.com/" target="_blank">Profile_tag</a>
                </div>
            </div>

            <div class="account">
                <div class="id">
                    <img src="./img/twitter.png">
                    <a href="https://www.twitter.com/" target="_blank">Profile_tag</a>
                </div>
            </div>
        </div>

        <div class="sidenav">
            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Add account</button>
                    <div class="dropdown-content">
                        <a href="index.html">Instagram</a>
                        <a href="index.html">Twitter</a>
                    </div>
                </div>
            </div>

            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Delete Account</button>
                </div>
            </div>
        </div>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>