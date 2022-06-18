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
    <body>
        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./views/templates/img/logo.jpeg" alt="Logo">
                </div>
                <nav>
                    <ul>
                        <li> <a href="./?load=home/">Home</a></li>
                        <li><a href="./?load=signin">Sign In / Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="onephoto">
            <?php echo "<img style=\"filter: " . $filters . "\" src=\"" . $link . "\">"; ?>
        </div>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>