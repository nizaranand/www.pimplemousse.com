<?php header("Content-type: text/css"); 
if(defined("ABSPATH")) {
	$path = ABSPATH;
}
else {
	$path = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
}
if(file_exists($path."wp_load.php")) {
	include_once $path . 'wp-load.php';
} else {
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
}
?>
<?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $styling_options = get_option( 'meanthemes_theme_styling_options_moustachey'); ?>

<?php
$meanThemesFontHeading = sanitize_text_field( $styling_options['heading_font'] );
$meanThemesFontBody = sanitize_text_field( $styling_options['font_family'] );
$meanThemesGoogleFontHeading = sanitize_text_field( $styling_options['google_heading_font'] );
$meanThemesGoogleFontBody = sanitize_text_field( $styling_options['google_body_font'] );
$meanThemesTypekitFontHeading = sanitize_text_field( $styling_options['typekit_heading_font'] );
$meanThemesTypekitFontBody = sanitize_text_field( $styling_options['typekit_body_font'] );
$meanThemesAdobeFontHeading = sanitize_text_field( $styling_options['adobe_heading_font'] );
$meanThemesLogoColour = sanitize_text_field( $styling_options['logo_colour'] );
$meanThemesHeadingColour = sanitize_text_field( $styling_options['heading_font_colour'] );
$meanThemesMenuActiveColour = sanitize_text_field( $styling_options['menu_active_colour'] );
$meanThemesBodyColour = sanitize_text_field( $styling_options['body_font_colour'] );
$meanThemesLinkColour = sanitize_text_field( $styling_options['link_colour'] );
$meanThemesHoverColour = sanitize_text_field( $styling_options['hover_colour'] );
$meanThemesFooterColour = sanitize_text_field( $styling_options['footer_colour'] );
$meanThemesSidebarColour = sanitize_text_field( $styling_options['sidebar_colour'] );
$meanThemesBackgroundColour = sanitize_text_field( $styling_options['background_colour'] );
$meanThemesContentBackgroundColour = sanitize_text_field( $styling_options['content_background_colour'] );
$meanThemesFooterTextColour = sanitize_text_field( $styling_options['footer_colour_text'] );
$meanThemesBackgroundImage = sanitize_text_field( $general_options['swatchupload'] );
$meanThemesButtonColour = sanitize_text_field( $styling_options['button_colour'] );
$meanThemesButtonColourHover = sanitize_text_field( $styling_options['button_hover_colour'] );
$meanThemesArchiveDark = sanitize_text_field( $styling_options['archive_dark'] );
$meanThemesArchiveOnDarkText = sanitize_text_field( $styling_options['archive_ondark_text'] );
$meanThemesArchiveOnDarkLink = sanitize_text_field( $styling_options['archive_ondark_link'] );
$meanThemesArchiveOnDarkLinkHover = sanitize_text_field( $styling_options['archive_ondark_link_hover'] );
$meanThemesArchiveBright = sanitize_text_field( $styling_options['archive_bright'] );
$meanThemesArchiveOnBrightText = sanitize_text_field( $styling_options['archive_onbright_text'] );
$meanThemesArchiveOnBrightLink = sanitize_text_field( $styling_options['archive_onbright_link'] );
$meanThemesArchiveOnBrightLinkHover = sanitize_text_field( $styling_options['archive_onbright_link_hover'] );
$meanThemesMainNav = sanitize_text_field( $styling_options['main_nav_size'] );
$meanThemesBodySize = sanitize_text_field( $styling_options['body_size'] );
$meanThemesHeading1 = sanitize_text_field( $styling_options['heading_1'] );
$meanThemesHeading2 = sanitize_text_field( $styling_options['heading_2'] );
$meanThemesHeading3 = sanitize_text_field( $styling_options['heading_3'] );
$meanThemesHeading4 = sanitize_text_field( $styling_options['heading_4'] );
$meanThemesHeading5 = sanitize_text_field( $styling_options['heading_5'] );
$meanThemesHeading6 = sanitize_text_field( $styling_options['heading_6'] );
$meanThemesHeadingSuper = sanitize_text_field( $styling_options['heading_supersize'] );
$meanThemesSiteTitleSize = sanitize_text_field( $styling_options['site_title_size'] );
$meanThemesStraplineSize = sanitize_text_field( $styling_options['strapline_size'] );
$meanThemesMobileMenu = sanitize_text_field( $styling_options['mobile_menu_colour'] );
$meanThemesUppercase = sanitize_text_field( $general_options['uppercase_titles'] );


