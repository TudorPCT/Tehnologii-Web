let filterA = document.getElementById('blur');
filterB = document.getElementById('contrast');
filterC = document.getElementById('saturation');
filterD = document.getElementById('sepia');
filterE = document.getElementById('brightness');
filterF = document.getElementById('greyScale');
filterG = document.getElementById('hue');


noFlipBtn = document.getElementById('no-flip');
flipXBtn = document.getElementById('flip-x');
flipYBtn = document.getElementById('flip-y');

let reset = document.getElementById("reset");

let image = document.getElementById("chosen-image");
let canvas = document.createElement('canvas');
// canvas.width=200;
canvas.width=image.naturalWidth;
// canvas.height=200;
canvas.height=image.naturalHeight;
const context = canvas.getContext('2d');

let scaleX=1;
let scaleY=1;

// let File_Name = image.getAttribute('src');

let sliders = document.querySelectorAll(".editor .filter input[type='range']");
sliders.forEach(slider=>{slider.addEventListener("input",addFilter)
});
function  getFilter(){
return "blur("+filterA.value+"px)"+
    "contrast("+filterB.value+"%)"+
    "saturate("+filterC.value+"%)"+
    "sepia("+filterD.value+"%)" +
    "brightness("+filterE.value+"%)"+
    "grayscale("+filterF.value+"%)" +
    "hue-rotate("+filterG.value+"deg)";
}
function addFilter() {
        image.style.filter = getFilter();
        context.filter=getFilter();
        context.drawImage(image,0,0, canvas.width,canvas.height);
        // reset.style.transform='translateY(0px)';

}

radioBtns = document.querySelectorAll(".flip-option input[type='radio']");
radioBtns.forEach(radioBtn =>{
    radioBtn.addEventListener("click",flipImage);
})

function flipImage(){
    if(flipXBtn.checked){
        image.style.transform="scaleX(-1)";
        scaleX=-1;
        scaleY=1;
    }
    else if(flipYBtn.checked){
        image.style.transform = "scaleY(-1)";
        scaleX=1;
        scaleY=-1;
    }
    else {
        image.style.transform = "scale(1,1)";
        scaleX=1;
        scaleY=1;
    }
}


reset.addEventListener("click",resetImage);
function resetImage(){
    // console.log("resetez img");
    image.style.filter='none';
    context.filter = 'none';
    for(let i=0;i<=sliders.length-1;i++)
    {
        if(i===0||i===3||i===5||i===6)
            sliders[i].value = 0;
        else
            sliders[i].value = 100;
    }
}
function getImageEdited(){
    if(image.getAttribute('src')!==""){
        console.log("salvez img");
        console.log(image.getAttribute('src'));
        console.log(image.naturalWidth);
        console.log(image.naturalHeight);

        console.log(canvas.width);
        console.log(canvas.height);
        console.log("rotations  X"+scaleX+"rotations Y"+scaleY);
        context.scale(scaleX,scaleY);
        // context.drawImage(image,0,0, canvas.width*scaleX,canvas.height*scaleY);
        context.drawImage(image,0,0,canvas.width,canvas.height);
        return canvas.toDataURL();
    }
}
function Download_btn(){
        const jpgUrl = getImageEdited();
        // console.log("link ul: "+jpgUrl);
        const link = document.createElement("a");
            document.body.appendChild(link);
            link.setAttribute("href",jpgUrl);
            link.setAttribute("download","photo.png");
            link.click();
            document.body.removeChild(link);
}

function seeDetails(){
    document.getElementById("hideEditor").style.display = "none";
    document.getElementById("details").style.display = "initial";
}

function seeEditor(){
    document.getElementById("details").style.display = "none";
    document.getElementById("hideEditor").style.display = "initial";
}
function Share(){
    let photo = document.getElementById("chosen-image");
    let alt = photo.alt;
    let filters = photo.style.filter;
    let scope = 'public';
    if (filters == null)
        filters = 'none';

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                myResponse = JSON.parse(this.responseText);
                window.open(myResponse.link, "_blank");
            } else if (this.readyState === XMLHttpRequest.DONE) {
                document.getElementById("errorLabel").innerHTML = myResponse.message;
            }
        }
    };

    xmlhttp.open("PUT","/?load=share/getLink", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xmlhttp.send("info=" + alt +
        "&scope=" + scope +
        "&filters=" + filters +
        "&scalex=" + scaleX +
        "&scaley=" + scaleY);

}
function Post(){
    console.log("trimit poza prelucrata la server si el o posteaza pe contul meu tumblr");
    var photoUrl = getImageEdited();

    let xhr = new XMLHttpRequest();
    xhr.open("post", "./?load=tumblr/postPhoto");

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        var raspuns = JSON.parse(xhr.response);
        console.log(xhr.responseText);
        if (raspuns.meta.code < 200 || raspuns.meta.code >= 400) {
            alert("Upload failed!");
        } else {
            alert("Image uploaded successfully!");
        }
    }

    xhr.send(photoUrl);


}

