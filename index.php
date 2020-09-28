<?php require 'templates/header.php'; require 'templates/nav.php' ?>
<div class="uk-section">
<div class="uk-container uk-container-large">

    <h2>Bookmarks</h2>
    

<div class="uk-child-width-1-2@m" uk-grid>
    <div>
        <div class="uk-margin">
            <div class="uk-inline">
            <img style="position:absolute;padding-top:12px;padding-left:17px" data-src="assets/link.png" uk-img>

            <?php if(isset($_POST['add-bookmark'])): ?>
                <form action="" method="POST">

                <?php if(!empty($query['title']) || !empty($query['description'])): ?>
                <button class="uk-form-icon uk-form-icon-flip" type="submit" name="save-bookmark" style="outline:none;cursor:pointer;border:none;background:#34CC68;margin:6px;border-radius: 3px;color:#fff !important;width:65px">Save</button>
                <input class="uk-input" readonly name="link" style="background:#F2F3F5;padding-left:40px;width:640px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" type="text"
                value="<?php echo $_POST['link']; ?>"
                >
                <input type="hidden" name="name" value="<?php echo $query['title'] ?>">
                <input type="hidden" name="description" value="<?php echo $query['description'] ?>">
                <input type="hidden" name="image" value="<?php echo $query['image'] ?>">
                <input type="hidden" name="collection" id="collection"  value="">
                <?php else: ?>
                <button class="uk-form-icon uk-form-icon-flip" style="opacity:.6;outline:none;cursor:not-allowed;border:none;background:#34CC68;margin:6px;border-radius: 3px;color:#fff !important;width:65px">Save</button>
                <input class="uk-input" readonly name="link" style="background:#F2F3F5;padding-left:40px;width:640px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" type="text"
                value="<?php echo $_POST['link']; ?>"
                >
                <?php endif; ?>

                </form>
            <?php else: ?>
                <form action="" method="POST">
                    <button class="uk-form-icon uk-form-icon-flip" type="submit" name="add-bookmark" style="outline:none;background:#34CC68;margin:6px;border-radius: 3px;color:#fff !important" uk-icon="icon: plus"></button>
                <!--<a class="uk-form-icon uk-form-icon-flip" style="background:#34CC68;margin:6px;border-radius: 3px;color:#fff !important;width:65px" href="#">Save</a>-->
                <input class="uk-input" name="link" style="background:#F2F3F5;padding-left:40px;width:640px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" type="text"
                value="<?php if(isset($_POST['add-bookmark'])) { echo $_POST['link']; } ?>"
                >
                </form>
            <?php endif; ?>

            </div>
            <?php if(isset($_POST['add-bookmark'])): ?>
            <br/>
            <div style="border-radius: 3px;width:638px;background:#F2F3F5;position:relative;z-index:2;margin-top:-5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;">
                <br/>
                <div style="background:#fff;width:540px;margin:0 auto;padding:30px 40px;margin-top:0px">

                    <a href="/"><img data-src="assets/close.png" class="uk-align-right" style="margin-right:-14px" uk-img></a>

                    <?php if(!empty($query['title']) || !empty($query['description'])): ?>

                    <p class="uk-text-emphasis" style="font-size:14px"><?php echo $query['url'] ?></p>

                    <div style="width: 26px;height: 3px;background: #6E58FF;"></div>


                    <div style="width:100%;margin:0 auto" uk-grid>
                        <div class="uk-width-expand" style="padding-left:0">
                            <h3 style="margin-top:0" class="substr"><?php echo $query['title'] ?></h3>
                        </div>
                        <div class="uk-width-auto" style="display:flex;align-items:center">
                            <button style="border:none" class="button-folder" style="" type="button"></button>
                            <div uk-dropdown="mode: click;pos: right-top" style="width:529px;padding-bottom:0">
                            <?php foreach($collections as $collection): ?>
                            <div style="margin-top:0;margin-bottom:20px" uk-grid>
                                <div class="uk-width-expand substr">
                                    <?php echo $collection->title ?>
                                </div>
                                <div class="uk-width-auto">
                                    <label><input class="uk-radio" type="radio" name="collection" onchange="document.getElementById('collection').value = this.value" value="<?php echo $collection->id ?>" <?php if($bookmark->collection_id == $collection->id) { echo 'checked'; } ?>></label><br>

                                </div>
                            </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <p style="font-size:14px"><?php echo $query['description'] ?></p>

                    <img data-src="<?php echo $query['image'] ?>" style="width:100%" uk-img>

                    <?php else: ?>
                    <p class="uk-text-danger">Domain is no valid or website not found.</p>
                    <?php endif; ?>

                </div>
                <br/>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div style="display:flex;justify-content:flex-end">
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: search"></span>
                <input style="width: 291px;" class="uk-input" type="text" placeholder="Search">
            </div>
        </div>
    </div>