if ($meanThemesFontHeading == "verdana") {
	$meanThemesFontHeading = 'Verdana, Geneva, sans-serif';
}
if ($meanThemesFontHeading == "georgia") {
	$meanThemesFontHeading = 'Georgia, "Times New Roman", Times, serif';
}
if ($meanThemesFontHeading == "courier") {
	$meanThemesFontHeading = '"Courier New", Courier, monospace';
}
if ($meanThemesFontHeading == "arial") {
	$meanThemesFontHeading = 'Arial, Helvetica, sans-serif';
}
if ($meanThemesFontHeading == "helvetica") {
	$meanThemesFontHeading = 'Helvetica, Arial, sans-serif';
}
if ($meanThemesFontHeading == "tahoma") {
	$meanThemesFontHeading = 'Tahoma, Geneva, sans-serif';
}
if ($meanThemesFontHeading == "trebuchet") {
	$meanThemesFontHeading = '"Trebuchet MS", Arial, Helvetica, sans-serif';
}
if ($meanThemesFontHeading == "arialblack") {
	$meanThemesFontHeading = '"Arial Black", Gadget, sans-serif';
}
if ($meanThemesFontHeading == "timesnew") {
	$meanThemesFontHeading = '"Times New Roman", Times, serif';
}
if ($meanThemesFontHeading == "palatino") {
	$meanThemesFontHeading = '"Palatino Linotype", "Book Antiqua", Palatino, serif';
}
if ($meanThemesFontHeading == "lucida") {
	$meanThemesFontHeading = '"Lucida Sans Unicode", "Lucida Grande", sans-serif';
}
if ($meanThemesFontHeading == "msserif") {
	$meanThemesFontHeading = '"MS Serif", "New York", serif';
}
if ($meanThemesFontHeading == "lucidaconsole") {
	$meanThemesFontHeading = '"Lucida Console", Monaco, monospace';
}
if ($meanThemesFontBody == "verdana") {
	$meanThemesFontBody = 'Verdana, Geneva, sans-serif';
}
if ($meanThemesFontBody == "georgia") {
	$meanThemesFontBody = 'Georgia, "Times New Roman", Times, serif';
}
if ($meanThemesFontBody == "courier") {
	$meanThemesFontBody = '"Courier New", Courier, monospace';
}
if ($meanThemesFontBody == "arial") {
	$meanThemesFontBody = 'Arial, Helvetica, sans-serif';
}
if ($meanThemesFontBody == "helvetica") {
	$meanThemesFontBody = 'Helvetica, Arial, sans-serif';
}
if ($meanThemesFontBody == "tahoma") {
	$meanThemesFontBody = 'Tahoma, Geneva, sans-serif';
}
if ($meanThemesFontBody == "trebuchet") {
	$meanThemesFontBody = '"Trebuchet MS", Arial, Helvetica, sans-serif';
}
if ($meanThemesFontBody == "arialblack") {
	$meanThemesFontBody = '"Arial Black", Gadget, sans-serif';
}
if ($meanThemesFontBody == "timesnew") {
	$meanThemesFontBody = '"Times New Roman", Times, serif';
}
if ($meanThemesFontBody == "palatino") {
	$meanThemesFontBody = '"Palatino Linotype", "Book Antiqua", Palatino, serif';
}
if ($meanThemesFontBody == "lucida") {
	$meanThemesFontBody = '"Lucida Sans Unicode", "Lucida Grande", sans-serif';
}
if ($meanThemesFontBody == "msserif") {
	$meanThemesFontBody = '"MS Serif", "New York", serif';
}
if ($meanThemesFontBody == "lucidaconsole") {
	$meanThemesFontBody = '"Lucida Console", Monaco, monospace';
}
if ( ($meanThemesGoogleFontHeading) && ($meanThemesGoogleFontBody) ) {
	$meanThemesGoogleFont = $meanThemesGoogleFontHeading .'|'. $meanThemesGoogleFontBody;
if(!$meanThemesFontBody) {
	$meanThemesFontBody = "";
}
if(!$meanThemesFontHeading) {
	$meanThemesFontHeading = "";
}
if($meanThemesFontBody) {
	$meanThemesFontBody = ",".$meanThemesFontBody ;
}
if($meanThemesFontHeading) {
	$meanThemesFontHeading = ",".$meanThemesFontHeading;
}
	$meanThemesGoogleFontBody = 'font-family: "'.$meanThemesGoogleFontBody.'"'.$meanThemesFontBody.', "cursive";';
	$meanThemesGoogleFontHeading = 'font-family: "'.$meanThemesGoogleFontHeading.'"'.$meanThemesFontHeading.', "cursive";';
} else if ( ($meanThemesGoogleFontHeading) && (!$meanThemesGoogleFontBody) ) {
	$meanThemesGoogleFont = $meanThemesGoogleFontHeading;
	$meanThemesGoogleFontHeading = 'font-family: "'.$meanThemesGoogleFontHeading.'"'.$meanThemesFontHeading.', "cursive";';
	$meanThemesGoogleFontBody = "";
} else if ( (!$meanThemesGoogleFontHeading) && ($meanThemesGoogleFontBody) ) {
	$meanThemesGoogleFont = $meanThemesGoogleFontBody;
	$meanThemesGoogleFontBody = 'font-family: "'.$meanThemesGoogleFontBody.'"'.$meanThemesFontBody.', "cursive";';
	$meanThemesGoogleFontHeading = "";
}
?>
<?php if ( (!$meanThemesGoogleFontHeading) && (!$meanThemesGoogleFontBody) ) {
 ?>
@import url(//fonts.googleapis.com/css?family=Averia+Sans+Libre:700);
<?php } ?>

<?php if($meanThemesGoogleFont) {
$str = ($meanThemesGoogleFont);
$meanThemesGoogleFont = str_replace(' ', '+', $str);
?>
@import url(//fonts.googleapis.com/css?family=<?php echo ($meanThemesGoogleFont); ?>);
body,
input,
textarea { <?php echo ($meanThemesGoogleFontBody); ?> color: <?php echo ($meanThemesBodyColour); ?> }
<?php } ?>


body,a,a:hover,h1,h2,h3,h4,h5,h6,p,div,article,section,header,nav {text-shadow: none !important; }

<?php if($meanThemesHeadingSuper) { ?>
.donate-message .raised {
font-size: <?php echo $meanThemesHeadingSuper; ?>;
}
<?php } ?>

<?php if($meanThemesBodySize) { ?>
body, 
input, 
button,
textarea,
.footer-widget
{ font-size: <?php echo $meanThemesBodySize; ?>; }
<?php } ?>
<?php if($meanThemesHeading1) { ?>
h1, 
h1 .site-title a,
.contact-form h2
{ font-size: <?php echo $meanThemesHeading1; ?>; }
<?php } ?>
<?php if($meanThemesHeading2) { ?>
h2 { font-size: <?php echo $meanThemesHeading2; ?>; }
<?php } ?>
<?php if($meanThemesHeading3) { ?>
h3
{ font-size: <?php echo $meanThemesHeading3; ?>; }
<?php } ?>
<?php if($meanThemesHeading4) { ?>
h4 { font-size: <?php echo $meanThemesHeading4; ?>; }
<?php } ?>
<?php if($meanThemesHeading5) { ?>
h5, footer h5 { font-size: <?php echo $meanThemesHeading5; ?>; }
<?php } ?>
<?php if($meanThemesHeading6) { ?>
h6, .donate-message .details
{ font-size: <?php echo $meanThemesHeading6; ?>; }
<?php } ?>
<?php if($meanThemesSiteTitleSize) { ?>
	header span.site-title, header span.site-title h1 { font-size: <?php echo $meanThemesSiteTitleSize; ?> !important; }
<?php } ?>
<?php if($meanThemesStraplineSize) { ?>
.strap { font-size: <?php echo $meanThemesStraplineSize; ?> !important; }
<?php } ?>
<?php if($meanThemesMainNav) { ?>
header nav { font-size: <?php echo $meanThemesMainNav; ?>; }
<?php } ?>

<?php if($meanThemesBackgroundColour) { ?>
body, html.blocked body { background: <?php echo $meanThemesBackgroundColour; ?>; }
<?php } ?>
<?php if($meanThemesContentBackgroundColour) { ?>
html.blocked #content-wrapper { background: <?php echo $meanThemesContentBackgroundColour; ?>; }
<?php } ?>
<?php if($meanThemesBackgroundImage) { ?>
body, html.blocked body { background-image: url(<?php echo $meanThemesBackgroundImage; ?>); background-repeat: repeat; background-position: 0 0;  }
<?php } ?>
<?php if ( ($meanThemesFontHeading) && (!$meanThemesGoogleFontHeading) && (!$meanThemesTypekitFontHeading) && (!$meanThemesAdobeFontHeading) ) { ?>
h1, h2, h3, h4, h5, h6, nav, span.site-title, span.strap, .meta, a.more, .format-link a, .format-link p, .format-quote p,
.flex-next, .flex-prev, .navigation, a.url, a.comment-date, .comment-reply, p.form-submit input, .single-quote, button, input#searchsubmit
 { font-family: <?php echo ($meanThemesFontHeading); ?> }
<?php } ?>
<?php if( ($meanThemesFontBody) && (!$meanThemesGoogleFontBody) && (!$meanThemesTypekitFontHeading) && (!$meanThemesAdobeFontHeading) ) { ?>
body, 
input, 
button,
textarea { font-family: <?php echo ($meanThemesFontBody); ?>; }
<?php } ?>

<?php if($meanThemesTypekitFontBody) { ?>
body, 
input, 
textarea { font-family: <?php echo ($meanThemesTypekitFontBody); ?> !important; color: <?php echo ($meanThemesBodyColour); ?> }
<?php } ?>
<?php if($meanThemesBodyColour) { ?>
/* Content Colour */
body, 
input, 
button,
textarea {
color: <?php echo $meanThemesBodyColour; ?>;
}
<?php } ?>
<?php if($meanThemesGoogleFontHeading) { ?>
h1, h2, h3, h4, h5, h6, nav, span.site-title, span.strap, .meta, a.more, .format-link a, .format-link p, .format-quote p,
.flex-next, .flex-prev, .navigation, a.url, a.comment-date, .comment-reply, p.form-submit input, .single-quote, button, input#searchsubmit {
<?php echo ($meanThemesGoogleFontHeading); ?> color: <?php echo ($meanThemesHeadingColour); ?>
}
<?php } ?>
<?php if($meanThemesTypekitFontHeading) { ?>
h1, h2, h3, h4, h5, h6, nav, span.site-title, span.strap, .meta, a.more, .format-link a, .format-link p, .format-quote p,
.flex-next, .flex-prev, .navigation, a.url, a.comment-date, .comment-reply, p.form-submit input, .single-quote, button, input#searchsubmit {
font-family: <?php echo $meanThemesTypekitFontHeading; ?> !important; color: <?php echo $meanThemesHeadingColour; ?>; 
}
<?php } ?>
<?php if($meanThemesAdobeFontHeading) { ?>
h1, h2, h3, h4, h5, h6, nav, span.site-title, span.strap, .meta, a.more, .format-link a, .format-link p, .format-quote p,
.flex-next, .flex-prev, .navigation, a.url, a.comment-date, .comment-reply, p.form-submit input, .single-quote, button, input#searchsubmit {
font-family: <?php echo $meanThemesAdobeFontHeading; ?>, serif !important; color: <?php echo $meanThemesHeadingColour; ?>; 
}
<?php } ?>
<?php if($meanThemesLogoColour) { ?>
/* Plain Text Logo Colour */
header span.site-title,
header span.site-title h1,
header span.site-title a, 
header span.site-title a:hover,
header span.strap {
color: <?php echo $meanThemesLogoColour; ?>;
}
<?php } ?>
<?php if($meanThemesHeadingColour) { ?>
/* Heading Colours */
h1,
h2, .content h2, h3, h4, h5, h6,
.the-contact h4,
.site-title,
.article-archive h2,
.footer-archive h4,
.contact-form h2,
h3#reply-title,
.comments h3,
header nav,
.meta, .meta a, .meta a:hover, .meta, .meta a, .meta a:hover, .single .meta .tag, .single .meta .tag-mini, .meta .author, .meta .author a 
{
color: <?php echo $meanThemesHeadingColour;?>;
}


<?php } ?>
<?php if($meanThemesLinkColour) { ?>
/* Link Colours */
a,
header nav ul li a,
header nav li.sfHover a,
.meta.top a, .meta.top .comments, p.form-submit input, button, input#searchsubmit {
color: <?php echo $meanThemesLinkColour; ?>;
}

