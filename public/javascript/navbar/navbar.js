function expandOptions() {
    document.getElementById("inputbox").style.display = "block";
    document.getElementById("temp").style.marginTop = "60px";
}

function closeOptions() {
    document.getElementById("inputbox").style.display = "none";
    document.getElementById("temp").style.marginTop = "3px";
}

// for expanding the navbar
document.addEventListener("click", function(event) {
    if (document.getElementById("inputbox").style.display == "block") {
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