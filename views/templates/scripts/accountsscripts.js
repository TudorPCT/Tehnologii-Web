function getAccounts(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("accounts").innerHTML += this.responseText;
        }

    };

    xmlhttp.open("GET","./?load=accounts/getAccounts", true);

    xmlhttp.send();
}