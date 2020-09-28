<?php require 'templates/header.php'; require 'templates/nav.php';
if(empty($profile))
{
    echo '<script>window.location.href = "/";</script>';
}
?>

<div class="uk-section">
<div class="uk-container uk-container-xsmall">

<?php if($_GET['result'] == 'success'): ?>
<div class="uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Successful subscription.</p>
</div>
<?php elseif($_GET['result'] == 'signed'): ?>
<div class="uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>You are already subscribed to this account.</p>
</div>
<?php elseif($_GET['result'] == 'unsubscribe'): ?>
<div class="uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Successful unsubscription.</p>
</div>
<?php endif ?>
    
<div uk-grid>
    <div class="uk-width-auto">
        <div style="background:#C4C4C4;width:120px;height:120px;border-radius:50%;display:flex;justify-content:center;align-items:center">
            <img data-src="assets/person.png" uk-img>
        </div>
    </div>
    <div class="uk-width-expand">
        <div style="display:flex;align-items:center">
            <h3 style="margin-bottom:0;font-weight: 600;"><?php if(empty($profile->name)) { echo 'id' . $profile->id; } else { echo $profile->name; } ?></h3>
            <?php if($token->id == $profile->id): ?>
            <a href="edit-profile" class="uk-button" style="background:rgba(0,0,0, 0);border:1px solid #000;margin-left:20px;color:#000 !important">
                <img data-src="assets/edit.png" style="margin-right:5px" uk-img>Edit profile
            </a>
            
            <a style="cursor:pointer;margin:20px 0px" class="copy-to-clipboard" data-clipboard-text="https://<?php echo $domain . '/' . 'profile?id=' . $_GET['id'] ?>">
                <button style="cursor:pointer;border:none;background:rgba(0,0,0, 0);font-size:16px;outline:none !important" onclick="javascript:xloader()">
                    <span uk-icon="social" style="margin-left:20px"></span>
                </button>
            </a>
            <?php endif; ?>
        </div>
        
        <?php if($token->id == $profile->id): ?>
        <p style="margin-top:10px"><?php echo $profile->login ?></p>
        
        <p class="uk-text-emphasis">Subscribers: <?php echo R::count('subscribe', 'subscription_id = ?', [$profile->id]) ?></p>
        
        <?php else: ?>
        <br/>
        <div style="display:flex">
        <?php if($checkGlobalSubscribe): ?>
        <form action="" method="POST">
            <input type="hidden" name="sub_id" value="<?php echo $checkGlobalSubscribe->id ?>">
            <button class="uk-button uk-button-default" type="submit" name="unsubscribe">Unsubscribe</button>
        </form>
        <?php else: ?>
        <a href="#modal-subscribe" uk-toggle class="uk-button uk-button-default">Subscribe</a>
        <?php endif; ?>
        
        <a style="cursor:pointer;margin:10px 0px" class="copy-to-clipboard" data-clipboard-text="https://<?php echo $domain . '/' . 'profile?id=' . $_GET['id'] ?>">
            <button style="cursor:pointer;border:none;background:rgba(0,0,0, 0);font-size:16px;outline:none !important" onclick="javascript:xloader()">
                <span uk-icon="social" style="margin-left:20px"></span>
            </button>
        </a>
        </div>
        <?php endif; ?>
        
    </div>
</div>
    
</div>
</div>

<!--<div class="uk-section">-->
<div class="uk-container uk-container-large">
<div class="uk-child-width-1-5@m" uk-grid>
    
    <?php foreach($profileCollections as $collection): ?>
    
    <div>
        <div style="position:relative;max-width:208px;margin:0 auto">
        <a href="public-collection?id=<?php echo $collection->id ?>&author=<?php echo $_GET['id'] ?>">
        <div style="position:absolute;left:30px;top:10px;right:30px;height:144px;">
            <div style="display:flex;align-items:center;height:144px;">
                <div style="width:100%" class="substr">
                    <span style="font-weight: bold; font-size: 14px;color:#000"><?php echo $collection->title ?></span>
                    <br/>
                    <span style="font-weight: normal;font-size: 12px;color:#232323"><?php echo count(R::findAll('bookmarks', 'collection_id = ?', [$collection->id])) ?> links</span>
                </div>
            </div>
        </div>
            <svg width="208" height="154" viewBox="0 0 208 154" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 14.5455C0 6.51222 6.51222 0 14.5455 0H50.3548C55.022 0 59.3849 2.31606 62 6.18182C64.6151 10.0476 68.978 12.3636 73.6452 12.3636H193.455C201.488 12.3636 208 18.8759 208 26.9091V138.545C208 146.579 201.488 153.091 193.455 153.091H14.5455C6.51222 153.091 0 146.579 0 138.545V14.5455Z" fill="<?php echo $collection->color ?>"/>
            </svg>
        </a>
        </div>
    </div>
    
    <?php endforeach; ?>
    
</div>
    
</div>
<!--</div>-->

<!--Modal Subscrube-->
<div id="modal-subscribe" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" style="border-radius: 12px;">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        
        <h2><?php if(empty($profile->name)) { echo 'id' . $profile->id; } else { echo $profile->name; } ?> newsletter</h2>

        <form action="" method="POST">
            
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Email</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="email" name="email" value="<?php echo $token->login ?>">
            </div>
        </div>

        <div class="uk-margin">
            <p style="color: #9CA6BA;">If you wish to receive our newsletter please tick the box below:</p>
        </div>

        <div class="uk-margin">
            <label style="font-size: 11px;"><input class="uk-checkbox" type="checkbox" required> I agree to my personal data being stored and processed in order to receive personalised emails in accordance with the <a href="">Privacy Policy</a>. I can withdraw my consent at any time.</label>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-default" style="width:100%" type="submit" name="subscribe">Subscribe</button>
        </div>
        
        </form>
    
    </div>
</div>

<div id="xloader" style="position:fixed;bottom:10px;width:100%;display:none;left:0;">
    <div style="width:79%;margin:0 auto">
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Link successfully copied to the clipboard.</p>
        </div>
    </div>
</div>

<script>
// Open Loader
function xloader() {
    document.getElementById("xloader").style.display = "inline";
}
</script>

<script>
var clip = new Clipboard('.copy-to-clipboard');
</script>