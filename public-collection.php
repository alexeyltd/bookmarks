<?php require 'templates/header.php'; require 'templates/nav.php';
if(empty($collection))
{
    echo '<script>window.location.href = "/";</script>';
}
?>

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

<?php if($collection->is_public == true && $token->id != $collection->author_id && $collection->author_id == $_GET['author']): ?>

<div class="uk-section">
<div class="uk-container uk-container-large">

    <h2 style="margin-bottom:0" class="substr"><?php echo $collection->title ?></h2>
    <p style="font-size: 14px;margin-top:10px"><?php echo count(R::findAll('bookmarks', 'collection_id = ?', [$_GET['id']])) ?> links</p>

</div>
</div>

<div class="uk-section uk-section-small">
<div class="uk-container uk-container-large">
    
    <br/>
    
    <?php foreach($bookmarksPublic as $bookmarkAll): ?>
    <?php if($bookmarkAll->collection_id == $collection->id): ?>
    
    <div uk-grid>
        <div class="uk-width-expand substr"><a href="<?php echo $bookmarkAll->link ?>" style="color:#000 !important" target="_blank"><?php echo $bookmarkAll->name ?></a></div>
        <div class="uk-width-auto">
        </div>
    </div>
    
    <hr/>
    
    <?php endif; ?>
    <?php endforeach; ?>
    
</div>
</div>

<?php elseif(($collection->is_public == true || $collection->is_public == false) && $token->id == $collection->author_id): ?>
<script>window.location.href = "collection?id=<?php echo $_GET['id'] ?>";</script>
<?php else: ?>
<div class="uk-section">
<div class="uk-container uk-container-large">
    <div class="uk-alert-danger" uk-alert>
        <p>Error. The collection is either private or does not exist.</p>
    </div>
</div>
</div>

<?php endif; ?>