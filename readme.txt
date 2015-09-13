=== Plugin Name ===
Contributors: devnco
Donate link: http://www.hellomoon.be/
Tags: schedule, disponibilities, horaire
Requires at least: 3.0.1
Tested up to: 4.3
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to display some beautiful schedules on your wordpress by using simple shortcode.

== Description ==

This plugin allows you to display some beautiful schedule on your wordpress by using simple shortcode.

To begin, let's display an empty schedule by typing `[schedule show-all-days="true"]` on your page or post.

To fill the disponibilities, you should use the following attributes :`"mo","tu","we","th,"fr',sa","su"`

`Exemple : [schedule mo="10h00-14h00" su="09h30-13h00|15h00-19h00"]`

As you've seen in the first example there is some addtional attributes to display empty days. 

There are two :

1. `show-all-days` which display the all week (monday to sunday)
2. `show-week-days` which display only the week days (monday to friday)

Both of them take a boolean value (true or false). If you leave them empty or with another value it will be consider false.

`Exemple : [schedule show-week-days="true" mo="10h00-13h00"]`

You can chose the color used to fill your schedule by providing a `color` tag. This one accept hexadecimal format such as `color="#003300"` or html color  `color="pink"`. *Don't forget the # before your code !*

`Exemple : [schedule show-week-days="true" mo="10h00-13h00" color="orange"]`

== Installation ==

Simply install and enable the plugin, you should be able to use it on your posts and articles right after that :-)


== Frequently Asked Questions ==


== Screenshots ==

1. A view of a shortcude used in a post
2. Here is a render of the schedule 

== Changelog ==

= 1.0.4 =
* Add translation system for admin panel (fr).

= 1.0.3 =
* Fix a bug with js tinymce.

= 1.0.2 =
* Add french translation for the name of the days in frontend.
* Code improvements

= 1.0.1 =
* Add a button to content editor to setup and insert the shortcode with a configuration window.

= 1.0.0 =
* First realase, you can use shortags :-D