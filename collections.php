<?php require 'templates/header.php'; require 'templates/nav.php' ?>

<style>
/* HIDE RADIO */
.template[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
.template[type=radio] + img {
  cursor: pointer;
  border-radius:50px !important;
}

/* CHECKED STYLES */
.template[type=radio]:checked + img {
  outline: 2px solid #000;
  border-radius:50px !important;
}
</style>

<div class="uk-section">
<div class="uk-container uk-container-large">
    

<div class="uk-child-width-1-2@m" uk-grid>
    <div>
        <h2>Collections</h2>
    </div>
    <div>
        <button class="uk-button uk-align-right" style="background:#34CC68;border-radius: 3px;font-size:16px;color:#fff" uk-toggle="target: #modal-add-collection">Create new collection</button>
    </div>
</div>
    

<div class="uk-child-width-1-5@m" uk-grid>
    
    <?php foreach($collections as $collection): ?>
    
    <div>
        <div style="position:relative;max-width:208px;margin:0 auto">
        <a href="collection?id=<?php echo $collection->id ?>">
        <div style="position:absolute;right:0">
            <?php if($collection->is_public == true): ?>
            <img data-src="assets/eye-new.png" style="border-radius:50%;padding:5px;background: #DFE3FC;margin-top:30px;margin-right:20px" uk-img>
            <?php else: ?>
            <img data-src="assets/eye-off.png" style="border-radius:50%;padding:5px;background: #8C8C8C;margin-top:30px;margin-right:20px" uk-img>
            <?php endif; ?>
        </div>
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
</div>

<!--Modal Add-->
<div id="modal-add-collection" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" style="border-radius: 12px;">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        
        <h2>Add collection</h2>
        
        <form action="" method="POST">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Collection name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="text" name="title" value="">
            </div>
        </div>
        
        <!--<p class="uk-text-emphasis" style="font-size:14px">Collection available to subscribers</p>-->
        
        <!--<img data-src="assets/Rectangle-7.png" uk-img>-->
        <label><input class="uk-checkbox" name="is_public" type="checkbox"> Collection available to subscribers</label>
        
        <p class="uk-text-emphasis" style="font-size:14px">Choose color</p>
            
        <div class="uk-margin" style="display:flex;">
            <div>
                <label>
                  <input type="radio" name="color" value="#FFFBDF" class="template" checked>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/FFFBDF/FFFBDF&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#DAFFFE" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/DAFFFE/DAFFFE&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#FFDBEB" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/FFDBEB/FFDBEB&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#E0DBFF" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/E0DBFF/E0DBFF&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#EEEEEE" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/EEEEEE/EEEEEE&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#C2FFC8" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/C2FFC8/C2FFC8&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#FFC6C1" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/FFC6C1/FFC6C1&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#D1ECFF" class="template">
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/D1ECFF/D1ECFF&text=b">
                </label>
            </div>
        </div>
        
        <button class="uk-button uk-button-primary" type="submit" name="add-collection">Save</button>
        
        </form>
        
        <!--<div style="display:flex">-->
        <!--    <div style="width:32px;height:32px;background:#FFFBDF;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#DAFFFE;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#FFDBEB;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#E0DBFF;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#EEEEEE;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#C2FFC8;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#FFC6C1;border-radius:50px;margin-right:20px"></div>-->
        <!--    <div style="width:32px;height:32px;background:#D1ECFF;border-radius:50px;margin-right:20px"></div>-->
        <!--</div>-->
    
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