</div>

</div>
</div>

<div class="uk-section uk-section-small">
<div class="uk-container uk-container-large">

    <?php if($bookmarks): ?>
    <?php foreach($bookmarks as $bookmark): ?>

    <div uk-grid>
        <div class="uk-width-expand"><a href="<?php echo $bookmark->link ?>" style="color:#000 !important" target="_blank"><?php echo $bookmark->name ?></a></div>
        <div class="uk-width-auto">
            <div class="uk-inline">
                <!--background:rgba(0,0,0, 0);-->
                <button style="border:none;cursor:pointer" class="button-folder" type="button"></button>
                <div uk-dropdown="mode: click;pos: left-top" style="width:529px;padding-bottom:0">

            <form action="" method="POST">
            <input type="hidden" name="bookmark" value="<?php echo $bookmark->id ?>">
            <?php foreach($collections as $collection): ?>
            <div style="margin-top:0;margin-bottom:0" uk-grid>
                <div class="uk-width-expand substr">
                    <?php echo $collection->title ?>
                </div>
                <div class="uk-width-auto">
                    <label><input class="uk-radio" type="radio" name="collection" value="<?php echo $collection->id ?>" <?php if($bookmark->collection_id == $collection->id) { echo 'checked'; } ?>></label><br>

                </div>
            </div>
            <?php endforeach; ?>
            <button class="uk-button uk-align-right" type="submit" name="change-collection">Save</button>
            </form>

                </div>
            </div>
        </div>
        <div class="uk-width-auto">
            <a href="#modal-delete-<?php echo $bookmark->id ?>" uk-toggle>
                <img data-src="assets/trash-2.svg" uk-img>
            </a>
        </div>
    </div>

    <hr/>

    <!--Modal Delete-->
    <div id="modal-delete-<?php echo $bookmark->id ?>" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical substr" style="border-radius: 12px;padding-top:50px;padding-bottom:50px">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <h2 style="margin-bottom:0">Are you sure to delete</h2>
            <a href="" style="margin-top:10px"><?php echo $bookmark->name ?></a>
            <br/><br/>
            <div class="uk-child-width-1-2@m" uk-grid>
                <div>
                    <form action="" method="POST">
                        <input type="hidden" name="link" value="<?php echo $bookmark->id ?>">
                        <button class="uk-button uk-button-default" type="submit" name="delete-bookmark" style="width:100%">Yes</button>
                    </form>
                </div>
                <div>
                    <button class="uk-button uk-modal-close" style="background:rgba(0,0,0, 0);border:1px solid #000;color:#000;width:100%">No</button>
                </div>
            </div>

        </div>
    </div>

    <?php endforeach; ?>

    <?php else: ?>
    <div style="display:flex;justify-content:center">
    <div>
        <img data-src="assets/Plus.png" class="uk-align-center" uk-img>
        <h1 style="font-weight: 600;">Add your first link here</h1>
        <p style="font-size:18px">After publishing your first link, you can set up a reminder</p>
        <button class="uk-button uk-button-default" type="submit" name="signin" style="width:100%">Lets start</button>
    </div>
    </div>
    <?php endif; ?>

</div>
</div>

<!--Modal Subscribe-->
<?php if($errorMsg == 'open pop-up'): ?>
<script>
    $(function() {
        var modal = UIkit.modal("#modal-subscribe");
        modal.show();
    });
</script>
<?php endif; ?>

<div id="modal-subscribe"class="uk-flex-top" uk-modal>
    <div style="border-radius: 12px !important;"  class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <h2>Subscribe to Linkmarky</h2>
        <p>You have the opportunity to add no more than <a href="">7 bookmarks</a>, if you need more, subscribe, and pay money dude.</p>

        <p style="line-height:3">
            And acess other great such features such us:
            <br/>
            <img data-src="assets/bookmark.png" uk-img>
            <b style="color:#000">Unlimited emails, bookmarks and collections guaranteed.</b>
            <br/>
            <img data-src="assets/bookmark.png" uk-img>
            <b style="color:#000">Schedule your email to send only on certain days.</b>
            <br/>
            <img data-src="assets/bookmark.png" uk-img>
            <b style="color:#000">Notify your subscribers what to read.</b>
        </p>

        <a href="upgrade" class="uk-button uk-button-default" type="submit" name="signin" style="width:100%">Subscribe</a>

    </div>
</div>
