function expandOptions() {
    document.getElementById("inputbox").style.display = "block";
    document.getElementById("media_canvas").style.opacity = "0.2";
}

function closeOptions() {
    document.getElementById("inputbox").style.display = "none";
    document.getElementById("media_canvas").style.opacity = "1";
}

// for settings in the navbar
function showDropdown() {
    document.getElementById("menus-from-dropdown").style.display = "block";
    document.getElementById("media_canvas").style.opacity = "0.2";
}

function closeDropdown() {
    document.getElementById("menus-from-dropdown").style.display = "none";
    document.getElementById("media_canvas").style.opacity = "1";
}


// for expanding the navbar
document.addEventListener("click", function(event) {
    var event_target = event.target;
    var validSearchBox = document.getElementById("searchbox");
    var validSearchBox2 = document.getElementById("searchbox2");
    var validInputBox = document.getElementById("inputbox");
    var validDropdown = document.getElementById("dropdownsymbol");

    if (event_target == validSearchBox) {
        closeDropdown();
        expandOptions();
    } else if (event_target == validDropdown) {
        closeOptions();
        showDropdown();
    } else {
        if (event_target != validInputBox && event_target != validSearchBox2 && !validInputBox.contains(event_target)) {
            closeOptions();
            closeDropdown();
        }
    }
})
