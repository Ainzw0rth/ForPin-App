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
                    <p class=text-1-normal>Login to <span class="forpin">ForPin.</span></p>
                </div>
            </div>

            <form class="login-form">

                <div class="login-form-section">

                    <label for="username" class=text-1-normal>Username</label>
                    <input type="text" placeholder="Username" id="username" name="username" class="input-login">
                    <p id="username-warn" class="warn-hide"></p>

                    <label for="password" class=text-1-normal>Password</label>
                    <input type="password" placeholder="Password" id="password" name="password" class="input-login">
                    <p id="password-warn" class="warn-hide"></p>
                    
                </div>
                
                <div class="flex justify-center mt-40">
                    <p id="login-warn" class="warn-hide">Wrong username/password</p>
                </div>
                <div class="flex justify-center mt-40">
                    <button type="submit" name="login" value="" class="login-button" id="login">Login</button>
                </div>
            </form>
        </div>
</div>