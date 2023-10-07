var tempMedias = document.getElementById("post-data");
var medias = JSON.parse(tempMedias.getAttribute("data-postdata"))['posts'];
console.log(JSON.parse(tempMedias.getAttribute("data-postdata")));

// for pagination
function addPage(min, max, page, link, current) {
    for (var i = min; i <= max; i++) {
        var temp = document.createElement("a");
        temp.textContent = i.toString();
        temp.href = link + "@page=" + i.toString();
        if (i == current) {
            temp.className = "active";
        } else {
            temp.className = "inactive";
        }
        page.appendChild(temp);
    }
}

function addMorePage(page) {
    var morePage = document.createElement("a");
    morePage.textContent = "...";
    morePage.className = "more";
    page.appendChild(morePage);
}

function addPagination() {
    // for the pagination
    var current_page = JSON.parse(tempMedias.getAttribute("data-postdata"))['search'];
    var base_page = JSON.parse(tempMedias.getAttribute("data-postdata"))['base'];
    var totalMedias = JSON.parse(tempMedias.getAttribute("data-postdata"))['amount'][0]['count'];
    var page = document.getElementById("page_selector");
    var maxElementInPage = 10;
    var maxpage = Math.ceil(totalMedias/maxElementInPage);
    var curr_active_page = 1;
    var url_lists = current_page.split("@");

    if (base_page == "http://localhost:8080/home/") {
        if (current_page == "' '") {
            var original_page = base_page + "q=@c=0@f=0@s=0";
        } else {
            var original_page = base_page + url_lists[0] +  "@" + url_lists[1] +  "@" + url_lists[2] +  "@" + url_lists[3];
        }
    } else {
        var original_page = base_page;
    }

    if (url_lists.length == 5) {
        curr_active_page = parseInt(url_lists[4].substring(5));
    }

    if (curr_active_page > 1) {
        var prev = document.createElement("a");
        prev.textContent = "<";
        prev.href = original_page + "@page=" + (curr_active_page-1).toString();
        prev.className = "arrow";
        page.appendChild(prev);
    }
    
    // create all pages
    if (maxpage < 5) {
        addPage(1, maxpage, page, original_page, curr_active_page);
    } else {
        if (curr_active_page - 2 >= 1 && curr_active_page + 2 <= maxpage) {
            if (curr_active_page - 2 > 1) {
                addMorePage(page);
            }
    
            addPage(curr_active_page - 2, curr_active_page + 2, page, original_page, curr_active_page);
    
            if (curr_active_page + 2 < maxpage) {
                addMorePage(page);
            }
        } else {
            if (curr_active_page + 2 > maxpage) {
                addMorePage(page);
                addPage(maxpage-5, maxpage, page, original_page, curr_active_page);
            } else {
                addPage(1, 5, page, original_page, curr_active_page);
                addMorePage(page);
            }
        }
    }

    if (curr_active_page < maxpage) {
        var next = document.createElement("a");
        next.text = ">";
        next.href = original_page + "@page=" + (curr_active_page+1).toString();
        next.className = "arrow";
        page.appendChild(next);
    }
}

// for adding each medias to the homepage
function addMedias() {
    const canvas = document.getElementById('media_canvas');

    medias.forEach((post) => {
        const button = document.createElement('button');
        button.onclick = function() {
            window.location.href = 'http://localhost:8080/post/' + post['post_id'] + '/';
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

addPagination();
addMedias();