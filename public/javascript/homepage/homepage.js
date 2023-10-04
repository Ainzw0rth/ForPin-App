var tempMedias = document.getElementById("post-data");
var medias = JSON.parse(tempMedias.getAttribute("data-postdata"))['posts'];

// for adding each medias to the homepage
function addMedias() {
    const canvas = document.getElementById('media_canvas');

    medias.forEach((post) => {
        const button = document.createElement('button');
        button.onclick = function() {
            window.location.href = 'post/' + post['post_id'] + '/';
        }

        const urls = post['media_paths'].split("@");

        let media;
        let media_container; // as a sign that the post has more than 1 image/video
        media_container = document.createElement('div');
        media_container.className = 'image_container';
        
        // if there are more than 1 image or post
        if (urls.length > 1) {
            let media_counter = document.createElement("div");
            media_counter.className = "media_counter";
            media_counter.textContent = "1/" + urls.length;
            media_container.appendChild(media_counter);
        }
        
        if (urls[0].endsWith('.jpeg') || urls[0].endsWith('.jpg') || urls[0].endsWith('.png') || urls[0].endsWith('.gif')) {
            media = document.createElement('img');
            media.src = urls[0];
            media.alt = "image post";
            
            media.onload = () => {
                const numRows = Math.ceil(media.height / parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--row_increment')));
                button.style.gridRowEnd = `span ${numRows+3}`;
            };
        } else {
            media = document.createElement('video');
            media.controls = true;
            media.src = urls[0];
            media.alt = "video post";

            media.onloadedmetadata = () => {
                const numRows = Math.ceil(media.clientHeight / parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--row_increment')));
                button.style.gridRowEnd = `span ${numRows+3}`;
            };
        }
    
        media_container.appendChild(media);
        
        button.appendChild(media_container);

        canvas.appendChild(button);
    })
}


addMedias();