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

// for categories dropdown
var tempMedias = document.getElementById("post-data");
var categories = JSON.parse(tempMedias.getAttribute("data-postdata"))['category'];

function addCategories() {
    var dropdown = document.getElementById("category");
    
    categories.forEach(category => {
        var newOption = document.createElement("option");
        newOption.value = category['genre'];
        newOption.text = category['genre'];
        dropdown.add(newOption);
    }); 
}

addCategories();

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
});

//onClick="location.href='<?= BASE_URL; ?>/home/s=cat'"
const searchButton = document.getElementById("search_button");
searchButton.addEventListener("click", function () {
    var destination = "http://localhost:8080/home/";
    var search_value = "q=" + document.getElementById('searchbox').value;
    var category_value = "@c=" + document.getElementById('category').value;

    var filter_value = "@f=";
    var checked_filter_value;
    var filter_buttons = document.getElementsByName('filter-value');
    for (i = 0; i < filter_buttons.length; i++) {
        if (filter_buttons[i].checked) {
            filter_value += filter_buttons[i].value;
            checked_filter_value = filter_buttons[i].value;
            break;
        }
    }

    var sort_value = "@s=";
    var checked_sort_value;
    var sort_buttons = document.getElementsByName('sort-value');
    for (i = 0; i < sort_buttons.length; i++) {
        if (sort_buttons[i].checked) {
            sort_value += sort_buttons[i].value;
            checked_sort_value = sort_buttons[i].value;
            break;
        }
    }
    
    if (document.getElementById('searchbox').value == "" && document.getElementById('category').value == "0" && checked_filter_value == "0" && checked_sort_value == "0") {
        window.location.href = destination;
    } else {
        window.location.href = destination + search_value + category_value + filter_value + sort_value;
    }
});