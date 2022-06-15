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
    <body onload="getAccounts()">
    <script src="./views/templates/scripts/accountsscripts.js"></script>
        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./views/templates/img/logo.jpeg" alt="Logo">
                </div>
                <nav>
                    <ul>
                        <li class="current"><a href="./?load=accounts">Accounts</a></li>
                        <li><a href="./?load=photos">Photos</a></li>
                        <li><a href="./?load=logout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

    <div id="accounts">
        <div id="title">
            Linked accounts
        </div>
    </div>

        <div class="sidenav">
            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Add account</button>
                    <div class="dropdown-content">
                        <a href="./?load=unsplash/authorize">Unsplash</a>
                        <a href="./?load=tumblr/authorize">Tumblr</a>
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