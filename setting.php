<?php require 'templates/header.php'; require 'templates/nav.php' ?>
<div class="uk-section">
<div class="uk-container uk-container-large">

    <h2>Setting</h2>

    <div class="uk-margin-large uk-width-1-2">
        <form action="" method="post">

        <div class="uk-margin">
            <span style="font-weight: 500;font-size: 14px;line-height: 17px;color: #9CA5BA;">
                Links scheduled time
            </span>
        </div>

        <div class="uk-margin">
<!--            <input class="uk-input" type="text" placeholder="" value="5 PM (UTC+03:00)" readonly>-->
                <select class="uk-select" name="time">
                    <option value="00:00" <?php if($token->e_time == '00:00') { echo 'selected'; } ?>>00:00 AM</option>
                    <option value="01:00" <?php if($token->e_time == '01:00') { echo 'selected'; } ?>>01:00 AM</option>
                    <option value="02:00" <?php if($token->e_time == '02:00') { echo 'selected'; } ?>>02:00 AM</option>
                    <option value="03:00" <?php if($token->e_time == '03:00') { echo 'selected'; } ?>>03:00 AM</option>
                    <option value="04:00" <?php if($token->e_time == '04:00') { echo 'selected'; } ?>>04:00 AM</option>
                    <option value="05:00" <?php if($token->e_time == '05:00') { echo 'selected'; } ?>>05:00 AM</option>
                    <option value="06:00" <?php if($token->e_time == '06:00') { echo 'selected'; } ?>>06:00 AM</option>
                    <option value="07:00" <?php if($token->e_time == '07:00') { echo 'selected'; } ?>>07:00 AM</option>
                    <option value="08:00" <?php if($token->e_time == '08:00') { echo 'selected'; } ?>>08:00 AM</option>
                    <option value="09:00" <?php if($token->e_time == '09:00') { echo 'selected'; } ?>>09:00 AM</option>
                    <option value="10:00" <?php if($token->e_time == '10:00') { echo 'selected'; } ?>>10:00 AM</option>
                    <option value="11:00" <?php if($token->e_time == '11:00') { echo 'selected'; } ?>>11:00 AM</option>
                    <option value="12:00" <?php if($token->e_time == '12:00') { echo 'selected'; } ?>>12:00 PM</option>
                    <option value="13:00" <?php if($token->e_time == '13:00') { echo 'selected'; } ?>>01:00 PM</option>
                    <option value="14:00" <?php if($token->e_time == '14:00') { echo 'selected'; } ?>>02:00 PM</option>
                    <option value="15:00" <?php if($token->e_time == '15:00') { echo 'selected'; } ?>>03:00 PM</option>
                    <option value="16:00" <?php if($token->e_time == '16:00') { echo 'selected'; } ?>>04:00 PM</option>
                    <option value="17:00" <?php if($token->e_time == '17:00') { echo 'selected'; } ?>>05:00 PM</option>
                    <option value="18:00" <?php if($token->e_time == '18:00') { echo 'selected'; } ?>>06:00 PM</option>
                    <option value="19:00" <?php if($token->e_time == '19:00') { echo 'selected'; } ?>>07:00 PM</option>
                    <option value="20:00" <?php if($token->e_time == '20:00') { echo 'selected'; } ?>>08:00 PM</option>
                    <option value="21:00" <?php if($token->e_time == '21:00') { echo 'selected'; } ?>>09:00 PM</option>
                    <option value="22:00" <?php if($token->e_time == '22:00') { echo 'selected'; } ?>>10:00 PM</option>
                    <option value="23:00" <?php if($token->e_time == '23:00') { echo 'selected'; } ?>>11:00 PM</option>
                </select>

