<div class="topnav">
    <div class="flex align-center gap-15">
        <button class="logo">
            <img src="<?= BASE_URL ?>/public/images/logo.png" class="app-logo">
        </button>
        <p class="text-1">ForPin</p>
    </div>
    <div class="flex gap-10">
        <button class="normal-button" id="login-button" onClick="location.href='<?= BASE_URL; ?>/user/login'">
            Login
        </button>
        <button class="normal-button active" id="signup-button" onClick="location.href='<?= BASE_URL; ?>'">
            Sign up
        </button>
    </div> 
</div>