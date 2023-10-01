function expandOptions() {
    document.getElementById("hidden").style.display = "block";
}

function closeOptions() {
    document.getElementById("hidden").style.display = "none";
}

// for expanding the navbar
document.addEventListener("click", function(event) {
    if (document.getElementById("hidden").style.display == "block") {
        var validSearchBox = document.getElementById("searchbox2");
        var validInputBox = document.getElementById("inputbox");
        if (event.target != validInputBox && event.target != validSearchBox && !validInputBox.contains(event.target)) {
            closeOptions();
        }
    } else {
        var validSearchBox = document.getElementById("searchbox");
        if (event.target == validSearchBox) {
            expandOptions();
        }
    }
})