<?php } ?>

<?php if($meanThemesHoverColour) { ?>
/* Hover Colours */
a:hover, 
.sidebar li.current_page_item a, 
header nav ul li a:hover,
header nav ul li,
.form-submit input,
.format-link a, .navigation a:hover, .flex-next:hover, .flex-prev:hover, a.more:hover, .meta.top a:hover, .article-archive h2 a:hover, .article-archive.format-link a:hover,
p.form-submit input:hover, 
button:hover, 
input#searchsubmit:hover
{
color: <?php echo $meanThemesHoverColour; ?>;
}
<?php } ?>
<?php if($meanThemesFooterTextColour) { ?>
footer, footer a, footer small, footer a:hover,
.footer-widget, footer, footer small, footer h5
{
color: <?php echo $meanThemesFooterTextColour; ?>;
}
<?php } ?>
<?php if($meanThemesFooterColour) { ?>
header nav ul ul,
footer {
background: <?php echo $meanThemesFooterColour; ?>;
}
<?php } ?>
<?php if($meanThemesButtonColour) { ?>
a.more, a.btn, .donate-more a.btn,
span.btn a,
span.more a,
button, input#searchsubmit, 
.navigation .nav-next a, 
.navigation .nav-previous a,
.comment-reply a,
.article-archive.format-link hgroup,
.article-archive.format-quote hgroup:hover,
.single-quote:hover {
background: <?php echo $meanThemesButtonColour; ?>;
}

<?php } ?>

