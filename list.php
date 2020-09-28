<?php require 'templates/header.php'; require 'templates/nav.php' ?>

<div class="uk-section">
<div class="uk-container uk-container-large">
    
    <h2>Bookmarks</h2>
    

<div class="uk-child-width-1-2@m" uk-grid>
    <div>
        <div class="uk-margin">
            <div class="uk-inline">
            <img style="position:absolute;padding-top:12px;padding-left:17px" data-src="assets/link.png" uk-img>
                <a class="uk-form-icon uk-form-icon-flip" style="background:#34CC68;margin:6px;border-radius: 3px;color:#fff !important" href="#" uk-icon="icon: plus"></a>
                <input class="uk-input" style="background:#F2F3F5;padding-left:40px;width:640px" type="text">
            </div>
        </div>
    </div>
    <div style="display:flex;justify-content:flex-end">
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: search"></span>
                <input style="width: 291px;" class="uk-input" type="text" placeholder="Search">
                <!--<img style="position:absolute;padding-top:0px;padding-left:30px" data-src="assets/Soon.png" uk-img>-->
                <!--<img data-src="assets/EXport.png" uk-img>-->
            </div>
        </div>
    </div>
</div>
    
</div>
</div>

<div class="uk-section uk-section-small">
<div class="uk-container uk-container-large">
    
    <div style="display:flex">
        <div style="background: #FFFBDF; border-radius: 50px;padding:5px 10px;color:#F2BA51;margin:0 5px;font-size: 12px;">NEWS</div>
        <div style="background: #DAFFFE;; border-radius: 50px;padding:5px 10px;color:#2A827F;margin:0 5px;font-size: 12px;">GLOBAL TECH</div>
    </div>
    
    <br/>
    
    <div uk-grid>
        <div class="uk-width-expand">Gone phishing</div>
        <div class="uk-width-auto">
            <div class="uk-inline">
                <!--background:rgba(0,0,0, 0);-->
                <button style="border:none" class="button-folder" type="button"></button>
                <div uk-dropdown="mode: click;pos: left-top" style="width:529px;padding-bottom:0">
                    <!--1-->
                    <div style="margin-top:0;margin-bottom:0" uk-grid>
                        <div class="uk-width-expand">
                            <span style="font-size:15px">Collection 1, News and other stuff</span>
                        </div>
                        <div class="uk-width-auto uk-align-right">
                            <img style="margin-top:7px" data-src="assets/Rectangle.png" uk-img>
                        </div>
                    </div>     
                    <!--2-->
                    <div style="margin-top:0;margin-bottom:0" uk-grid>
                        <div class="uk-width-expand">
                            <span style="font-size:15px">Collection 1, News and other stuff</span>
                        </div>
                        <div class="uk-width-auto uk-align-right">
                            <img style="margin-top:7px" data-src="assets/Rectangle.png" uk-img>
                        </div>
                    </div>    
                    <!--3-->
                    <div style="margin-top:0;margin-bottom:0" uk-grid>
                        <div class="uk-width-expand">
                            <span style="font-size:15px">Collection 1, News and other stuff</span>
                        </div>
                        <div class="uk-width-auto uk-align-right">
                            <img style="margin-top:7px" data-src="assets/Rectangle.png" uk-img>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
        <div class="uk-width-auto">
            <img data-src="assets/trash-2.svg" uk-img>
        </div>
    </div>
    
    <hr/>
    
<ul class="uk-pagination uk-flex-center" uk-margin>
    <!--<li><a href="#"><span uk-pagination-previous></span></a></li>-->
    <li><a href="#" style="color:#232323 !important">1</a></li>
    <li class="uk-disabled"><span>...</span></li>
    <li><a href="#" style="color:#232323 !important">5</a></li>
    <li><a href="#" style="color:#232323 !important">6</a></li>
    <li class="uk-active"><span style="background:#6E58FF;color:#fff;padding:0px 10px;border-radius: 3px;">7</span></li>
    <li><a href="#" style="color:#232323 !important">8</a></li>
    <!--<li><a href="#"><span uk-pagination-next></span></a></li>-->
</ul>

<!--Modal-->
<div style="width:100%">
<a href="#modal-example" style="display:flex;justify-content:flex-end" uk-toggle>Open popup (for test)</a>
</div>

<div id="modal-example"class="uk-flex-top" uk-modal>
    <div style="border-radius: 12px !important;"  class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <h2>Subscribe to ItemApp</h2>
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
        
        <button class="uk-button uk-button-default" type="submit" name="signin" style="width:100%">Subscribe</button>

    </div>
</div>
    
</div>
</div>