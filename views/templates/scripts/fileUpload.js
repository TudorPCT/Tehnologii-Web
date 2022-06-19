
var output = document.querySelector('#images_preview');
output.innerHTML = '';
var image = new Image();
image.id = Math.random().toString(36).substr(2, 9);
image.height = 80;
image.width = 80;
image.src = "https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cmFuZG9tfGVufDB8fDB8fA%3D%3D&w=1000&q=80";
output.appendChild(image);
image.ondragstart = function (e) {
    e.dataTransfer.setData("text", e.target.id);
};

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