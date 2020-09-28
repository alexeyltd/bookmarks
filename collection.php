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

<?php if($token->id == $collection->author_id): ?>

<div class="uk-section">
<div class="uk-container uk-container-large">
    
    <div uk-grid>
        <div class="uk-width-expand">
            <h2 style="margin-bottom:0" class="substr"><?php echo $collection->title ?></h2>
            <p style="font-size: 14px;margin-top:10px"><?php echo count(R::findAll('bookmarks', 'collection_id = ?', [$_GET['id']])) ?> links</p>
        </div>
        <div class="uk-width-auto">
            <button class="uk-button" uk-toggle="target: #modal-edit" style="background:rgba(0,0,0, 0);border:1px solid #000"><img data-src="assets/edit.png" style="margin-right:5px" uk-img>Edit collection</button>
        </div>
        <div class="uk-width-auto">
            <button class="uk-button" uk-toggle="target: #modal-delete" style="background:rgba(0,0,0, 0);border:1px solid #000"><img data-src="assets/trash-2.png" style="margin-right:5px" uk-img>Delete collection</button>
        </div>
    </div>
    
</div>
</div>

<div class="uk-section uk-section-small">
<div class="uk-container uk-container-large">
    
    <br/>
    
    <?php foreach($bookmarksAll as $bookmarkAll): ?>
    <?php if($bookmarkAll->collection_id == $collection->id): ?>
    
    <div uk-grid>
        <div class="uk-width-expand substr"><a href="<?php echo $bookmarkAll->link ?>" style="color:#000 !important" target="_blank"><?php echo $bookmarkAll->name ?></a></div>
        <div class="uk-width-auto">
        </div>
        <div class="uk-width-auto">
            <img data-src="assets/trash-2.svg" uk-img>
        </div>
    </div>
    
    <hr/>
    
    <?php endif; ?>
    <?php endforeach; ?>
    
</div>
</div>

<!--Modal Edit-->
<div id="modal-edit" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" style="border-radius: 12px;">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        
        <h2>Edit collection</h2>

        <form action="" method="POST">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Collection name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="text" name="title" value="<?php echo $collection->title ?>">
            </div>
        </div>
        
        <!--<p class="uk-text-emphasis" style="font-size:14px">Collection available to subscribers</p>-->
        
        <!--<img data-src="assets/Rectangle-7.png" uk-img>-->
        <label><input class="uk-checkbox" name="is_public" type="checkbox" <?php if($collection->is_public == true) { echo 'checked'; } ?>> Collection available to subscribers</label>
        
        <p class="uk-text-emphasis" style="font-size:14px">Choose color</p>
            
        <div class="uk-margin" style="display:flex;">
            <div>
                <label>
                  <input type="radio" name="color" value="#FFFBDF" class="template" <?php if($collection->color == '#FFFBDF') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/FFFBDF/FFFBDF&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#DAFFFE" class="template" <?php if($collection->color == '#DAFFFE') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/DAFFFE/DAFFFE&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#FFDBEB" class="template" <?php if($collection->color == '#FFDBEB') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/FFDBEB/FFDBEB&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#E0DBFF" class="template" <?php if($collection->color == '#E0DBFF') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/E0DBFF/E0DBFF&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#EEEEEE" class="template" <?php if($collection->color == '#EEEEEE') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/EEEEEE/EEEEEE&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#C2FFC8" class="template" <?php if($collection->color == '#C2FFC8') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/C2FFC8/C2FFC8&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#FFC6C1" class="template" <?php if($collection->color == '#FFC6C1') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/FFC6C1/FFC6C1&text=b">
                </label>
            </div>
            <div>
                <label>
                  <input type="radio" name="color" value="#D1ECFF" class="template" <?php if($collection->color == '#D1ECFF') { echo 'checked'; } ?>>
                  <img style="border-radius:50px;margin-right:20px" src="http://placehold.it/32x32/D1ECFF/D1ECFF&text=b">
                </label>
            </div>
        </div>
        
        <button class="uk-button uk-button-primary" type="submit" name="edit-collection">Save</button>
        
        </form>
    
    </div>
</div>

<!--Modal Delete-->
<div id="modal-delete" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" style="border-radius: 12px;padding-top:50px;padding-bottom:50px">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        
        <h2>Are you sure to delete <a href=""><?php echo $collection->title ?></a></h2>
        
        <div class="uk-child-width-1-2@m" uk-grid>
            <div>
                <form action="" method="post"><button type="submit" name="delete-collection" class="uk-button uk-button-default" style="width:100%">Yes</button></form>
            </div>
            <div>
                <button class="uk-button" style="background:rgba(0,0,0, 0);border:1px solid #000;color:#000;width:100%">No</button>
            </div>
        </div>
    
    </div>
</div>

<?php endif; ?>