function getLogout(){

    sessionStorage.removeItem("jwt");
    document.cookie = "cookiename= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    window.location.href = 'index.php';
}