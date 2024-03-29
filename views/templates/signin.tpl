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
                    <li> <a href="./?load=home">Home</a></li>
                    <li class="current"><a href="./?load=signin">Sign In / Register</a></li>
                </ul>
                </nav>
            </div>
        </header>

        <script src="./views/templates/scripts/signinscript.js"></script>
        <section id="signin">
            <h1> Sign in</h1>

            <form onsubmit="signin(); return false;" id="signinform">
                <label>Email</label>
                <input type="text" name="email">

                <label>Password</label>
                <input type="password" name="password">

                <label id="createacc"><a href="./?load=Register">Create new account</a></label>

                <label id="errorLabel"></label>
                <input class="btn" type="submit" value="Signin">
            </form>


        </section>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>