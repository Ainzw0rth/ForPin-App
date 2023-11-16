<div class="topnav" id="top-nav">
    <div class="logo_section">
        <button class="logo" onClick="location.href='<?= BASE_URL; ?>/home'">
            <img src="<?= BASE_URL; ?>/public/images/logo.png" class="app-logo" alt="ForPin Logo">
        </button>
        <div class="nav_buttons_container">
            <button class="home-button" onClick="location.href='<?= BASE_URL; ?>/home'">Home</button>
            <button class="post-button" onClick="location.href='<?= BASE_URL; ?>/create'">Post</button>
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
        <p id="search-warn" class="warn-hide"></p>      
        <div class="input-box" id="inputbox">
            <div class="filter-sort">
                <h2>Filter</h2>
                <div class="expandable">
                    <div class="filter_category">
                        <h3>Category</h3>
                        <div>
                            <select name="category" id="category" class="filter-dropdown">
                                <option value="0">- choose category -</option>
                            </select>
                        </div>
                    </div>
                    <div class="uploaded">
                        <h3>Uploaded</h3>
                        <div class="filter-radio"> 
                            <input type="radio" name="filter-value" value="0" checked> Don't filter
                            <br>
                            <input type="radio" name="filter-value" value="1"> Today
                            <br>
                            <input type="radio" name="filter-value" value="3"> Last 3 days
                            <br>
                            <input type="radio" name="filter-value" value="7"> This Week
                            <br>
                            <input type="radio" name="filter-value" value="30"> This Month
                            <br>
                            <input type="radio" name="filter-value" value="365"> This Year
                        </div>
                    </div>
                </div>
                <div class="expandable2">
                    <div class="sorting">
                        <h2>Sort</h2>
                        <div class="sort-radio"> 
                            <input type="radio" name="sort-value" value="0" checked> Don't sort
                            <br>
                            <input type="radio" name="sort-value" value="1"> Upload Date (Ascending)
                            <br>
                            <input type="radio" name="sort-value" value="2"> Upload Date (Descending)
                            <br>
                            <input type="radio" name="sort-value" value="3"> Likes (Ascending)
                            <br>
                            <input type="radio" name="sort-value" value="4"> Likes (Descending)
                        </div>
                    </div>

                    <button class="search_button" id="search_button">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="profile_section">
        <button class="profile-button" id="profile-button">
        </button>
        <div class="settings-menu">
            <button class="settings-dropdown">
                <img src="<?= BASE_URL; ?>/public/images/dropdown_sign.png" class="dropdown_symbol" id="dropdownsymbol" alt="dropdown symbol">
            </button>
            <div id="menus-from-dropdown" class="menusdropdown">
                <?php if ( $data['is_admin'] ) { ?> 
                    <a href="<?= BASE_URL ?>/settings">Settings</a>
                <?php } ?>     
                <a href="#" id="log-out">Log out</a>
                <?php if (!$data['premium_desc']) {?>
                    <a href="#" id="upgrade">Upgrade to Premium</a>
                <?php } else  {
                    if (isset($data['premium_desc']['status']) &&  $data['premium_desc']['status'] == 'ACCEPTED') { ?>
                            <p>A premium user <svg xmlns="http://www.w3.org/2000/svg" width="32" height="29" viewBox="0 0 32 29" fill="none">
                            <path d="M8.25004 27.0001H23.5278L27.6945 12.4167L20.75 15.889L15.8889 6.16675L11.0278 15.889L4.08337 12.4167L8.25004 27.0001Z" fill="#FFD233" stroke="#FFD233" stroke-width="2.77778" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.08333 12.4167C5.23393 12.4167 6.16667 11.4839 6.16667 10.3333C6.16667 9.18274 5.23393 8.25 4.08333 8.25C2.93274 8.25 2 9.18274 2 10.3333C2 11.4839 2.93274 12.4167 4.08333 12.4167Z" fill="#FFD233" stroke="#FFD233" stroke-width="2.77778"/>
                            <path d="M15.8889 6.16667C17.0395 6.16667 17.9722 5.23393 17.9722 4.08333C17.9722 2.93274 17.0395 2 15.8889 2C14.7383 2 13.8055 2.93274 13.8055 4.08333C13.8055 5.23393 14.7383 6.16667 15.8889 6.16667Z" fill="#FFD233" stroke="#FFD233" stroke-width="2.77778"/>
                            <path d="M27.6944 12.4167C28.845 12.4167 29.7778 11.4839 29.7778 10.3333C29.7778 9.18274 28.845 8.25 27.6944 8.25C26.5438 8.25 25.6111 9.18274 25.6111 10.3333C25.6111 11.4839 26.5438 12.4167 27.6944 12.4167Z" fill="#FFD233" stroke="#FFD233" stroke-width="2.77778"/>
                            </svg></p>
                        <?php }
                } ?>    
                </div>
        </div>
    </div>

</div>

<div id="request-sent-modal" class="modal-window">
    <div>
        <div class="request-sent-logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="76" viewBox="0 0 72 76" fill="none">
                <path d="M24.45 39.5128L31.05 46.4677L47.55 29.0806" stroke="#77D4F8" stroke-width="4.96774" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.5 7.65283C24.5144 4.59583 30.2069 2.99064 36 3.00004C54.2259 3.00004 69 18.5684 69 37.7742C69 56.98 54.2259 72.5484 36 72.5484C17.7741 72.5484 3 56.98 3 37.7742C3 31.4418 4.6071 25.4989 7.4154 20.3871" stroke="#77D4F8" stroke-width="4.96774" stroke-linecap="round"/>
            </svg>
        </div>
        <p class="text-question">Request sent.</p>
        <br>
        
        <div class="modal-button-section">
            <button onClick="location.href='#'" class="blue-button">Close</button>
        </div>

    </div>
</div>