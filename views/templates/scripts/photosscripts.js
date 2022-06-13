function getPhotos(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log(this.responseText);
            document.getElementById("Wrapper").innerHTML = this.responseText;
        }

    };

    console.log(sessionStorage.getItem("jwt"));

    xmlhttp.open("GET","/index.php?load=photos/getPhotos", true);

    xmlhttp.send();
}