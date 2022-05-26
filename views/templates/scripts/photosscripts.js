function getPhotos(){

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status !== 200) {
            myResponse = JSON.parse(this.responseText);
            alert(myResponse.message);
        }
        alert(this.status);
    };

    console.log('Bearer ' + localStorage.getItem("jwt"));

    xmlhttp.open("GET","/Tehnologii-Web/index.php?load=photos/getPhotos", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem("jwt"));

    xmlhttp.send();
}