<?php if($meanThemesMenuActiveColour) { ?>
header nav ul li a:hover, 
header nav li.current_page_item a,
header nav li.current-menu-item a,
header nav li.current_page_ancestor a, 
header nav li.current_page_parent a,
header nav li.current-post-ancestor a {
color: <?php echo $meanThemesMenuActiveColour; ?>;
}
<?php } ?>

<?php if($meanThemesButtonColourHover) { ?>
a:hover.more, a.btn:hover, .donate-more a.btn:hover,
span.more a:hover, 
span.btn a:hover, 
button:hover, input#searchsubmit:hover, 
.form-submit input:hover,
.navigation .nav-next a:hover, 
.navigation .nav-previous a:hover,
.comment-reply a:hover,
.article-archive.format-quote hgroup,
.single-quote {
background: <?php echo $meanThemesButtonColourHover; ?>;
}
<?php } ?>
<?php if($meanThemesArchiveDark) { ?>
.article-archive,
.article-archive.format-link:hover,
.article-archive.format-aside:hover {
background: <?php echo $meanThemesArchiveDark; ?>
}
<?php } ?>
<?php if($meanThemesArchiveOnDarkText) { ?>
.article-archive {
color: <?php echo $meanThemesArchiveOnDarkText; ?>
}
<?php } ?>

