function getAccounts(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("accounts").innerText = this.responseText;
        }

    };

    xmlhttp.open("GET","./?load=accounts/getAccounts", true);

    xmlhttp.send();
}