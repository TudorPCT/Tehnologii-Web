function getPhotos(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200)
            document.getElementById("row").innerHTML = this.responseText;
    };

    console.log(sessionStorage.getItem("jwt"));

    xmlhttp.open("GET","/Tehnologii-Web/index.php?load=photos/getPhotos", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem("jwt"));

    xmlhttp.send();
}