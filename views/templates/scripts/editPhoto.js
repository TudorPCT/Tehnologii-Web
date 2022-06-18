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
        console.log(image.naturalWidth);
        console.log(image.naturalHeight);

        console.log(canvas.width);
        console.log(canvas.height);
        console.log("rotations  X"+scaleX+"rotations Y"+scaleY);
        context.scale(scaleX,scaleY);
        context.drawImage(image,0,0, canvas.width*scaleX,canvas.height*scaleY);

        return canvas.toDataURL("image/jpg");
    }
}
function Download_btn(){
        const jpgUrl = getImageEdited();
        // console.log("link ul: "+jpgUrl);
        const link = document.createElement("a");
            document.body.appendChild(link);
            link.setAttribute("href",jpgUrl);
            link.setAttribute("download","photo.jpg");
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
    console.log("share public/privat");
    var photoUrl = getImageEdited();
    console.log(photoUrl);
}
function Post(){
console.log("trimit poza prelucrata la server si el o posteaza pe contul meu tumblr");
    var photoUrl = getImageEdited();
    console.log(photoUrl);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./?load=tumblr/postPhoto");

    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader("Content-Type", "multipart/form-data");

    xhr.onload = () => console.log(xhr.responseText);

    xhr.send(photoUrl);


    // var xmlhttp = new XMLHttpRequest();

    // xmlhttp.onreadystatechange = function() {
    //     if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
    //         document.getElementById("Wrapper").innerHTML = this.responseText;
    //     }

    // };

    // $link = "./?load=tumblr/postPhoto";
    // $link = $link.concat("&url=", photoUrl);
    // console.log($link);
    // xmlhttp.open("GET", $link, true);

    // xmlhttp.send();
}
