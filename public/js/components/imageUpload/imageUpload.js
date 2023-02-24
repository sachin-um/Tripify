const dropArea=document.querySelector(".drag-area");
let dropText=document.querySelector(".img-description");
const browseButton=document.querySelector(".img-upload");
let inputPath=document.querySelector("#profile-imgupload");

let file;

browseButton.onclick=()=>{
    inputPath.click();
}
inputPath.addEventListener("change",function () {
    file=this.files[0];

    showImage();
});

dropArea.addEventListener("dragover",(event)=>{
    event.preventDefault();
    dropArea.classList.add('active');
    dropText.textContent="Release to Upload the file";
});

dropArea.addEventListener("dragleave",()=>{
    dropArea.classList.remove('active');
    dropText.textContent="Drag & Drop to upload File";
});

dropArea.addEventListener("drop",(event)=>{
    event.preventDefault();

    file=event.dataTransfer.files[0];
    let list=new DataTransfer();
    list.items.add(file);
    inputPath.files=list.files;

    showImage();
    dropArea.classList.remove("active");
});

function showImage() {
    let fileType=file.type;
    let validExtensions=['image/jpeg','image/jpg','image/png'];

    if (validExtensions.includes(fileType)) {
        let fileReader=new FileReader();

        fileReader.onload=()=>{
            let fileURL=fileReader.result;
            document.querySelector("#profile-img-placehoder").setAttribute('src',fileURL);

        }
        fileReader.readAsDataURL(file);
        let validate=document.querySelector(".img-validation");
        validate.classList.add("active");

        let banner=document.querySelector(".img-select");
        banner.innerHTML="Image Selected";
    }
    else{
        alert("This is not an Image file");
        dropArea.classList.remove('active');
    }
}
