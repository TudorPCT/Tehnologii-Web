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
                    <li><a href="./?load=accounts">Accounts</a></li>
                    <li><a href="./?load=photos">Photos</a></li>
                    <li><a href="./?load=logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

<div class="onephoto">
    <?php echo "<img src=\"" . $link . "\">"; ?>
    <div class="photobuttons">
    <div class="photobutton">
        <button class="photobtn">Post on</button>
        <div class="dropdown-content">
          <a href="#">Instagram</a>
          <a href="#">Twitter</a>
          <a href="#">Facebook</a>
        </div>
    </div>
    <div class="photobutton">
        <button class="photobtn">Edit</button>
        <div class="dropdown-content">
          <a href="#">Filter</a>
          <a href="#">Border</a>
          <a href="#">Crop</a>
        </div>
    </div>
    <div class="photobutton">
        <button class="photobtn">See details</button>
        <div class="dropdown-content">
            <div class="infos">
            <p>INFO:</p>
            <ul>
                <li>From: Instagram</li>
                <li>Posted at: 12 march 2021</li>
                <li>Likes: 1200</li>
                <li>Comments: 223</li>
                <li>Visibility: Public</li>
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