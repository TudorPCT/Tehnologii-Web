function register() {

    var formEl = document.forms.registerform;
    var formData = new FormData(formEl);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 201) {
            alert("**");
        }
        if (this.readyState === XMLHttpRequest.DONE && this.status === 409) {
            document.getElementById("errorLabel").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST","/Tehnologii-Web/index.php?load=Register/signup", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send("first_name="+ formData.get('first_name') +
        "&last_name="+ formData.get('last_name') +
        "&email=" + formData.get('email') +
        "&password=" + formData.get('password')+
        "&password2=" + formData.get('password2'));
}