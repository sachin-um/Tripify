// Array of image URLs for each vehicle

console.log(vehicleImages+'images...');
console.log('1683274099_WhatsApp Image 2023-05-04 at 10.39.12.jpeg');
// HTML element for the slideshow
const slideshowImage = document.getElementById('slideshow-imagecont');

// Function to set a random image URL in the slideshow
function setRandomImage() {
  // Get a random index into the vehicleImages array
  const randomIndex = Math.floor(Math.random() * vehicleImages.length);
  // Get the random image URL from the vehicleImages array
  const randomImageUrl = vehicleImages[randomIndex];
  // Set the slideshow image src attribute to the random image URL
  slideshowImage.src = randomImageUrl;
}

// Set the first random image in the slideshow
setRandomImage();

// Set a timer to switch the image every 5 seconds
setInterval(setRandomImage, 5000);
