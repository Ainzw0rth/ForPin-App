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
                document.cookie = 'post_liked_' + postId + "_" + userId  + '=true';
                heart.classList.add("blue-heart");
                heart.setAttribute("stroke", "transparent");
                const response = JSON.parse(this.responseText);
                const likes = response.likes;
                document.getElementById("likes_number").textContent = likes;
            } else {
                document.cookie = 'post_liked_' + postId + "_" + userId + '=';
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


const modalPath = '#delete-post';
const modalPathTwo = '#edit-post';
const goBackButton = document.getElementById("go-back-button");

goBackButton.addEventListener("click", function() {
    if (window.location.href.includes('#')) {
        window.history.go(-3);
      } else {
        window.history.back();
      }
})

var genre = document.getElementById("post-data");
var parsedGenre = JSON.parse(genre.getAttribute("data-postdata"))['category'];
function addgenre() {
    var dropdown = document.getElementById("genre");
    
    parsedGenre.forEach(category => {
        var newOption = document.createElement("option");
        newOption.value = category['genre'];
        newOption.text = category['genre'];
        dropdown.add(newOption);
    }); 
}

addgenre();