

Moustachey 
Documentation
Your guide to installation, setup and common questions (hopefully) answered.
Table of Contents

1. Installation	
2. Setting up	
2.1 Footer	
2.2 Posts	
3. Admin Panel	
3.1 General Settings	
3.2 Social Settings	
3.3 Styling Options	
3.4 Text/Content settings	
4. Page Templates	
7. Blog	
8. Menus	
8. Shortcodes	
9. Custom Widgets	
1. Installation

First you’ll need to have WordPress installed.

You can find out more about that here: 

http://codex.wordpress.org/Installing_WordPress


You have two choices to upload your theme:

Via FTP - First unzip the theme and using your FTP program upload the theme folder into /wp-content/themes/ on your server. 
WordPress Upload - Login to your WordPress website, within the admin screens navigate to Appearance > Add New Themes > Upload. Then browse to the zipped theme folder and click ‘Install Now’. You may need to wait for a few seconds before the file uploads.

Once the theme is on your server or uploaded, you need to activate it, just go to Appearance > Themes and activate Moustachey.


2. Setting up

When you install our theme you’ll see that it has set up some default options for you, there are some blanks it will leave though and we’ll talk through those below.


2.1 Footer

This is all controllable through the Theme Options within the WordPress admin area. You can turn each area of the footer off within the ‘Global settings’ section. To add in the Twitter widget, just fill out your Twitter URL on the ‘Social Settings’ tab and we’ll do the rest. 


2.2 Posts

This is a blog theme, so all you need to do is start adding posts, we support all post types so you should have all you need.

Ok, so that’s the homepage setup, let’s talk about the website functionality in general now.

3. Admin Panel

Initially, this is where you will spend most of your time. I’m not going to go through all of the options in detail here as there is on-page help within the admin panel.

Just navigate to ‘Theme Options’, from here you will have four tabs.

3.1 General Settings

This is aimed at the generic settings you’ll want to set on your website.

Analytics settings section allows you to add your Google Analytics ID, you must make sure any other Google Analytics plugins are disabled or your Analytics ID is removed from them.

Global settings section allows you to truncate links your commenters have placed in the comments, uppercase all headings, show or hide strapline, enable full content posts in archive, switch side navigation to left, turn off side navigation all together, turn off “Archives: “ text panel on category view, use admin format for date,  turn Comments off completely, show the top / donate panel, switch to boxed layout, show twitter, show social icons in footer,  enable widgets in footer, use white or black social icons, show MeanThemes footer credit, specify amount of tweets for the footer, hide the sidebar sub menu on pages, disable featured image on gallery posts only, disable featured image on all posts (not gallery, not pages).

Images section allows you to switch to a plain text logo, upload your own logo, upload a retina device logo, upload an apple touch logo, upload your favicon and upload a background image swatch.

Contact Page settings section allows you to set up the homepage. From here there is only one option, enable side navigation for the homepage.

Contact Page settings section allows you to set up the contact page. You can add a contact page email address to send to (if you don’t fill this in it will go to the default admin email), add a Google API key, set your longitude and latitudes, upload a custom google pin, show/hide the contact form and show/hide address details.


3.2 Social Settings

This tab allows you to add the full URL for each of your social networks. The Twitter URL also feeds your Twitter Feed widget. Any social networks you leave blank will mean the icon does not show in the footer.

3.3 Styling Options

Colours We’ve worked hard to make the colour system in this theme as easy as possible to use and many colours have been shared across the theme.

Default Web fonts You can select from the main ‘web safe’ fonts in this section.

Google Web fonts Here, you can add Google web font names, based on the Google web font library and we’ll include the correct Google CSS references. The on-page help will guide you through this.

Typekit Web fonts Got a typekit account? Just pop in your account ID and the Typekit references for the CSS and you’re all set.

Adobe Edge Web fonts Just pop in your CSS attributes and you’re ready to go.

Font Size You can control all of the font sizes across the whole theme here.

Custom CSS Block You want ultimate CSS control, no problem. You can add all of your custom code in here, the theme will add this CSS to the very bottom of all other CSS that the theme uses so you’ll easily be able to override any current CSS.

3.4 Text/Content settings

Global You can change, read more text, view post text, sidebar text, donate pull down link, donate title, donate details, donate link URL and donate link text

Contact page change the Contact form title here and your phone and email details here. 

4. Page Templates

There are 5 page templates used on this website

Default This is the standard page with right navigation, 

http://www.meanthemes.com/theme/moustachey/features/

Page - Contact If you’ve filled out the ‘Contact page’ details on Theme Options > General Settings, the map will activate itself on this page. Don’t want a map? No problem, leave the settings blank on ‘General Settings’ and add a featured image instead.

http://www.meanthemes.com/theme/moustachey/contact/

Page - Full Width It is what it says it is, a full width page version of the default page template.

http://www.meanthemes.com/theme/moustachey/features/full-width-page/

Page - Blog Layout This template is a clone of the main index/homepage. If your website is setup via Settings > Reading as an actual page, just change the page template to Page - Blog Layout.

