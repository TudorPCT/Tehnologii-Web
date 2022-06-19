
var output = document.querySelector('#images_preview');
output.innerHTML = '';


function loadUnsplashPhotos() {
    var xmlhttp = new XMLHttpRequest();
    $link = "./?load=photos/getUnsplashPhotos";
    $link = $link.concat("&minLikes=", $filters[0],
        "&maxLikes=", 0,
        "&minShares=", 0,
        "&maxShares=", 0,
        "&postDate=", 0);
    console.log($link);
    xmlhttp.open("GET", $link, true);

    xmlhttp.send();


    xmlhttp.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            let photos = JSON.parse(this.responseText);
            photos.forEach(printPhoto);
        }
    }
}

function printfPhoto(photo){
    var image = new Image();
    image.id = Math.random().toString(36).substr(2, 9);
    image.height = 80;
    image.width = 80;
    image.src = photo.url;
    output.appendChild(image);
    image.ondragstart = function (e) {
        e.dataTransfer.setData("text", photo.id);
    };
}