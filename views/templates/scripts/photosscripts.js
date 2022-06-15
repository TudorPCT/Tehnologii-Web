function getUnsplashPhotos(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("Wrapper").innerHTML = this.responseText;
        }

    };

    xmlhttp.open("GET","./?load=photos/getUnsplashPhotos", true);

    xmlhttp.send();
}