You can create your page then go to Settings > Reading. Under ‘Front page displays’ toggle to ‘A static page’ and select your newly created page as your front page.

http://www.meanthemes.com/theme/moustachey/features/blog-layout/



Page - Archives Layout Exactly the same as the default page layout, we’ll add on your archives by month, year and category below the main content.

http://www.meanthemes.com/theme/moustachey/archives/ 


7. Blog


We support all the post formats as described on http://codex.wordpress.org/Post_Formats.

To make things easier, you will see some new custom meta boxes at the bottom of every blog post in WordPress admin.

Simply choose the post format on the right, then fill out the corresponding information below the content editor, called “Post Formats”. Here you can add link details for a link post, add embed code for a video post, add self-hosted audio for an audio post and add the source for a quote.

Aside format ignores the title and status format ignores the content area, the rest of the post formats are styled accordingly and can be seen at:

http://www.meanthemes.com/theme/moustachey/

The gallery posts work with image attachments per post, simply upload images into the gallery and then update the post, the theme will do the rest.

Blog items per page are set the usual way from WordPress Settings > Reading.

8. Menus

The theme will automatically add your pages to its menu for the header. If you want to take more control, no problem.

Navigate to Appearance > Menus. You can create one or two menus of any name you like and put them in position via the ‘Theme Locations’ setting. Alternatively, simply create a new menu and call it “Main Menu” this will then show in the header. 

Easy :)
8. Shortcodes

Just include the following shortcodes, wrapped around your content in the content editor to allow for the following layouts...

We also have these available via the ‘Styles’ drop down in the WordPress content editor.

Statuses

[status_ok]
	Ok Status!
[/status_ok]

[status_oops]
	Oops Status!
[/status_oops]

[status_lessoops]
	Less Oops Status!
[/status_lessoops]

Buttons

[button url=”http://www.meanthemes.com” style="grey" size="large" target="_blank"]Button[/button]

Enter the web address in the url=”” section.

You have the choice of the following colours, these go in the style=”” section:

grey
black
green
light-blue
blue
red
orange
purple

You have the choice of the following sizes, these go in the size=”” section:

small
large

You have the choice of the following target, this is whether the link will open in the same window (_self) or new tab/window (_blank), these go in the target=”” section:

_self
_blank

Tabs

[tabs] [tab title="Tab 1"] Tab Content 1 [/tab] [tab title="Tab 2"] Tab Content 2 [/tab] [tab title="Tab 3"] Tab Content 3 [/tab] [/tabs]

	1. 	To set up the tab area, open [tabs]

	2. 	To set up a tab insert:

		[tab title="Tab 1"] Tab Content 1 [/tab]

	3.	and then repeat 2 until you have all of your tabs
	4.	close your [/tabs]


Toggles

[toggle title="Toggle 1" state="open"] Toggle Content 1 [/toggle][toggle title="Toggle 2" state="closed"] Toggle Content 2 [/toggle]

Lists

[bullets style="green" type="tick"]

<ul>
	<li>List item</li>
</ul>

[/bullets]

You have the choice of the following colours, these go in the style=”” section:

grey
black
green
light-blue
blue
red
orange
purple

Columns

[one_half]
	This is where the content goes
[/one_half]
[one_half_last]
	This is where the content goes
[/one_half_last]

[one_third]
	This is where the content goes
[/one_third]
[one_third]
	This is where the content goes
[/one_third]
[one_third_last]
	This is where the content goes
[/one_third_last]

[one_fourth]
	This is where the content goes
[/one_fourth]
[one_fourth]
	This is where the content goes
[/one_fourth]
[one_fourth]
	This is where the content goes
[/one_fourth]
[one_fourth_last]
	This is where the content goes
[/one_fourth_last]

[one_fifth]
	This is where the content goes
[/one_fifth]
[one_fifth]
	This is where the content goes
[/one_fifth]
[one_fifth]
	This is where the content goes
[/one_fifth]
[one_fifth]
	This is where the content goes
[/one_fifth]
[one_fifth_last]
	This is where the content goes
[/one_fifth_last]

[one_sixth]
	This is where the content goes
[/one_sixth]
[one_sixth]
	This is where the content goes
[/one_sixth]
[one_sixth]
	This is where the content goes
[/one_sixth]
[one_sixth]
	This is where the content goes
[/one_sixth]
[one_sixth]
	This is where the content goes
[/one_sixth]
[one_sixth_last]
	This is where the content goes
[/one_sixth_last]



9. Custom Widgets

There is one custom widget with this theme, designed for any widgetised area.

Go to Appearance > Widgets.


Custom Video Widget Drag and drop this widget into ‘Archive Widget Area’ or ‘Page Widget Area’ or ‘Footer Widget Area’ or ‘Contact Widget Area’ then paste in the video service embed code (we’ve tested Vimeo and YouTube). Click ‘Save’ and you’re good to go.



Well that’s it!

Thank you, we hope you enjoy your new theme.

http://www.meanthemes.com 
Moustachey by MeanThemes 2012