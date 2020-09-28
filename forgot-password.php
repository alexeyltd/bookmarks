<?php require 'templates/header.php' ?>
<div style="display:flex;justify-content:center;align-items:center;min-height:100vh">
<div>
    <img data-src="assets/letter.png" class="uk-align-center" uk-img>
    <h2>Help us finding your account</h2>
        <form method="POST" action="" class="uk-form-stacked" style="margin:0 auto">
            
        <?php if($errorMsg) : ?>
        
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $errorMsg ?></p>
        </div>
        
        <?php elseif($successMsg) : ?>
        
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $successMsg ?></p>
        </div>
        
        <?php endif; ?>
        
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="login" id="form-stacked-text" type="text" placeholder="">
                </div>
            </div>
        
            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit" name="forgot-password" style="width:100%">Send reset email</button>
            </div>
        
        </form>
</div>
</div>