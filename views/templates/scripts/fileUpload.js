
var output = document.querySelector('#images_preview');
output.innerHTML = '';

loadUnsplashPhotos();
function loadUnsplashPhotos() {
    var xmlhttp = new XMLHttpRequest();
    link = "socialmediabox.herokuapp.com/?load=photos/getCollagePhotos";

    link = link.concat("&minLikes=", 0,
        "&maxLikes=", 0,
        "&minShares=", 0,
        "&maxShares=", 0,
        "&postDate=", 0);

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            photos = JSON.parse(this.responseText);
            photos.forEach(printPhoto);
        }
    }

    xmlhttp.open("GET", link, true);

    xmlhttp.send();

}

function printPhoto(photo){
    var image = new Image();
    image.id = photo.id;
    image.height = 80;
    image.width = 80;
    image.src = photo.url;
    output.appendChild(image);
    image.ondragstart = function (e) {
        e.dataTransfer.setData("text", e.target.id);
    };
}