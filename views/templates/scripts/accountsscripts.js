function getAccounts(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("accountsDB").innerHTML = this.responseText;
        }

    };

    console.log('Bearer ' + sessionStorage.getItem("jwt"));

    xmlhttp.open("GET","/Tehnologii-Web/index.php?load=accounts/getAccounts", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem("jwt"));

    xmlhttp.send();
}