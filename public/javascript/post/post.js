const heartIcon = document.getElementById("likes");
const heart = document.getElementById("heart");

console.log(postId);

heartIcon.addEventListener("click", function () {
    heart.classList.toggle("blue-heart");
    if (heart.classList.contains("blue-heart")) {
        // addLikes($postId)
        heart.setAttribute("stroke", "transparent");
    } else {
        heart.setAttribute("stroke", "white");
        // substractLikes($postId)
    }
})