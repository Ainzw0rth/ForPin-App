function expandOptions() {
    document.getElementById("inputbox").style.display = "block";
}

function closeOptions() {
    document.getElementById("inputbox").style.display = "none";
}

// for settings in the navbar
function showDropdown() {
    document.getElementById("menus-from-dropdown").style.display = "block";
}

function closeDropdown() {
    document.getElementById("menus-from-dropdown").style.display = "none";
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


function direct_after_enter(event) {
    if (event.key === "Enter") {
        document.getElementById("submit_button").click();
    }
  }