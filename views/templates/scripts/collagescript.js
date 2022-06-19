
 function setBackground() {
    var file = document.getElementById("singleUpload").files[0];
    console.log(file.beginPath);
    var canvas = document.getElementById("background");
    var context = canvas.getContext("2d");
    var reader = new FileReader();
    reader.addEventListener("load", function () {
        var backgroundImage = new Image();
        backgroundImage.src = this.result;
        backgroundImage.onload = function () {
            context.drawImage(backgroundImage, 0, 0, 500, 500);      // Draw and stretch image to fill canvas
        };
    }, false);
    reader.readAsDataURL(file);
}

var backImage = document.getElementById("singleUpload");
backImage.value = '';

var model = document.getElementById("modelSelect");
model.value = '';
 document.getElementById("background").style.backgroundColor="Red";
document.getElementById("background").style.visibility = "hidden";              // Hide canvas until model is selected

var link = document.getElementById('btn-download');
link.addEventListener('click', function (e) {

    var canvas = document.createElement('canvas');
    var context = canvas.getContext("2d");
    canvas.width = 605;
    canvas.height = 605;

    var elems = document.getElementById("photo").getElementsByTagName("canvas");
    Array.from(elems).forEach( function(el) {
        var image = el;
        context.beginPath();      // Simulate CSS padding around images by drawing white  rectangles behind images on export
        context.rect((image.offsetLeft - 480), (image.offsetTop - 76), image.width, 
        image.height);
        context.fillStyle = "white";
        context.fill();
        
        context.drawImage(image, (image.offsetLeft - 480 + 5), (image.offsetTop - 76 + 5), 
        (image.width - 10), (image.height - 10));    // Draw image
    } ); 

    link.href = canvas.toDataURL();   // Save all combined images to one image
    link.download = "photo.png";      // Download the image
}, false);

function modelSelect() {

    var background = document.getElementById("background"); // Keep background canvas

    var photo = document.getElementById("photo");
    while (photo.firstChild) {                              // Remove all child canvases
        photo.removeChild(photo.firstChild);
    }
    photo.appendChild(background);                          // Attach background canvas back

    var selectedModel = document.getElementById("modelSelect").value;    // Get the selected model value

    let element = document.getElementById("background");
    var rect = element.getBoundingClientRect();

    switch (selectedModel) {

        case "model1":             // If model1 was selected, draw pattern using 3 new canvas elements as layers on top of background canvas

            document.getElementById("background").style.visibility = "visible"; // Make background canvas visible

            var layer1 = document.createElement('canvas'); // Create first square canvas programmatically
            layer1.className = "layer";
            layer1.width = 180;                   // Set square canvas width
            layer1.height = 180;                  // Set square canvas height
            layer1.style.top = String(rect.top+20).concat("px");           // Position square canvas 130px from top
            layer1.style.left = String(rect.left+20).concat("px");                 // Position square canvas 540px from left
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1); // Add first square canvas to photo element on page
            registerEvents(layer1); // Add event listeners that help drag & drop on canvas

            var layer2 = document.createElement('canvas');      // Same as above ... create second square canvas.. etc
            layer2.className = "layer";
            layer2.width = 110;
            layer2.height = 110;
            layer2.style.top = String(rect.top+90).concat("px");
            layer2.style.left = String(rect.right-150).concat("px");
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            var layer3 = document.createElement('canvas');
            layer3.className = "layer";
            layer3.width = 300;
            layer3.height = 190;
            layer3.style.top = String(rect.bottom-230).concat("px");
            layer3.style.left = String(rect.left+50).concat("px");
            layer3.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer3);
            registerEvents(layer3);

            break;

        case "model2":  // If model2 was selected, draw pattern using 2 new canvas elements as layers on top of background canvas

            document.getElementById("background").style.visibility = "visible";

            var layer1 = document.createElement('canvas');
            layer1.className = "layer";
            layer1.width = 250;
            layer1.height = 250;
            layer1.style.top = String(rect.top+60).concat("px");           // Position square canvas 130px from top
            layer1.style.left = String(rect.left+20).concat("px");
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1);
            registerEvents(layer1);

            var layer2 = document.createElement('canvas');
            layer2.className = "layer";
            layer2.width = 180;
            layer2.height = rect.height-40;
            layer2.style.top = String(rect.top+20).concat("px");
            layer2.style.left = String(rect.right-200).concat("px");
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            break;

        case "model3":  // If model3 was selected, draw pattern using 2 new canvas elements as layers on top of background canvas

            document.getElementById("background").style.visibility = "visible";

            var layer1 = document.createElement('canvas'); // Create first square canvas programmatically
            layer1.className = "layer";
            layer1.width = 270;                   // Set square canvas width
            layer1.height = 120;                  // Set square canvas height
            layer1.style.top = String(rect.top+20).concat("px");           // Position square canvas 130px from top
            layer1.style.left = String(rect.left+30).concat("px");                 // Position square canvas 540px from left
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1); // Add first square canvas to photo element on page
            registerEvents(layer1); // Add event listeners that help drag & drop on canvas

            var layer2 = document.createElement('canvas');      // Same as above ... create second square canvas.. etc
            layer2.className = "layer";
            layer2.width = 110;
            layer2.height = 110;
            layer2.style.top = String(rect.top+130).concat("px");
            layer2.style.left = String(rect.right-150).concat("px");
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            var layer3 = document.createElement('canvas');
            layer3.className = "layer";
            layer3.width = 110;
            layer3.height = 180;
            layer3.style.top = String(rect.top+190).concat("px");
            layer3.style.left = String(rect.left+60).concat("px");
            layer3.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer3);
            registerEvents(layer3);

            var layer4 = document.createElement('canvas');
            layer4.className = "layer";
            layer4.width = 250;
            layer4.height = 150;
            layer4.style.top = String(rect.bottom-200).concat("px");
            layer4.style.left = String(rect.right-310).concat("px");
            layer4.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer4);
            registerEvents(layer4);
            break;

        default:
            document.getElementById("background").style.visibility = "hidden";  // Hide canvas until model is selected
    }
}

function registerEvents(canvas) {

    canvas.ondragenter = function () {
        canvas.style.border = "dashed 2px #555";  // Change the canvas borders when hovering
    };

    canvas.addEventListener("ondragenter", function () {
        canvas.style.border = "dashed 2px #555";
    })
    canvas.ondragleave = function () {
        canvas.style.border = "none";    // Reset canvas borders when hovering is not active
    };
    canvas.ondragover = function (e) {
        e.preventDefault();
    };
    canvas.ondrop = function (e) {
        e.preventDefault();
        var id = e.dataTransfer.getData("text");
        var dropImage = document.getElementById(id);
        canvas.style.border = "none";              // Reset canvas borders after image drop

        var context = canvas.getContext("2d");
        context.drawImage(dropImage, 0, 0, canvas.width, canvas.height);     // Draw and stretch image to fill canvas
    };
}