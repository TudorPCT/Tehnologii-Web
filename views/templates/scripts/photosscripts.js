function getPhotos(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      //  if (this.status === 401)
         //   window.location.replace("");
    };

    console.log('Bearer ' + localStorage.getItem("jwt"));

    xmlhttp.open("GET","/Tehnologii-Web/index.php?load=photos/getPhotos", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem("jwt"));

    xmlhttp.send();
}