var neccessary_datas = JSON.parse(tempMedias.getAttribute("data-postdata"));
var profile_section = document.getElementById("profile_section");

// add user details
function addUserDetails() {
    // user pfp
    var user_data = neccessary_datas['user'];
    var profile_pic = document.createElement("img");
    profile_pic.src = user_data['profile_path'];
    profile_pic.alt = "profile page profile picture";
    profile_pic.className = "profile_pfp";
    profile_section.appendChild(profile_pic);

    // user name
    var profile_username = document.createElement("h2");
    profile_username.className = "profile_username";
    profile_username.textContent = "@" + user_data['username'];
    profile_section.appendChild(profile_username);

    // full name
    var profile_fullname = document.createElement("h3");
    profile_fullname.className = "profile_fullname";
    profile_fullname.textContent = user_data['fullname'];
    profile_section.appendChild(profile_fullname);

    // edit button
    var edit_button = document.createElement("button");
    edit_button.className = "edit_profile_button";
    edit_button.textContent = "Edit profile";
    // link to edit profile page
    edit_button.onclick = function() {
        window.location.href = "http://localhost:8080/profile/edit/";
    }
    if (currentId == sessionId) {
        profile_section.appendChild(edit_button);
    }
}

addUserDetails();