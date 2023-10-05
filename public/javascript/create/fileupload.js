document.getElementById("file-input").onchange = function() {
    console.log("hai");
    const button = document.getElementById("submit-button-2");
    document.querySelector('input[id="post-image-submit"]').click();
    button.classList.remove('disabled-button');
}