<?php if($meanThemesArchiveOnDarkLink) { ?>
.article-archive .meta a,
.article-archive.format-link a,
.article-archive.format-aside a,
.article-archive h2 a:hover, .article-archive a.more, 
.article-archive .flex-container a {
color: <?php echo $meanThemesArchiveOnDarkLink; ?>
}
<?php } ?>
<?php if($meanThemesArchiveOnDarkLinkHover) { ?>
.article-archive .meta a:hover,
.article-archive.format-link a:hover,
.article-archive.format-aside a:hover,
.article-archive h2 a, .article-archive a:hover.more, 
.article-archive .flex-container a:hover {
color: <?php echo $meanThemesArchiveOnDarkLinkHover; ?>
}
<?php } ?>

<?php if($meanThemesArchiveBright) { ?>
.article-archive.format-link,
.article-archive.format-aside, .navigation,
.donate-block, .donate-message {
background: <?php echo $meanThemesArchiveBright; ?>
}
.donate {
border-top: 58px solid <?php echo $meanThemesArchiveBright; ?>;
}
<?php } ?>
<?php if($meanThemesArchiveOnBrightText) { ?>
.article-archive.format-link,
.article-archive.format-link a,
.article-archive.format-aside, 
.article-archive.format-aside a, 
.navigation,
.navigation a,
a.donate-trigger, 
a.donate-trigger:hover,
.donate-message,
.format-link p, .format-quote p {
color: <?php echo $meanThemesArchiveOnBrightText;  ?>
}
<?php } ?>

