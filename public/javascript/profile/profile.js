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

    var subscribe_button = document.createElement("button");
    subscribe_button.className = "delete-account-button";
    subscribe_button.textContent = "Subscribe";
    // link to edit profile page
    edit_button.onclick = function() {
        window.location.href = "http://localhost:80/profile/edit/";
    }

    subscribe_button.addEventListener("click", async (e) => {
        e.preventDefault();
        const xhr = new XMLHttpRequest();
        
        xhr.open("POST", `http://localhost:80/api/subscribe.php`);
    
        const formData = new FormData();
        formData.append("creator_username", creatorUsername);
        formData.append("subscriber_username", subscriberUsername);
        formData.append("curr_date", new Date());
        xhr.send(formData)

        console.log("here")

        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 201) {
                    console.log("success");
                    profile_section.removeChild(subscribe_button);
                    window.location.hash = "subscribe-modal"
                } else {
                    console.error("Error:", this.status, this.statusText);
                }
            }
        };
    });
    

    if (currentId == sessionId) {
        profile_section.appendChild(edit_button);
    }
    if (premium != null) {
        if (premium) {
            if (!subscriptionStatus) {
                profile_section.appendChild(subscribe_button);
            } 
        }
    }
}

addUserDetails();