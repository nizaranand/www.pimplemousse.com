=== Markdown on Save Improved ===
Contributors: mattwiebe
Tags: markdown, formatting, mobile
Requires at least: 3.2
Tested up to: 3.3.1
Stable tag: 2.3

Markdown + WordPress = writing bliss.

== Description ==

WordPress will process your post with Markdown unless you tell it not to. You probably won't want to, since writing in Markdown is so awesome. Compatible with mobile apps and 3rd-party blogging tools.

The main difference between this plugin and the [original](http://wordpress.org/extend/plugins/markdown-on-save/) is that this plugin assumes you always want Markdown processing.

The markdown version is stored separately (in the `post_content_formatted` column), so you can deactivate this plugin and your posts won't spew out Markdown, because HTML is stored in the `post_content` column, just like normal. This is also much faster than doing on-the-fly Markdown conversion on every page load. It's only done once! When you re-edit the post, the markdown version is swapped into the editor for you to edit.

== Installation ==

1. Upload the `markdown-on-save-improved` folder to your `/wp-content/plugins/` directory
2. Activate the "Markdown On Save Improved" plugin in your WordPress administration interface
3. Create a new post with Markdown.
4. Your post can be edited using Markdown, but will save as processed HTML on the backend.

== Screenshots ==

1. The meta box where you can disable Markdown formatting or convert Markdown to HTML.

== Frequently Asked Questions ==

= How do I use Markdown syntax? =

Please refer to this resource: [PHP Markdown Extra](http://michelf.com/projects/php-markdown/extra/).

= How do I disable Markdown processing? =

In most cases this should be unnecessary, since Markdown ignores existing HTML. But if Markdown for some reason disturbs your HTML when making an edit to a non-Markdown post, either check the "Disable Markdown formatting" checkbox, or put a `<!--no-markdown-->` HTML comment in your post somewhere (useful when using a mobile or 3rd party blogging app).

= How do I convert an existing post to Markdown? =

There is an experimental checkbox in the post editor to convert your old HTML post to Markdown using [Markdownify](http://milianw.de/projects/markdownify/). **Check it at your own risk.** Make sure you have revisions on or backups. If you're relying on specifically crafted HTML, it might get destroyed. But it might be cool.

= What if I don't want to see that Markdown meta box at all? =

I see you love Markdown greatly. You have chosen wisely. Add the following constant to your wp-config.php file:

	define( 'SD_HIDE_MARKDOWN_BOX', true );

Note that you can still disable Markdown formatting with a `<!--no-markdown-->` HTML comment. HTML to Markdown conversion will be impossible.

= What happens if I decide I don't want this plugin anymore? =

Just deactivate it. The Markdown version is stored separately, so without the plugin, you'll just revert to editing the HTML version.

== Changelog ==

= 2.3 =

* Update to Markdown Extra 1.2.6 [Markdown Extra release notes](http://michelf.ca/projects/php-markdown/#version-history)
* Add relevant `wp.*` XML-RPC methods for full remote posting/editing capability
* Remote posting fixes
* Consistent WordPress coding style

= 2.2 =

* Better backwards-compatibility for non-Markdown posts that were written before installing this plugin. (i.e. don't turn off wpautop except when needed.)

= 2.1 =

* Favour Markdown formatting in all cases, turn off wpautop. Ensures that paragraphs and line breaks are handled according to the [Markdown documentation](http://daringfireball.net/projects/markdown/syntax#p).
* Maintain oEmbed auto-embedding

= 2.0.1 =

* Disable visual editor when editing Markdown

= 2.0 =

* Move to opt-out model
* Add experiemental HTML to Markdown conversion using [Markdownify](http://milianw.de/projects/markdownify/)

= 1.0.2 =

* Fix bug where desired backslashes went missing

= 1.0.1 =

* Add stripslashes to let Markdown links with titles get parsed.

= 1.0 =

* Initial forked release

== Upgrade Notice ==

= 1.0.1 =
* The next release will move to an opt-out, rather than opt-in approach, as Mark Jaquith has merged the XML-RPC stuff back into [Markdown on Save](http://http://wordpress.org/extend/plugins/markdown-on-save/)