<?php if($meanThemesArchiveOnBrightLink) { ?>
.article-archive.format-link a,
.article-archive.format-aside a {
color: <?php echo $meanThemesArchiveOnBrightLink;  ?>
}
<?php } ?>
<?php if($meanThemesArchiveOnBrightLinkHover) { ?>
.article-archive.format-link a:hover,
.article-archive.format-aside a:hover,
.navigation a:hover {
color: <?php echo $meanThemesArchiveOnBrightLinkHover; ?>
}
<?php } ?>

<?php if($meanThemesSidebarColour) { ?>
.sidebar { 
background: <?php echo $meanThemesSidebarColour; ?>
}
<?php } ?>
<?php if($meanThemesMobileMenu) { ?>
.mean-container .mean-bar, 
.mean-container .mean-nav { 
background: <?php echo $meanThemesMobileMenu; ?>
}
<?php } ?>
<?php if($meanThemesUppercase) { ?>
h1, h2, h3, h4, h5, h6, nav, span.site-title, span.strap, .meta, a.more, .format-link a, .format-link p, .format-quote p,
.flex-next, .flex-prev, .navigation, a.url, a.comment-date, .comment-reply, p.form-submit input, .single-quote, button, input#searchsubmit {
text-transform: uppercase; 
}
<?php } ?>
<?php if( $styling_options[ 'googlefonts_advanced' ] ) { ?>	
	<?php echo sanitize_text_field( $styling_options['googlefonts_advanced_css'] ); ?>	
<?php } ?>		

<?php echo sanitize_text_field( $styling_options['css_block'] ); ?>

