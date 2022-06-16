filterA = document.getElementById('blur');
filterB = document.getElementById('contrast');
filterC = document.getElementById('saturation');
filterD = document.getElementById('sepia');
filterE = document.getElementById('brightness');
filterF = document.getElementById('greyScale');
filterG = document.getElementById('hue');


noFlipBtn = document.getElementById('no-flip');
flipXBtn = document.getElementById('flip-x');
flipYBtn = document.getElementById('flip-y');

image = document.getElementById("chosen-image");
let canvas = document.getElementById('image_canvas');
const context = canvas.getContext('2d');
context.drawImage(image,0,0, image.width, image.height);

let File_Name = image.getAttribute('src');

let sliders = document.querySelectorAll(".editor .filter input[type='range']");
sliders.forEach(slider=>{slider.addEventListener("input",addFilter)
});
function addFilter() {
        image.style.filter = "blur("+filterA.value+"px)"+
                            "contrast("+filterB.value+"%)"+
                            "saturate("+filterC.value+"%)"+
                            "sepia("+filterD.value+"%)" +
                            "brightness("+filterE.value+"%)"+
                            "grayscale("+filterF.value+"%)" +
                            "hue-rotate("+filterG.value+"deg)";
        context.filter = "blur("+filterA.value+"px)"+
            "contrast("+filterB.value+"%)"+
            "saturate("+filterC.value+"%)"+
            "sepia("+filterD.value+"%)" +
            "brightness("+filterE.value+"%)"+
            "grayscale("+filterF.value+"%)" +
            "hue-rotate("+filterG.value+"deg)";
    // console.log(context);
}

radioBtns = document.querySelectorAll(".flip-option input[type='radio']");
radioBtns.forEach(radioBtn =>{
    radioBtn.addEventListener("click",flipImage);
})
function flipImage(){
    if(flipXBtn.checked){
        image.style.transform="scaleX(-1)";
    }
    else if(flipYBtn.checked){
        image.style.transform = "scaleY(-1)";
    }
    else {
        image.style.transform = "scale(1,1)";
    }
}

let reset = document.getElementById("reset");
reset.addEventListener("click",resetImage);
function resetImage(){
    console.log("resetez img");
    image.style.filter='none';
    for(let i=0;i<=sliders.length-1;i++)
    {
        if(i===0||i===3||i===5||i===6)
            sliders[i].value = 0;
        else
            sliders[i].value = 100;
    }
}
function Download_btn(){
    if(image.getAttribute('src')!==""){
        console.log("salvez img");
            // context.drawImage(image,0,0, canvas.width, canvas.height);
        const jpegUrl = canvas.toDataURL("image/jpg");

        const link = document.createElement("a");
            document.body.appendChild(link);
            link.setAttribute("href",jpegUrl);
            link.setAttribute("download",File_Name);
            link.click();
            document.body.removeChild(link);
    }
}

function seeDetails(){
    document.getElementById("hideEditor").style.display = "none";
    document.getElementById("details").style.display = "initial";
}

function seeEditor(){
    document.getElementById("details").style.display = "none";
    document.getElementById("hideEditor").style.display = "initial";
}