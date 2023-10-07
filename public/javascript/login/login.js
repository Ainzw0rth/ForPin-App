const loginButton = document.getElementById("login-button");
const signupButton = document.getElementById("signup-button");

signupButton.classList.remove("active");
loginButton.classList.add("active");

const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const usernameWarn = document.getElementById("username-warn");
const passwordWarn = document.getElementById("password-warn");
const loginForm = document.querySelector(".login-form");

const usernameRegex = /^\w+$/;
const passwordRegex = /^\w+$/;

let usernamePass = false;
let passwordPass = false;

usernameInput.addEventListener("keyup", debounce(()=>{
        const username = usernameInput.value;
        if (!usernameRegex.test(username)) {
            usernameWarn.innerText = "Invalid username!";
            usernameWarn.className = "login_warn-show";
            usernamePass = false;
        } else {
            usernameWarn.innerText = "";
            usernameWarn.className = "login_warn-hide";
            usernamePass = true;
        }
    }, DEBOUNCE_TIMEOUT)
);

passwordInput.addEventListener("keyup", debounce(()=> {
        const password = passwordInput.value;

        if (!passwordRegex.test(password)) {
            passwordWarn.innerText = "Invalid password!"
            passwordWarn.className = "login_warn-show";
            passwordPass = false;
        } else {
            passwordWarn.innerText = "";
            passwordWarn.className = "login_warn-hide";
            passwordPass = true;
        }
    }, DEBOUNCE_TIMEOUT)
);

loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const username = usernameInput.value;
    const password = passwordInput.value;

    if (!username) {
        usernameWarn.innerText = "Before proceeding, please fill out your username!";
        usernameWarn.className = "login_warn-show";
        usernamePass = false;
    } else if (!usernameRegex.test(username)) {
        usernameWarn.innerText = "Invalid username!";
        usernameWarn.className = "login_warn-show";
        usernamePass = false;
    } else {
        usernameWarn.innerText = "";
        usernameWarn.className = "login_warn-hide";
        usernamePass = true;
    }

    if (!password) {
        passwordWarn.innerText = "Before proceeding, please fill out your password!";
        passwordWarn.className = "login_warn-show";
        passwordPass = false;
    } else if (!passwordRegex.test(password)) {
        passwordWarn.innerText = "Invalid password!";
        passwordWarn.className = "login_warn-show";
        passwordPass = false;
    } else {
        passwordWarn.innerText = "";
        passwordWarn.className = "login_warn-hide";
        passwordPass = true;
    }


    if (!usernamePass || !passwordPass) {
        return;
    }

    

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/user/login");

    const formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);
    formData.append("csrf_token", CSRF_TOKEN);

    formData.forEach((value, key) => {
        console.log(key, value);
    });
    
    xhr.send(formData);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 201) {
                document.getElementById("login-warn").className = "login_warn-hide";
                const data = JSON.parse(this.responseText);
                location.replace(data.redirect_url);
            } else {
                document.getElementById("login-warn").className = "login_warn-show";
            }
        }
    }

})