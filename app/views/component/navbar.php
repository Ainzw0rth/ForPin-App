<div class="topnav">
    <div class="logo_section">
        <button class="logo">
            <img src="<?= BASE_URL; ?>/public/images/logo.png" class="app-logo">
        </button>
        <div class="nav_buttons_container">
            <a href="<?= BASE_URL; ?>/home">
                <button class="home-button">Home</button>
            </a>
            <a href="<?= BASE_URL; ?>/create">
                <button class="post-button">Post</button>
            </a>
            </div>
    </div>
    <div class="search_section" id="searchsection">
        <form action="" class="search-bar" id="search-input">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="search_symbol">
                    <circle cx="11" cy="11" r="7" stroke="#33363F" stroke-width="2"/>
                    <path d="M20 20L17 17" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <input type="text" placeholder="Search.." id="searchbox" class="search-box">
        </form>
        <div class="input-box" id="inputbox">
            <div class="filter-sort">
                <h2>Filter</h2>
                <div class="expandable">
                    <div class="filter_category">
                        <h3>Category</h3>
                        <div>
                            <select name="category" id="category" class="filter-dropdown">
                                <option value="0">- choose category -</option>
                                <option value="cats">Cats</option>
                                <option value="dogs">Dogs</option>
                            </select>
                        </div>
                    </div>
                    <div class="uploaded">
                        <h3>Uploaded</h3>
                        <div class="filter-radio"> 
                            <input type="radio" name="filter-value" value="0" checked>Don't filter
                            <br>
                            <input type="radio" name="filter-value" value="1">Today
                            <br>
                            <input type="radio" name="filter-value" value="3">Last 3 days
                            <br>
                            <input type="radio" name="filter-value" value="7">This Week
                            <br>
                            <input type="radio" name="filter-value" value="30">This Month
                            <br>
                            <input type="radio" name="filter-value" value="365">This Year
                        </div>
                    </div>
                </div>
                <div class="expandable2">
                    <div class="sorting">
                        <h2>Sort</h2>
                        <div class="sort-radio"> 
                            <input type="radio" name="sort-value" value="0" checked>Don't sort
                            <br>
                            <input type="radio" name="sort-value" value="1">Upload Date
                            <br>
                            <input type="radio" name="sort-value" value="3">Likes
                        </div>
                    </div>

                    <button class="search_button">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="profile_section">
        <button class="profile-button">
            <img src="https://i.ibb.co/5rjj8n2/Cat-Medley-Cuteness-Galore-Funnies-Rescues-And-Appreciation.png" class="logo"></img>
        </button>
        <div class="settings-menu">
            <button class="settings-dropdown">
                <img src="<?= BASE_URL; ?>/public/images/dropdown_sign.png" class="dropdown_symbol" id="dropdownsymbol">
            </button>
            <div id="menus-from-dropdown" class="menusdropdown">
                <a href="#settings">Settings</a>
                <a href="#logout">Log out</a>
            </div>
        </div>
    </div>
</div>