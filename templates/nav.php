<?php if($token): ?>
<nav class="uk-navbar-container" style="background:rgba(0,0,0, 0);">
    <div class="uk-container uk-container-large">
        <div uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="/" class="logo" style="font-size:18px;margin-right:90px">
                        <img data-src="assets/logo.png" style="height:19px" uk-img>
                    </a>
                </li>
                <li><a href="/" style="text-transform:none;font-size:16px;color:#373640;font-weight:100"
                <?php if($_SERVER['PHP_SELF'] == '/index.php' || $_SERVER['PHP_SELF'] == '/list.php'): ?>class="nav-hover-active" <?php endif; ?>
                class="nav-hover">Bookmarks</a></li>
                <li><a href="collections" style="text-transform:none;font-size:16px;color:#373640;font-weight:100"
                <?php if($_SERVER['PHP_SELF'] == '/collections.php' || $_SERVER['PHP_SELF'] == '/collection.php'): ?>class="nav-hover-active" <?php endif; ?>
                class="nav-hover">Collections</a></li>
                <li><a href="archive" style="text-transform:none;font-size:16px;color:#373640;font-weight:100"
                <?php if($_SERVER['PHP_SELF'] == '/archive.php'): ?>class="nav-hover-active" <?php endif; ?>
                class="nav-hover">Archive</a></li>
                <li><a href="suggest-feature" style="text-transform:none;font-size:16px;color:#373640;font-weight:100"
                <?php if($_SERVER['PHP_SELF'] == '/suggest-feature.php'): ?>class="nav-hover-active" <?php endif; ?>
                class="nav-hover">Suggest feature</a></li>
                <li><a href="upgrade" style="text-transform:none;font-size:16px;color:#373640;font-weight:100"
               <?php if($_SERVER['PHP_SELF'] == '/upgrade.php'): ?>class="nav-hover-active" <?php endif; ?>
                class="nav-hover">Upgrade</a></li>

            </ul>
        </div>

        <div class="uk-navbar-right">
            <a href="setting" class="uk-button uk-button-primary" style="font-size: 11px;background:rgba(0,0,0, 0);border: 1px solid #6E58FF; text-transform:none; box-sizing: border-box; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.05); border-radius: 20px;color:#51A2FA">
                <img data-src="assets/bell.png" uk-img> Your next drop will arrive at
                <?php echo Time::timezone($token) ?>
            </a>
            
            <div style="margin:0px 15px"></div>
            <a href="profile?id=<?php echo $token->id ?>"><img data-src="assets/Avatar.png" uk-img></a>
            <div style="margin:0px 10px"></div>
            
            <button class="dropdown-nav" style="cursor:pointer;border:none;background:rgba(0,0,0, 0);outline:none !important" type="button"><span style="color:#000" uk-icon="icon: more"></span></button>
            <div uk-dropdown="mode: click">
                <ul class="uk-nav uk-dropdown-nav">
                    <li><a href="setting" style="color:#000 !important"><img data-src="assets/nav_settings.png" uk-img> &nbsp; Setting</a></li>
                    <li><a href="faq" style="color:#000 !important"><img data-src="assets/nav_message.png" uk-img> &nbsp; FAQ</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="#" style="color:#000 !important"><img data-src="assets/nav_logout.png" uk-img> &nbsp; Logout</a></li>
                </ul>
            </div>
            
        </div>

        </div>
    </div>
</nav>
<?php else: ?>
<nav class="uk-navbar-container" style="background:rgba(0,0,0, 0);">
    <div class="uk-container uk-container-large">
        <div uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="/" class="logo" style="font-size:18px;margin-right:90px">
                        <img data-src="assets/logo.png" style="height:19px" uk-img>
                    </a>
                </li>
            </ul>
        </div>

        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="login" style="text-transform:none;color:#000 !important">Login</a>
                </li>
                <li>
                    <a href="signup"><button class="uk-button uk-button-default">Sign up</button></a>
                </li>
            </ul>
        </div>

        </div>
    </div>
</nav>
<?php endif; ?>

<div style="width:100%;height:20px;background:#fcfcfc"></div>