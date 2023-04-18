const dropArea = document.querySelector(".drag-area");
const browseButton = document.querySelector(".img-upload");
const inputPath = document.querySelector("#profile-imgupload");
const galleryContainer = document.querySelector("#image-gallery");

function showImages() {
    let files = inputPath.files;
  
    // Check the number of files and total file size
    if (files.length > 4) {
      alert("You can only upload up to 4 images");
      return;
    }
  
    let totalSize = 0;
    for (let i = 0; i < files.length; i++) {
      totalSize += files[i].size;
    }
    if (totalSize > 60 * 1024 * 1024) {
      alert("The total file size cannot exceed 15Mb");
      return;
    }
  
    let validExtensions=['image/jpeg','image/jpg','image/png'];

    let uploadedImagesCount = galleryContainer.querySelectorAll('.gallery-img').length;
  
    // Check if the user has already uploaded 4 images
    if (uploadedImagesCount + files.length > 4) {
      alert("You can only upload up to 4 images");
      return;
    }
  
    // Loop through all the selected files
    for (let i = 0; i < files.length; i++) {
      let fileType = files[i].type;
      // Check if the file type is valid
      if (!validExtensions.includes(fileType)) {
        alert("File type not supported");
        continue;
      }
  
      let fileReader = new FileReader();
  
      fileReader.onload = () => {
        let fileURL = fileReader.result;
        let imgElement = document.createElement("img");
        imgElement.setAttribute("src", fileURL);
        imgElement.setAttribute("alt", "Image " + (i+1));
        imgElement.classList.add("gallery-img");
  
        // Add click event listener to open modal
        // imgElement.addEventListener("click", () => {
        //   document.querySelector(".modal-content").setAttribute("src", fileURL);
        //   document.querySelector(".modal").style.display = "block";
        // });
  
        // Add image to gallery container
        galleryContainer.appendChild(imgElement);
      }
  
      fileReader.readAsDataURL(files[i]);
 
    }
  }
  

browseButton.onclick = () => {
  inputPath.click();
};

inputPath.addEventListener("change", function () {
  const files = [...this.files];
  showImages(files);
});

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("active");
});

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("active");
});

dropArea.addEventListener("drop", (event) => {
  event.preventDefault();
  const files = [...event.dataTransfer.files];
  showImages(files);
  dropArea.classList.remove("active");
});



