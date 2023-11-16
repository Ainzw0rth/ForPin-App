var neccessary_datas = JSON.parse(tempMedias.getAttribute("data-postdata"));
var photo_profile_section = document.getElementById("edit_profile_photobutton_section");
var username_profile_section = document.getElementById("edit_profile_username_section");
var fullname_profile_section = document.getElementById("edit_profile_fullname_section");
var password_profile_section = document.getElementById("edit_profile_password_section");
var user_data = neccessary_datas['user'];

document.getElementById("profpic-input").onchange = function() {
    document.querySelector('input[id="change-profpic-submit"]').click();
}



function addPfpOptions() {
    // the profile pic
    var profile_pic = document.createElement("img");
    profile_pic.src = user_data['profile_path'];
    profile_pic.alt = "current profile picture";
    profile_pic.className = "current_profile_pfp";
    photo_profile_section.appendChild(profile_pic);

    // change button
    var edit_button = document.createElement("button");
    edit_button.className = "change_pfp_button";
    edit_button.textContent = "Change";

    edit_button.onclick = function() {
        window.location.href = "#change-profpic";
    }
    photo_profile_section.appendChild(edit_button);
}

addPfpOptions();

// placeholder
function addTextPlaceholder() {
    document.getElementById("username_input").value = user_data['username'];
    document.getElementById("fullname_input").value = user_data['fullname'];
    document.getElementById("password_input").value = user_data['password'];
    document.getElementById("email_input").value = user_data['email'];
}

addTextPlaceholder();

// input fields
var usernameInput = document.getElementById("username_input");
var fullnameInput = document.getElementById("fullname_input");
var passwordInput = document.getElementById("password_input");
var emailInput = document.getElementById("email_input");

var usernamePass = true;
var fullnamePass = true;
var passwordPass = true;
var emailPass = true;

// pop up warnings
var usernameWarn = document.getElementById("invalid_text_input_username");
var fullnameWarn = document.getElementById("invalid_text_input_fullname");
var passwordWarn = document.getElementById("invalid_text_input_password");
var emailWarn = document.getElementById("invalid_text_input_email");

// simple regex
const fullnameRegex = /^[a-zA-Z ]+$/;
const usernameRegex = /^\w+$/;
const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const passwordRegex = /^\w+$/;

usernameInput.addEventListener("keyup", debounce(() => {
    const username = usernameInput.value   

    const xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        `/user/username/${username}/${CSRF_TOKEN}`
    );

    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200 && username != user_data['username']) {
                usernameWarn.innerText = "Username already taken!";
                usernameWarn.className = "edit_warn-show";
                usernamePass = false;
            } else if (!usernameRegex.test(username)) {
                usernameWarn.innerText = "Invalid username!";
                usernameWarn.className = "edit_warn-show";
                usernamePass = false;
            } else {
                usernameWarn.innerText = "";
                usernameWarn.className = "edit_warn-hide";
                usernamePass = true;
            }
        }
    }
    
}, DEBOUNCE_TIMEOUT)
);

fullnameInput.addEventListener("keyup", debounce(() => {
    const fullname = fullnameInput.value   

    if (!fullnameRegex.test(fullname)) {
        fullnameWarn.innerText = "Invalid fullname!";
        fullnameWarn.className = "edit_warn-show";
        fullnamePass = false;
    } else {
        fullnameWarn.innerText = "";
        fullnameWarn.className = "edit_warn-hide";
        fullnamePass = true;
    }        
}, DEBOUNCE_TIMEOUT)
);

emailInput.addEventListener("keyup", debounce(() => {
    const email = emailInput.value;
    const xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        `/user/email/${email}/${CSRF_TOKEN}`
    );

    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200 && email != user_data['email']) {
                emailWarn.innerText = "Email already taken!";
                emailWarn.className = "edit_warn-show";
                emailPass = false;
            } else if (!emailRegex.test(email)) {
                    emailWarn.innerText = "Invalid email!";
                    emailWarn.className = "edit_warn-show";
                    emailPass = false;
            } else {
                emailWarn.innerText = "";
                emailWarn.className = "edit_warn-hide";
                emailPass = true;
            }
        }
    }
}, DEBOUNCE_TIMEOUT)
);

passwordInput.addEventListener("keyup", debounce(() => {
    const password = passwordInput.value   

    if (!passwordRegex.test(password)) {
        passwordWarn.innerText = "Invalid password!"
        passwordWarn.className = "edit_warn-show";
        passwordPass = false;
    } else {
        passwordWarn.innerText = "";
        passwordWarn.className = "edit_warn-hide";
        passwordPass = true;
    }    
}, DEBOUNCE_TIMEOUT)
);

function executeCancel() {
    window.location.href = "http://localhost:80/profile/"
}

function executeEdit() {
    // edit user data
    if (usernamePass && fullnamePass && passwordPass && emailPass) {
        document.querySelector('input[id="change-user-desc"]').click();
    } else {

    }
}