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
                heart.classList.add("blue-heart");
                heart.setAttribute("stroke", "transparent");
                console.log(this.responseText);
                const response = JSON.parse(this.responseText);
                const likes = response.likes;
                console.log(likes);
                document.getElementById("likes_number").textContent = likes;
            } else {
                heart.setAttribute("stroke", "white");
                heart.classList.remove("blue-heart");
                console.log(this.responseText);
                const response = JSON.parse(this.responseText);
                const likes = response.likes;
                console.log(likes);
                document.getElementById("likes_number").textContent = likes;
            }
        }
    }
    console.log(action)
    console.log(postId);
    const formData = new FormData();
    formData.append("action", action);
    formData.append("postId", postId);
    xhr.send(formData);
})