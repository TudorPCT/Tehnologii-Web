function signin() {

    var formEl = document.forms.signinform;
    var formData = new FormData(formEl);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                myResponse = JSON.parse(this.responseText);
                alert("Signin successful");

                var now = new Date();
                var time = now.getTime();
                var expireTime = time + 100000*36000;
                now.setTime(expireTime);
                document.cookie = `jwt=${myResponse.jwt};expires=${now.toUTCString()};path=/`;

                window.location.replace('index.php');
            } else if (this.readyState === XMLHttpRequest.DONE) {
                document.getElementById("errorLabel").innerHTML = myResponse.message;
            }
        }

    };
    xmlhttp.open("POST","/?load=Signin/signin", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send("email=" + formData.get('email') +
        "&password=" + formData.get('password'));
}
