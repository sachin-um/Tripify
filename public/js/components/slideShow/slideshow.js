function slideshow(images) {
    let currentIndex = 0;

    function showImage() {
        // Hide all images
        for (let i = 0; i < images.length; i++) {
            images[i].style.display = "none";
        }
        // Show the current image
        images[currentIndex].style.display = "block";
        // console.log(images[currentIndex]);

        // Increment the current index and loop back to the beginning if necessary
        currentIndex++;
        if (currentIndex >= images.length) {
            currentIndex = 0;
        }

        // Call the showImage function again after a delay
        setTimeout(showImage, 2000); // Change image every 2 seconds
    }

    // Call the showImage function to start the slideshow
    showImage();
}

function showSlideShow(vid) {
    const container = document.getElementById("slideshow-container-" + vid);
    const images = container.getElementsByClassName("slideshow-image-" + vid);
    // console.log(images);

    slideshow(images);
}

// Call the showSlideShow function for each slideshow container
const containers = document.querySelectorAll("[id^='slideshow-container-']");
for (let i = 0; i < containers.length; i++) {
    const vid = containers[i].id.split("-")[2];

    showSlideShow(vid);
}
