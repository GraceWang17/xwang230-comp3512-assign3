window.document.ready = function(){
    displayImage();
};

function displayImage() {
    var image = document.getElementById("bookCover");
    var modal = document.getElementById("modal");
    var large = document.getElementById("image");
    image.addEventListener('click' , function() {
        modal.setAttribute("class", "setBackground");
        large.src = this.src;
        modal.style.display = "flex";
    });
    large.addEventListener('click', function() {
        large.src = "none";
        modal.removeAttribute("class", "setBackground");
        modal.style.display = "flex";
    });
}