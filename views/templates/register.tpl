<html>
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
                    <img src="./views/templates/img/logo.jpeg">
                </div>
                <nav>
                    <ul>
                        <li> <a href="./index.php?load=home">Home</a></li>
                        <li class="current"><a href="./index.php?load=signin">Sign In / Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <script src="./views/templates/scripts/registerscript.js"></script>
        <section id="register">
            <h1> Register </h1>

            <form onclick="register()" id="registerform">
                <label>First Name</label>
                <input type="text" name="first_name">

                <label>Last name</label>
                <input type="text" name="last_name">

                <label>Email</label>
                <input type="text" name="email">

                <label>Password</label>
                <input type="password" name="password">

                <label>Repeat Password</label>
                <input type="password" name="password2">

                <label id="errorLabel"></label>
                <input class="btn" type="submit" value="Register">
            </form>

        </section>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>
