
var output = document.querySelector('#images_preview');
output.innerHTML = '';

loadPhotos("https://socialmediabox.herokuapp.com/?load=unsplash/getUserPhotos");
loadPhotos("https://www.socialmediabox.herokuapp.com/?load=tumblr/photos");

function loadPhotos(link) {
    var xmlhttp = new XMLHttpRequest();

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