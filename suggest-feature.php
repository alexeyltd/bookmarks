<?php require 'templates/header.php'; require 'templates/nav.php' ?>
<div class="uk-section">
<div class="uk-container uk-container-large">

    <h2>Suggest feature</h2>

    <div class="uk-width-1-2 uk-margin-large">

        <?php if($successMsg): ?>
            <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p><?php echo $successMsg ?></p>
            </div>
        <?php endif ?>

        <form action="" method="POST" class="uk-form-stacked">

            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Subject</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="subject" id="form-stacked-text" type="text" placeholder="">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Message</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" name="message" rows="5" placeholder=""></textarea>
                </div>
            </div>

            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit" name="contact" style="width:100%">Contact us</button>
            </div>

        </form>

    </div>

</div>
</div>