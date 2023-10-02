const heartIcon = document.getElementById("likes");
const heart = document.getElementById("heart");

heartIcon.addEventListener("click", function () {
    heart.classList.toggle("blue-heart");
    if (heart.classList.contains("blue-heart")) {
        heart.setAttribute("stroke", "transparent");
    } else {
        heart.setAttribute("stroke", "white");
    }
})