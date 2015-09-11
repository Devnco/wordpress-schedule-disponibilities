<?php
	echo __('Monday',SD_TEXTDOMAIN); 
	echo '<div id="schedule-form">\
            <table id="schedule-table" class="form-table">\
            <tr>\
                <th><label for="schedule-mo">Monday</label></th>\
                <td><input type="text" name="mo" id="schedule-mo" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-tu">Tuesday</label></th>\
                <td><input type="text" name="tu" id="schedule-tu" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-we">Wednesday</label></th>\
                <td><input type="text" name="we" id="schedule-we" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-th">Thursday</label></th>\
                <td><input type="text" name="th" id="schedule-th" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-fr">Friday</label></th>\
                <td><input type="text" name="fr" id="schedule-fr" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-sa">Saturday</label></th>\
                <td><input type="text" name="sa" id="schedule-sa" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-su">Sunday</label></th>\
                <td><input type="text" name="su" id="schedule-su" value="" /><br />\
                <small>Leave blank if you want to hide this day.</small>\
            </tr>\
            <tr>\
                <th><label for="schedule-displayalldays">Display all days</label></th>\
                <td><input type="checkbox" id="schedule-displayalldays" name="displayalldays" /><br />\
            </tr>\
            <tr>\
                <th><label for="schedule-displayweekdays">Display week days</label></th>\
                <td><input type="checkbox" id="schedule-displayweekdays" name="displayweekdays" /><br />\
            </tr>\
            <tr>\
                <th><label for="schedule-color">Color</label></th>\
                <td><input type="text" name="color" id="schedule-color" value="#" /><br />\
                <small>Specify the color of the schedule in hexadecimal value like #333333.<br /> Leave blank if you want to display default color.</small>\
            </tr>\
        </table>\
        <p class="submit">\
            <input type="button" id="schedule-submit" class="button-primary" value="Insert Schedule" name="submit" />\
        </p>\
        </div>'; ?>