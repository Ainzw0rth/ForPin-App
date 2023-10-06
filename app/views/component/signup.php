<div class="flex justify-center align-center">
    <div>
        <div class="top-section">
            <div class="flex justify-center">
                <img src="<?= BASE_URL ?>/public/images/logo.png" class="logo-2">
            </div>

            <div class="flex justify-center">
                <p class=title>Welcome to ForPin</p>
            </div>
            <div class="flex justify-center">
                <p class=text-1-normal>Sign up to <span class="forpin">Forpin.</span></p>
            </div>
        </div>
        
        <form class="signup-form">
            
            <div class="signup-form-section">
                <label for="email" class=text-1-normal>Email</label>
                <input type="text" placeholder="Email" id="email" name="email" class="input-login">
                <p id="email-warn" class="warn-hide"></p>
                
                <label for="username" class=text-1-normal>Username</label>
                <input type="text" placeholder="Email" id="username" name="username" class="input-login">
                <p id="username-warn"class="warn-hide"></p>
                
                <label for="fullname" class=text-1-normal>Fullname</label>
                <input type="text" placeholder="Fullname" id="fullname" name="fullname" class="input-login">
                <p id="fullname-warn" class="warn-hide"></p>
                
                <label for="password" class=text-1-normal class="warn-hide">Password</label>
                <input type="password" placeholder="Password" id="password" name="password" class="input-login">
                <p id="password-warn" class="warn-hide"></p>
                
                <label for="password2" class=text-1-normal>Confirm Password</label>
                <input type="password" placeholder="Confirm password" id="password2" name="password2" class="input-login">
                <p id="confirm-password-warn" class="warn-hide"></p>
            </div>

            <div class="flex justify-center mt-40">
                <button type="submit" name="signup" value="" class="login-button" id="signup">Sign Up</button>
            </div>
            
        </form>


</div>