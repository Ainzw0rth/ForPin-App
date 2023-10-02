const loginButton = document.getElementById("login-button");
const signupButton = document.getElementById("signup-button");

const loginComponent = document.getElementById("login-component");
const signupComponent = document.getElementById("signup-component");

loginButton.addEventListener("click", function() {
    
    loginButton.classList.add("active");
    signupButton.classList.remove("active");

    loginComponent.style.display = "block"
    signupComponent.style.display = "none";
})


signupButton.addEventListener("click", function() {
    
    signupButton.classList.add("active");
    loginButton.classList.remove("active");
    
    loginComponent.style.display = "none";
    signupComponent.style.display = "block";

})