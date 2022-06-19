

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
