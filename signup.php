<?php require 'templates/header.php' ?>
<div class="uk-child-width-1-2@m uk-text-center" uk-grid>
    <div style="min-height:100vh;background:#FCFCFF">
        
        <div class="uk-section">
            <img data-src="assets/logo.png" uk-img>
        </div>
        
        <div class="uk-section" style="padding-bottom:0">
            <h1>All you need in<br/>one place</h1>
        </div>
        
        <div class="uk-section" style="padding-top:20px">
            <img data-src="assets/laptop.png" uk-img>
        </div>
        
    </div>
    <div style="min-height:100vh;">
        
        <div class="uk-section uk-section-large" style="padding-bottom:20px">
            <h2><img data-src="assets/bookmark.png" style="height:25px" uk-img> Create an account</h2>
        </div>
        
        <div class="uk-section uk-text-left">
            <form method="POST" action="" class="uk-form-stacked uk-width-1-2" style="margin:0 auto">
                
            <?php if($errorMsg) : ?>
            
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p><?php echo $errorMsg ?></p>
            </div>
            
            <?php endif; ?>
            
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Your email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="login" id="form-stacked-text" type="text" placeholder="">
                    </div>
                </div>
            
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Your password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="password" id="form-stacked-text" type="password" placeholder="">
                    </div>
                </div>
            
                <div class="uk-margin">
                    <button class="uk-button uk-button-default" type="submit" name="signup" style="width:100%">Sign up</button>
                </div>
            
            </form>
            
            <p class="uk-text-muted uk-text-center">
                Already have an account? <a href="login">Sign in</a>
            </p>
        </div>
        
    </div>
</div>