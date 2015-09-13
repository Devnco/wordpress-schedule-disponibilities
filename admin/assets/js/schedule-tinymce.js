(function() {
    tinymce.create('tinymce.plugins.ScheduleDisponibilities', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            ed.addButton('AddSchedule', {
                type: 'button',
                title : jQuery('#schedule-form-wrapper').data('buttonName'),
                text: jQuery('#schedule-form-wrapper').data('buttonName'),
                onclick : function() {
                    // triggers the thickbox
                    var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                    W = W - 80;
                    H = H - 84;
                    tb_show( jQuery('#schedule-form-wrapper').data('panelName'), '#TB_inline?width=' + W + '&height=' + H + '&inlineId=schedule-form' );
                }
                //cmd : 'addShortcode',
                //icon: false,
                //image : url + 'schedule.jpg'
            });

            // ed.addCommand('addShortcode', function() {
            //     var selected_text = ed.selection.getContent(),
            //         return_text = '',
            //         defaultShortcode = '[schedule show-week-days="true" show-all-days="false" color="#333" mo="" tu="" we="" th="" fr="" sa="" su=""]';
            //     return_text = defaultShortcode + selected_text;
            //     ed.execCommand('mceInsertContent', 0, return_text);
            // });
        },
 
        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            // console.log(n);
            // if (n == 'AddSchedule') {
            //     // creates the button
            //     var button = cm.createButton('AddSchedule', {
            //         type: 'button',
            //         title : 'Add a schedule', // title of the button
            //         onclick : function() {
            //             // triggers the thickbox
            //             var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
            //             W = W - 80;
            //             H = H - 84;
            //             tb_show( 'My Gallery Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=mygallery-form' );
            //         }
            //     });
            //     return button;
            // }
            return null;
        },
 
        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Schedule Disponibilities Buttons',
                author : 'Jeremy Jamar',
                authorurl : 'http://www.hellomoon.be',
                infourl : 'http://www.hellomoon.be',
                version : "0.1"
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add( 'ScheduleDisponibilities', tinymce.plugins.ScheduleDisponibilities );

    // executes this when the DOM is ready
    jQuery(function(){
        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        // jQuery.get('../wp-content/plugins/schedule-disponibilities/panel.php',function(d){
        //     console.log(d);
        //     var form = jQuery(d);
        // });
        
        var form = jQuery('#schedule-form-wrapper').first();
        var table = form.find('table');
        form.appendTo('body').hide();
        
        // handles the click event of the submit button
        form.find('#schedule-submit').click(function(){
            // console.log('hello');
            // // defines the options and their default values
            // // again, this is not the most elegant way to do this
            // // but well, this gets the job done nonetheless
            var options = { 
                'mo'                : '',
                'tu'                : '',
                'we'                : '',
                'th'                : '',
                'fr'                : '',
                'sa'                : '',
                'su'                : '',
                'displayalldays'    : '',
                'displayweekdays'   : '',
                'color'             : '#' 
            };
            var shortcode = '[schedule';
            
            for( var index in options) {
                var el    = table.find('#schedule-' + index),
                    value = el.val();
                
                if(index == 'displayalldays' && el.attr('checked') == 'checked'){
                    shortcode += ' show-all-days="true"';
                }

                if(index == 'displayweekdays' && el.attr('checked') == 'checked'){
                    shortcode += ' show-week-days="true"';
                }

                // attaches the attribute to the shortcode only if it's different from the default value
                if ( value !== options[index] && index != 'displayalldays' && index != 'displayweekdays')
                    shortcode += ' ' + index + '="' + value + '"';
            }
            
            shortcode += ']';
            
            // inserts the shortcode into the active editor
            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
            
            // closes Thickbox
            tb_remove();
        });
    });
})();