function PreviewImage() {
    const image = document.querySelector(".image");
    const imgPreview = document.querySelector(".img-preview");

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = (oFREvent) => {
        imgPreview.src = oFREvent.target.result;
    };
}
