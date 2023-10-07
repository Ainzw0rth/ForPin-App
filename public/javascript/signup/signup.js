const loginButton = document.getElementById("login-button");
const signupButton = document.getElementById("signup-button");

signupButton.classList.add("active");
loginButton.classList.remove("active");

const emailInput = document.getElementById("email");
const usernameInput = document.getElementById("username");
const fullnameInput = document.getElementById("fullname");
const passwordInput = document.getElementById("password");
const secondPassword = document.getElementById("password2");
const emailWarn = document.getElementById("email-warn");
const usernameWarn = document.getElementById("username-warn");
const fullnameWarn = document.getElementById("fullname-warn");

const passwordWarn = document.getElementById("password-warn");
const secondPasswordWarn = document.getElementById("confirm-password-warn");
const signupForm = document.querySelector(".signup-form");

const fullnameRegex = /^[a-zA-Z ]+$/;
const usernameRegex = /^\w+$/;
const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const passwordRegex = /^\w+$/;

let fullnamePass = false;
let usernamePass = false;
let emailPass = false;
let passwordPass = false;
let passwordConfirmedPass = false;

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
                if (this.status === 200) {
                    emailWarn.innerText = "Email already taken!";
                    emailWarn.className = "signup_warn-show";
                    emailPass = false;
                } else if (!emailRegex.test(email)) {
                        emailWarn.innerText = "Invalid email!";
                        emailWarn.className = "signup_warn-show";
                        emailPass = false;
                } else {
                    emailWarn.innerText = "";
                    emailWarn.className = "signup_warn-hide";
                    emailPass = true;
                }
            }
        }
    }, DEBOUNCE_TIMEOUT)
);

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
                if (this.status === 200) {
                    usernameWarn.innerText = "Username already taken!";
                    usernameWarn.className = "signup_warn-show";
                    usernamePass = false;
                } else if (!usernameRegex.test(username)) {
                    usernameWarn.innerText = "Invalid username!";
                    usernameWarn.className = "signup_warn-show";
                    usernamePass = false;
                } else {
                    console.log("here")
                    usernameWarn.innerText = "";
                    usernameWarn.className = "signup_warn-hide";
                    usernamePass = true;
                }
            }
        }
        console.log(usernamePass)
        
    }, DEBOUNCE_TIMEOUT)
);

fullnameInput.addEventListener("keyup", debounce(() => {
        const fullname = fullnameInput.value   

        if (!fullnameRegex.test(fullname)) {
            fullnameWarn.innerText = "Invalid fullname!";
            fullnameWarn.className = "signup_warn-show";
            fullnamePass = false;
        } else {
            fullnameWarn.innerText = "";
            fullnameWarn.className = "signup_warn-hide";
            fullnamePass = true;
        }        
    }, DEBOUNCE_TIMEOUT)
);

passwordInput.addEventListener("keyup", debounce(() => {
        const password = passwordInput.value   
        const passwordConfirmed = secondPassword.value   

        if (!passwordRegex.test(password)) {
            passwordWarn.innerText = "Invalid password!"
            passwordWarn.className = "signup_warn-show";
            passwordPass = false;
        } else {
            passwordWarn.innerText = "";
            passwordWarn.className = "signup_warn-hide";
            passwordPass = true;
        }

        if (password !== passwordConfirmed) {
            secondPasswordWarn.innerText = "Confirmed password doesn't match!";
            secondPasswordWarn.className = "signup_warn-show";
            passwordConfirmedPass = false;
        } else {
            secondPasswordWarn.innerText = "";
            secondPasswordWarn.className = "signup_warn-hide";
            passwordConfirmedPass = true;
        }

        
    }, DEBOUNCE_TIMEOUT)
);


secondPassword.addEventListener("keyup", debounce(() => {
        const password = passwordInput.value   
        const passwordConfirmed = secondPassword.value   

        if (password !== passwordConfirmed) {
            secondPasswordWarn.innerText = "Confirmed password doesn't match!";
            secondPasswordWarn.className = "signup_warn-show";
            passwordConfirmedPass = false;
        } else {
            secondPasswordWarn.innerText = "";
            secondPasswordWarn.className = "signup_warn-hide";
            passwordConfirmedPass = true;
        }

        
    }, DEBOUNCE_TIMEOUT)
);

signupForm && signupForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const email = emailInput.value;
    const username = usernameInput.value;
    const fullname = fullnameInput.value;
    const password = passwordInput.value;

    if (!emailPass) {
        e.preventDefault();
        emailWarn.innerText = "Before proceeding, please provide a valid email first";
        emailWarn.className = "signup_warn-show";
    } else {
        emailWarn.className = "signup_warn-hide";
    }

    if (!usernamePass) {
        e.preventDefault();
        usernameWarn.innerText = "Before proceeding, please provide a valid username first";
        usernameWarn.className = "signup_warn-show";
    } else {
        usernameWarn.className = "signup_warn-hide";
    }

    if (!passwordPass) {
        e.preventDefault();
        passwordWarn.innerText = "Before proceeding, please provide a valid password first";
        passwordWarn.className = "signup_warn-show";
    } else {
        passwordWarn.className = "signup_warn-hide";
    }

    if (!passwordConfirmedPass) {
        e.preventDefault();
        secondPasswordWarn.innerText = "Confirmed password doesn't match!";
        secondPasswordWarn.className = "signup_warn-show";
    } else {
        secondPasswordWarn.className = "signup_warn-hide";
    }

    if (!emailPass || !usernamePass || !fullnamePass || !passwordPass || !passwordConfirmedPass) {
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/user/signup");

    const formData = new FormData();

    formData.append("email", email);
    formData.append("username", username);
    formData.append("fullname", fullname);
    formData.append("password", password);
    formData.append("csrf_token", CSRF_TOKEN);

    xhr.send(formData);
    xhr.onreadystatechange = function () {
        if (this.readyState == XMLHttpRequest.DONE) {
            if (this.status === 201) {
                const data = JSON.parse(this.responseText);
                location.replace(data.redirect_url);
            }
        }
    }

})