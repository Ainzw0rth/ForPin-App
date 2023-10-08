const heartIcon = document.getElementById("likes");
const heart = document.getElementById("heart");


heartIcon.addEventListener("click", function () {
    const isLiked = heart.classList.contains("blue-heart");
    const action = isLiked ? 'substract' : 'add';

    const xhr = new XMLHttpRequest();

    xhr.open("POST", `/post/addLikes`);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (action === "add") {
                document.cookie = 'post_liked_' + postId  + '=true';
                heart.classList.add("blue-heart");
                heart.setAttribute("stroke", "transparent");
                const response = JSON.parse(this.responseText);
                const likes = response.likes;
                document.getElementById("likes_number").textContent = likes;
            } else {
                document.cookie = 'post_liked_' + postId  + '=';
                heart.setAttribute("stroke", "white");
                heart.classList.remove("blue-heart");
                const response = JSON.parse(this.responseText);
                const likes = response.likes;
                document.getElementById("likes_number").textContent = likes;
            }
        }
    }
    const formData = new FormData();
    formData.append("action", action);
    formData.append("postId", postId);
    xhr.send(formData);
})

var genre = document.getElementById("post-data");
var parsedGenre = JSON.parse(genre.getAttribute("data-postdata"))['category'];
function addgenre() {
    var dropdown = document.getElementById("genre");
    
    parsedGenre.forEach(category => {
        var newOption = document.createElement("option");
        console.log(category['genre']);
        newOption.value = category['genre'];
        newOption.text = category['genre'];
        dropdown.add(newOption);
    }); 
}

addgenre();