function getWall(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        //  if (this.status === 401)
        //   window.location.replace("");
    };

    console.log('Bearer ' + sessionStorage.getItem("jwt"));

    xmlhttp.open("GET","/Tehnologii-Web/index.php?load=wall", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem("jwt"));

    xmlhttp.send();
}