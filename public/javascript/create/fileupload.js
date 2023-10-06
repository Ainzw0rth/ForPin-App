document.getElementById("file-input").onchange = function() {
    document.querySelector('input[id="post-image-submit"]').click();
}

document.addEventListener("DOMContentLoaded", function () {
    const titleInput = document.getElementById("title");
    const descInput = document.getElementById("description");
    const genreInput = document.getElementById("genre");
    const tagsInput = document.getElementById("tags");
    const fileInput = document.getElementById("file-names");
    const uploadForm = document.querySelector(".upload-form");
    
    const titleWarn = document.getElementById("title-warn");
    const tagsWarn = document.getElementById("tags-warn-2");
    
    const titleRegex = /^\w+$/;
    const tagsRegex = /^\w+$/;
    
    let titlePass = false;
    let tagsPass = false;
    
    titleInput.addEventListener("keyup", debounce(() => {
        const title = titleInput.value;
        if ( title.length == 0 ) {
            titleWarn.innerHTML = "";
            titleWarn.className = "warn-hide";
            titlePass = true;
        } else if ( !titleRegex.test(title) ) {
            titleWarn.innerHTML = "Invalid title!";
            titleWarn.className = "warn-show";
            titlePass = false;
        } else {
            titleWarn.innerHTML = "";
            titleWarn.className = "warn-hide";
            titlePass = true;
        }
    
        }, DEBOUNCE_TIMEOUT)
    );
    
    tagsInput.addEventListener("keyup", debounce(() => {
        const tags = tagsInput.value;
        if ( tags.length == 0 ) {
            tagsWarn.innerHTML = "";
            tagsWarn.className = "warn-hide";
            tagsPass = true;
        } else if ( !tagsRegex.test(tags) ) {
            tagsWarn.innerHTML = "Invalid tags!";
            tagsWarn.className = "warn-show";
            tagsPass = false;
        } else {
            tagsWarn.innerHTML = "";
            tagsWarn.className = "warn-hide";
            tagsPass = true;
        }
    
        }, DEBOUNCE_TIMEOUT)
    );
    
    uploadForm.addEventListener("submit", async(e) => {
        e.preventDefault();
    
        let title = titleInput.value;
        let description = descInput.value;
        let filenames = fileInput.value;
        let tags = genreInput.value + " " + tagsInput.value;
    
        if (!title) {
            title = "";
            titleWarn.innerText = "";
            titleWarn.className = "warn-hide";
            titlePass = true;
        } else if (!titleRegex.test(title)) {
            titleWarn.innerText = "Invalid title!";
            titleWarn.className = "warn-show";
            titlePass = false;
        } else {
            titleWarn.innerText = "";
            titleWarn.className = "warn-hide";
            titlePass = true;
        }
    
        if (!description) {
            description = "";
        }
    
        if (!tags) {
            tags = "";
            tagsWarn.innerText = "";
            tagsWarn.className = "warn-hide";
            tagsPass = true;
        // } else if (!tagsRegex.test(tags)) {
        //     tagsWarn.innerText = "Invalid tags!";
        //     tagsWarn.className = "warn-show";
        //     tagsPass = false;
        } else {
            tagsWarn.innerText = "";
            tagsWarn.className = "warn-hide";
            tagsPass = true;
        }
    
        if (!titlePass || !tagsPass) {
            return;
        }
    
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/create/insertData");
    
        const formData = new FormData();
        formData.append("title", title);
        formData.append("description", description);
        formData.append("tags", tags);
        formData.append("filenames", filenames);
    
        formData.forEach((value, key) => {
            console.log(key, value);
        });
    
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 201) {
                    document.getElementById("upload-warn").className = "warn-hide";
                    const data = JSON.parse(this.responseText);
                    location.replace(data.redirect_url);
                } else {
                    document.getElementById("upload-warn").className = "warn-show";
                }
            }
        }
    
    });
    
})