<!--            <div style="display: flex;margin-top:12px">-->
<!--                <div style="background: #000;width:24px;border-radius: 50%">-->
<!--                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C11.772 16 11.545 15.923 11.36 15.768L5.35997 10.768C4.93597 10.415 4.87797 9.78398 5.23197 9.35998C5.58497 8.93598 6.21497 8.87898 6.63997 9.23198L12.011 13.708L17.373 9.39298C17.803 9.04698 18.433 9.11498 18.779 9.54498C19.125 9.97498 19.057 10.604 18.627 10.951L12.627 15.779C12.444 15.926 12.222 16 12 16Z" fill="#231F20"/>-->
<!--                        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="9" width="14" height="7">-->
<!--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C11.772 16 11.545 15.923 11.36 15.768L5.35997 10.768C4.93597 10.415 4.87797 9.78398 5.23197 9.35998C5.58497 8.93598 6.21497 8.87898 6.63997 9.23198L12.011 13.708L17.373 9.39298C17.803 9.04698 18.433 9.11498 18.779 9.54498C19.125 9.97498 19.057 10.604 18.627 10.951L12.627 15.779C12.444 15.926 12.222 16 12 16Z" fill="white"/>-->
<!--                        </mask>-->
<!--                        <g mask="url(#mask0)">-->
<!--                            <rect width="24" height="24" fill="white"/>-->
<!--                        </g>-->
<!--                    </svg>-->
<!--                </div>-->
<!---->
<!--                <div style="margin-left:10px;background: #000;width:24px;border-radius: 50%;transform: rotate(180deg);">-->
<!--                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C11.772 16 11.545 15.923 11.36 15.768L5.35997 10.768C4.93597 10.415 4.87797 9.78398 5.23197 9.35998C5.58497 8.93598 6.21497 8.87898 6.63997 9.23198L12.011 13.708L17.373 9.39298C17.803 9.04698 18.433 9.11498 18.779 9.54498C19.125 9.97498 19.057 10.604 18.627 10.951L12.627 15.779C12.444 15.926 12.222 16 12 16Z" fill="#231F20"/>-->
<!--                        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="5" y="9" width="14" height="7">-->
<!--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C11.772 16 11.545 15.923 11.36 15.768L5.35997 10.768C4.93597 10.415 4.87797 9.78398 5.23197 9.35998C5.58497 8.93598 6.21497 8.87898 6.63997 9.23198L12.011 13.708L17.373 9.39298C17.803 9.04698 18.433 9.11498 18.779 9.54498C19.125 9.97498 19.057 10.604 18.627 10.951L12.627 15.779C12.444 15.926 12.222 16 12 16Z" fill="white"/>-->
<!--                        </mask>-->
<!--                        <g mask="url(#mask0)">-->
<!--                            <rect width="24" height="24" fill="white"/>-->
<!--                        </g>-->
<!--                    </svg>-->
<!--                </div>-->
<!--            </div>-->

        </div>

        <div class="uk-margin">
            <span style="font-weight: 500;font-size: 14px;line-height: 17px;color: #9CA5BA;">
                Links scheduled dat
            </span>
        </div>

        <div class="uk-margin" style="display: flex">
<!--            <div class="tag">Monday</div>-->
<!--            <div class="tag">Tuesday</div>-->
<!--            <div class="tag">Wednesday</div>-->
<!--            <div class="tag">Thursday</div>-->
<!--            <div class="tag">Friday</div>-->
<!--            <div class="tag">Saturday</div>-->
<!--            <div class="tag">Sunday</div>-->
            <label>                           <input class="uk-checkbox" name="e_monday" type="checkbox" <?php if($token->e_monday == true) { echo 'checked'; } ?>> Monday</label>
            <label style="margin-left: 14px;"><input class="uk-checkbox" name="e_tuesday" type="checkbox" <?php if($token->e_tuesday == true) { echo 'checked'; } ?>> Tuesday</label>
            <label style="margin-left: 14px;"><input class="uk-checkbox" name="e_wednesday" type="checkbox" <?php if($token->e_wednesday == true) { echo 'checked'; } ?>> Wednesday</label>
            <label style="margin-left: 14px;"><input class="uk-checkbox" name="e_thursday" type="checkbox" <?php if($token->e_thursday == true) { echo 'checked'; } ?>> Thursday</label>
            <label style="margin-left: 14px;"><input class="uk-checkbox" name="e_friday" type="checkbox" <?php if($token->e_friday == true) { echo 'checked'; } ?>> Friday</label>
            <label style="margin-left: 14px;"><input class="uk-checkbox" name="e_saturday" type="checkbox" <?php if($token->e_saturday == true) { echo 'checked'; } ?>> Saturday</label>
            <label style="margin-left: 14px;"><input class="uk-checkbox" name="e_sunday" type="checkbox" <?php if($token->e_sunday == true) { echo 'checked'; } ?>> Sunday</label>
        </div>

        <div class="uk-margin">
            <span style="font-weight: 500;font-size: 14px;line-height: 17px;color: #9CA5BA;">
                Channels
            </span>
        </div>

        <div class="uk-margin uk-grid-small" uk-grid>
            <div class="uk-width-1-3@m">
                <label><input class="uk-checkbox" type="checkbox"> Telegram</label>
            </div>
            <div class="uk-width-1-3@m">
                <label><input class="uk-checkbox" type="checkbox"> Slack</label>
            </div>
        </div>

        <div class="uk-margin">
            <span style="font-weight: 500;font-size: 14px;line-height: 17px;color: #9CA5BA;">
                Pause emails
            </span>
        </div>

        <div class="uk-margin">
            <label><input class="uk-checkbox" type="checkbox"> Emails are on</label>
        </div>

        <div class="uk-margin">
            <span style="font-weight: 500;font-size: 14px;line-height: 17px;color: #9CA5BA;">
                Pause feature update emails
            </span>
        </div>

        <div class="uk-margin">
            <label><input class="uk-checkbox" type="checkbox"> Emails are on</label>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-default" type="submit" name="email-settings" style="width: 100%;">Save email setting</button>
        </div>

        </form>
    </div>

</div>
</div>