<?php require 'templates/header.php'; require 'templates/nav.php' ?>

<div class="uk-section">
<div class="uk-container uk-container-small">
    
<div uk-grid>
    <div class="uk-width-auto">
        <img data-src="assets/photo.jpg" uk-img>
    </div>
    <div class="uk-width-expand" style="display:flex;align-items:center">
        <!--<div>-->
            <button class="uk-button uk-button-default" style="margin-right:20px">Update new picture</button>
            <button class="uk-button" style="background:rgba(0,0,0, 0);border:1px solid #000;color:#000">Delete</button>
        <!--</div>-->
    </div>
</div>


<form action="" method="POST" class="uk-form-stacked" style="margin-top:50px">

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Name</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="name" id="form-stacked-text" type="text" value="<?php echo $token->name ?>" placeholder="<?php if(empty($token->name)) { echo 'id' . $token->id; } ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Email</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="login" id="form-stacked-text" type="text" value="<?php echo $token->login ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Profile link</label>
        <div class="uk-form-controls" style="display:flex;align-items:center">
            <span class="uk-text-muted">https://<?php echo $_SERVER['SERVER_NAME'] ?>/</span> <input class="uk-input" name="url" id="form-stacked-text" type="text" value="<?php echo $token->url ?>" placeholder="<?php if(empty($token->url)) { echo 'profile?id=' . $token->id; } ?>">
        </div>
    </div>
    
    <div class="uk-margin">
        <button class="uk-button uk-button-default" type="submit" name="edit-profile" style="width:100%">Save changes</button>
    </div>

</form>
    
</div>
</div>

<div class="uk-section uk-section-small">
<div class="uk-container uk-container-small">
    
    <h3>Change password</h3>

<form class="uk-form-stacked">

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Old password</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text" type="text">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">New password</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text" type="text">
        </div>
    </div>
    
    <div class="uk-margin">
        <button class="uk-button uk-button-default" style="width:100%">Change password</button>
    </div>

</form>

</div>
</div>