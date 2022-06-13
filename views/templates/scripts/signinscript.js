function signin() {

    var formEl = document.forms.signinform;
    var formData = new FormData(formEl);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                myResponse = JSON.parse(this.responseText);
                alert("Signin successful");
                sessionStorage.setItem("jwt", myResponse.jwt);
                document.cookie = `jwt=${myResponse.jwt}`;
                window.location.href = 'index.php?load=photos';
            } else if (this.readyState === XMLHttpRequest.DONE) {
                document.getElementById("errorLabel").innerHTML = myResponse.message;
                return false;
            }
        }

    };
    xmlhttp.open("POST","/index.php?load=Signin/signin", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send("email=" + formData.get('email') +
        "&password=" + formData.get('password'));
}
