<?php require 'templates/header.php' ?>
<div style="display:flex;justify-content:center;align-items:center;min-height:100vh">
<div class="uk-text-center">
    
    <?php if($successMsg) : ?>
    
    <div class="uk-alert-primary" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><?php echo $successMsg ?></p>
    </div>
    
    <?php endif; ?>
    
    <img data-src="assets/letter.png" class="uk-align-center" uk-img>
    <!--<h2>Verification me</h2>-->
    
    <p>A verification email has been sent to<br/><b><?php echo htmlspecialchars($_GET['mail'], ENT_QUOTES); ?></b>. Please click on the<br/>confirmation link in the email to activate your account.</p>
    
        <form method="POST" action="" class="uk-form-stacked" style="margin:0 auto">
        
            <div class="uk-margin">
                <a class="uk-button uk-button-default" href="/" style="width:100%">I’am veryfied</a>
            </div>
        
            <input type="hidden" name="login" value="<?php echo htmlspecialchars($_GET['mail'], ENT_QUOTES); ?>">
            <button style="border:none;background:rgba(0,0,0, 0);font-size:16px;cursor:pointer;color:#6e58ff" type="submit" name="resend-email">Resend verification email</button>
        
        </form>
</div>
</div>