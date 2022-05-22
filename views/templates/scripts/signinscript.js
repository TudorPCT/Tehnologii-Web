//TO DO
function register() {

    var formEl = document.forms.signinform;
    var formData = new FormData(formEl);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      //  if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        //    alert(this.responseText);
        //}
        alert(this.status);
    };
    xmlhttp.open("POST","/Tehnologii-Web/index.php?load=Register/signup", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlhttp.send("first_name="+ formData.get('first_name') +
        "last_name="+ formData.get('last_name') +
        "&email=" + formData.get('email') +
        "&password=" + formData.get('password')+
        "&password2=" + formData.get('password2'));

}