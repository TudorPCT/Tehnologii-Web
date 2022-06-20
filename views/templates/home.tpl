<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Social Media Aggregator">
        <meta name="keywords" content="project, infoiasi, web">
        <meta name="author" content="Team">
        <title> SMB | Welcome</title>
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
                        <li class="current"> <a href="./?load=home/">Home</a></li>
                        <li><a href="./?load=signin">Sign In / Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="showcase">
            <div class="text">
                <h1>Social Media Box </h1>
                <p>SMB is an aggregator-type web application through which a user is able to manage the photos
                    they have stored on various platforms that allow the distribution of photos (Unsplash and Tumblr).
                    The application is able to take personal images from the two platforms together with
                    other elements of interest about them: number of likes,number of comments or downloads, number of shares, dimensions, etc.
                    The system provides multi-criteria search facilities. In addition, new photos can be uploaded to
                    these platforms (Tumblr). Graphic content can be edited within the application by applying various CSS
                    filters, can be saved locally and also photos can be used to create collages.
                    The images, together with the processing performed on them, can be made available publicly
                    (or privately) through a REST / GraphQL web service, with a link generated.
                </p>
            </div>
            <div id="testphoto">
                <img src="./views/templates/img/social-media-feed-aggregator.png" alt="Display">
            </div>
        </section>

        <footer>
            <div class="footerzone">
                <div class="contact">
                    <p>Contact us</p>
                    <ul>
                        <li>tel:076*******</li>
                        <li>mail: contact@smb.com</li>
                    </ul>
                </div>
                <div class="terms">
                    <p>Privacy and Terms</p>
                </div>
                <div class="help">
                    <p>Help</p>
                    <a href="https://www.youtube.com/watch?v=-F-W2JmR-f8&ab_channel=RalucaRomascu" target="_blank">Youtube tutorial</a>
                </div>
                <div class="questions">
                    <p>Questions and Answers</p>
                </div>
                <div class="about us">
                    <p>About us</p>
                    <a href="./?load=raport" target="_blank">Tehnical report</a>
                </div>
            </div>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>