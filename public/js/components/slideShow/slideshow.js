let slideIndex = 0;

function slideshow(images) {
    let i;
    
    for (i = 0; i < images.length; i++) {
        images[i].style.display = "none";
    }

    slideIndex++;
    if (slideIndex > images.length) { slideIndex = 1 }
    images[slideIndex - 1].style.display = "block";
    const newImage=[];
    for (i = 0; i < images.length; i++) {
        if (i == 0) {
            newImage[images.length - 1] = images[i];
        }
        newImage[i] = images[(i + 1) % images.length];
    }

    setTimeout(function() {
        slideshow(newImage);
    }, 2000); // Change image every 2 seconds
}

function showSlideShow(vid) {
    const container = document.getElementById("slideshow-container-" + vid);
    const images = container.getElementsByClassName("slideshow-image-" + vid);
    console.log(images);
    
    slideshow(images);
}

// Call the showSlideShow function for each slideshow container
const containers = document.querySelectorAll("[id^='slideshow-container-']");
for (let i = 0; i < containers.length; i++) {
    const vid = containers[i].id.split("-")[2];
    
    showSlideShow(vid);
}