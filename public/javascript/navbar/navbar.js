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
        console.log(category['genre']);
        newOption.value = category['genre'];
        newOption.text = category['genre'];
        dropdown.add(newOption);
    }); 
}

addCategories();

// for user profile pic 
var curr_user = JSON.parse(tempMedias.getAttribute("data-postdata"))['user'];
function addProfilePic() {
    var profile = document.getElementById("profile-button");
    var profilepic = document.createElement("img");
    profilepic.src = curr_user['profile_path'];
    profilepic.className = "logo";
    profilepic.onclick = function() {
        window.location = 'http://localhost:8080/profile/'
    }
    profilepic.alt = "navbar profile picture";

    profile.appendChild(profilepic);
}

addProfilePic();

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

// for simple search validation
const invalidSearchRegex = /@/;
let validSearch = true;

document.getElementById("searchbox").addEventListener("keyup", debounce(() => {
    const searchWarning = document.getElementById("search-warn");
    const searchValue = (document.getElementById("searchbox")).value;
    console.log(searchValue);

    if (invalidSearchRegex.test(searchValue)) {
        searchWarning.innerText = "Invalid character '@'!";
        searchWarning.className = "warn-show";
        validSearch = false;
    } else {
        searchWarning.innerText = "";
        searchWarning.className = "warn-hide";
        validSearch = true;
    }        
}, DEBOUNCE_TIMEOUT)
);

//onClick="location.href='<?= BASE_URL; ?>/home/s=cat'"
const searchButton = document.getElementById("search_button");
searchButton.addEventListener("click", function () {
    if (validSearch) {
        var destination = "http://localhost:8080/home/";
        var search_value = "q=" + (document.getElementById('searchbox').value).replace(/ /g, "-");
        var category_value = "@c=" + (document.getElementById('category').value).replace(/ /g, "-");
    
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
    }
});

const logoutButton = document.getElementById("log-out");
logoutButton.addEventListener("click", async (e) => {
    e.preventDefault();
    const xhr = new XMLHttpRequest();

    xhr.open("POST", `user/logout`);

    const formData = new FormData();
    formData.append("csrf_token", CSRF_TOKEN);
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE) {
            const data = JSON.parse(this.responseText);
            location.replace(data.redirect_url);
        }
    };
});

console.log(document.getElementById('category').value);