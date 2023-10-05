document.getElementById("file-input").onchange = function() {
    console.log("hai");
    const button = document.getElementById("submit-button-2");
    // document.getElementById("file-upload-form").submit();
    document.querySelector('input[id="post-image-submit"]').click();
    button.classList.remove('disabled-button');
}

// document.getElementById("file-input").onchange = function() {
//     console.log("hai");
//     document.getElementById("file-upload-form").submit();
//     // document.getElementById("status").textContent = "already uploaded files";
// }

// const xhr = new XMLHttpRequest();

// xhr.open("POST", `/post/addLikes`);
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//         if (action === "add") {
//             heart.classList.add("blue-heart");
//             heart.setAttribute("stroke", "transparent");
//             const response = JSON.parse(this.responseText);
//             const likes = response.likes;
//             document.getElementById("likes_number").textContent = likes;
//         } else {
//             heart.setAttribute("stroke", "white");
//             heart.classList.remove("blue-heart");
//             const response = JSON.parse(this.responseText);
//             const likes = response.likes;
//             document.getElementById("likes_number").textContent = likes;
//         }
//     }
// }
// const formData = new FormData();
// formData.append("action", action);
// formData.append("postId", postId);
// xhr.send(formData);
// document.addEventListener("DOMContentLoad", function () {
//     const fileInput = document.getElementById("file-input");
//     const uploadForm = document.getElementById("file-upload-form");
//     console.log("on change");        
//     fileInput.addEventListener("change", function () {
//         uploadForm.submit();
//         document.getElementById("status").textContent = "already uploaded files";
//     })
// })