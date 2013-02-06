=== Plugin Name ===
Contributors: eveevans
Donate link: http://www.flasheves.com/ev-widget-post/
Tags: post, widget, thumbnail
Requires at least: 2.8
Tested up to: 3.2.1
Stable tag: 0.5

Widget for show posts from a category. You can specify how to display it, with: thumbail, excerpt and order.

== Description ==

This plugin let you insert a widget in where you can show post from specific category. You can filter how to display it: with or without thumbnail (selecting the size), excerpt and order.
In the newest version you can split between Main and Secondaries post, and select the format of each one. (This can be especially useful for your home page, or sidebar)

== Installation ==

1. Upload the folder 'ev-widget-post' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In the Widgets section create a new 'Ev Widget Post' widget

== Frequently Asked Questions ==

= Where it take the images? =

The images are taken through the_post_thumbail function, as set in post's edit screen

= Where can I change the image size ? =

The image sizes are definied in the Media Settings of Wordpress options. The default are:

*	thumbnail 150px x 150px max
*	medium 300px x 300px max
*	large 640px x 640px max

= How can I change the styles ? = 

You can define the styles in your style.css file, the widget has its own CSS classes (you can see it with Firebug, Web Inspector, Dragonfly or tools like that). For example if you want to change the size of title you can define a class like:
h3.ev-widget-post-tittle {font-size:16px;}


== Screenshots ==

1. Basic widget options
2. Extended widget options
3. Example of the widget in the default twentyten theme
4. Example of the widget using the main and secondary post format


== Changelog ==

= 0.5 =
* New Feature: split post format (main and secondary posts)
* Add Enable secondary format option
* Dynamic options
* Fix some Notices
* Tested in Wordpress 3.2.1

= 0.4 =
* Add 'order by modified' option
* Tested in Wordpress 3.1

= 0.3 = 
* Add show thumbnail option
* Add show excerpt option
* Add thumbnail size  option

= 0.2 =
* Add support for I18n
* Include Spanish traslation

= 0.1 =
* First version of the plugin

== Upgrade Notice ==

= 0.5 =
New features, split post format, secondary format options, and some notices fixes

= 0.4 =
New options in order by modified, and tested in Wordpress 3.1

= 0.3 =
New features (add excerpt and thumbnail options)

= 0.2 =
Support for I18n

= 0.1 =
This is the first version of the plugin

