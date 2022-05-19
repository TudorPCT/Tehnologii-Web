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

        <section id="signin">
            <h1> Sign in</h1>

            <form action="./index.php?load=Signin/signin" method="post">
                <label>Email</label>
                <input type="text" name="email">

                <label>Password</label>
                <input type="password" name="password">

                <label id="rememberme"><input name="rememberme" value="remember" type="checkbox" /> &nbsp;Remember me</label>

                <label id="createacc"><a href="./index.php?load=Register">Create new account</a></label>

                <input class="btn" type="submit" value="Signin">
            </form>


        </section>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>