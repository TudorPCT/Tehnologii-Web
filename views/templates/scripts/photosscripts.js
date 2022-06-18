var platform = null;

function getPhotos(){
    if (platform === 'unsplash')
        getUnsplashPhotos();
    else if (platform === 'tumblr')
        getTumblrPhotos();
}

function getUnsplashPhotos(){

    platform = 'unsplash';
    $filters = getFilter();

    document.getElementById("Wrapper").innerHTML = "<div class=\"loader\"></div>";

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("Wrapper").innerHTML = this.responseText;
        }

    };

    $link = "./?load=photos/getUnsplashPhotos";
    $link = $link.concat("&minLikes=", $filters[0],
        "&maxLikes=", $filters[1],
        "&minShares=", $filters[2],
        "&maxShares=", $filters[3],
        "&postDate=", $filters[4]);
    console.log($link);
    xmlhttp.open("GET", $link, true);

    xmlhttp.send();
}

function getTumblrPhotos(){

    platform = 'tumblr';
    $filters = getFilter();

    document.getElementById("Wrapper").innerHTML = "<div class=\"loader\"></div>";

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("Wrapper").innerHTML = this.responseText;
        }

    };

    $link = "./?load=photos/getTumblrPhotos";
    $link = $link.concat("&minLikes=", $filters[0],
        "&maxLikes=", $filters[1],
        "&minShares=", $filters[2],
        "&maxShares=", $filters[3],
        "&postDate=", $filters[4]);
    console.log($link);

    xmlhttp.open("GET", $link, true);

    xmlhttp.send();
}


function getCheckboxValue(id){
    return document.getElementById(id).checked;
}

function getFilter() {

    var minLikes = null;
    var maxLikes = null;

    var minShares = null;
    var maxShares = null;

    var postDate = null;

    if (getCheckboxValue("cb8")){
        minLikes = 0;
        maxLikes = 500;
    }
    if (getCheckboxValue("cb10")){
        if (minLikes == null)
            minLikes = 500;
        maxLikes = 0;
    }
    if (minLikes == null && maxLikes == null){
        minLikes = 0;
        maxLikes = 0;
    }

    if (getCheckboxValue("cb11")){
        minShares = 0;
        maxShares = 200;
    }
    if (getCheckboxValue("cb13")){
        if (minShares == null)
            minShares = 200;
        maxShares = 0;
    }
    if (minShares == null && maxShares == null){
        minShares = 0;
        maxShares = 0;
    }

    if (getCheckboxValue("cb14")){
        postDate = 1;
    }
    if (getCheckboxValue("cb15")){
        postDate = 12;
    }
    if (postDate == null)
        postDate = 0;

    return Array.of(minLikes, maxLikes, minShares, maxShares, postDate);

}