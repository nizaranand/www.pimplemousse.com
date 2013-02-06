<?php
global $tt_framework;

$position = 'fixed';
if($tt_framework->getOption('stonking_sidebar_scrillable') == 'true') $position = 'absolute';

$logo_top = $tt_framework->getOption('stonking_logo_topmargin') - 20;
$menu_top = $tt_framework->getOption('stonking_menu_topmargin') - 30;

return <<<CSS
body {
    font-size: {$tt_framework->getOption('stonking_fontsize_pagetext')}px;
    font-family:"{$tt_framework->getOption('stonking_font_default')}";
    line-height: {$tt_framework->getOption('stonking_fontsize_lineheight')}px;
    color: {$tt_framework->getOption('stonking_color_pagetext')};
	background: url('../images/{$tt_framework->getOption('stonking_color_pattern')}.png') fixed {$tt_framework->getOption('stonking_color_bg')};
}
img.site-name {
    height: {$tt_framework->getOption('stonking_logo_height')}px;
    width: {$tt_framework->getOption('stonking_logo_width')}px;
}
.logo {
    margin-top: {$logo_top}px;
}
ul.main-nav {
    margin-top: {$menu_top}px;
}
.sidebars-container {
	background-color: {$tt_framework->getOption('stonking_color_sidebarbg')};
/*	position: {$position}; */
}
.article-block {
    margin-bottom: {$tt_framework->getOption('stonking_blog_gapposts')}px;
}
.article, .single-sidebar-box {
	background-color: {$tt_framework->getOption('stonking_color_mainbg')};
}
.masoned-article {
	background-color: {$tt_framework->getOption('stonking_color_mainbg')};
}
.article-content h1.article-title {
    font-size: {$tt_framework->getOption('stonking_fontsize_articletitle')}px;
	color: {$tt_framework->getOption('stonking_color_pagetitle')};
}
h1.article-title a {
	color: {$tt_framework->getOption('stonking_color_pagetitle')};
}

a.imgSmall,
a.imgMedium,
a.imgLarge,
a.imgTall {
	height: {$tt_framework->getOption('stonking_port_imgheight1col')}px;
}
.article-image iframe,.article-image embed {
	height: {$tt_framework->getOption('stonking_port_imgheight1col')}px;
}
.masoned-article .article-image {
    height: {$tt_framework->getOption('stonking_port_imgheight1col')}px;
	background-color: {$tt_framework->getOption('stonking_color_mainbg')};
}
.portfolio-items .article-image a img {
    height: {$tt_framework->getOption('stonking_port_imgheight1col')}px;
}
.portfolio-items .article-image-border {
    height: {$tt_framework->getOption('stonking_port_imgheight1col')}px;
}

.article-content h1 {
    font-size: {$tt_framework->getOption('stonking_fontsize_h1')}px;
    color: {$tt_framework->getOption('stonking_color_h1')};
}
.article-content h2 {
    font-size: {$tt_framework->getOption('stonking_fontsize_h2')}px;
    color: {$tt_framework->getOption('stonking_color_h2')};
}
.article-content h3 {
    font-size: {$tt_framework->getOption('stonking_fontsize_h3')}px;
    color: {$tt_framework->getOption('stonking_color_h3')};
}
.article-content h4 {
    font-size: {$tt_framework->getOption('stonking_fontsize_h4')}px;
    color: {$tt_framework->getOption('stonking_color_h4')};
}
.article-content h5 {
    font-size: {$tt_framework->getOption('stonking_fontsize_h5')}px;
    color: {$tt_framework->getOption('stonking_color_h5')};
}
.article-content h6 {
    font-size: {$tt_framework->getOption('stonking_fontsize_h6')}px;
    color: {$tt_framework->getOption('stonking_color_h6')};
}
/* LINK */

.article-content a {
	color: {$tt_framework->getOption('stonking_color_pagelink')};
}
.article-content a:hover {
	color: {$tt_framework->getOption('stonking_color_pagelinkhover')};
}

/* Logo */
h1.site-name {
    font-size: {$tt_framework->getOption('stonking_fontsize_logo')}px;
    color: {$tt_framework->getOption('stonking_color_logotext')};
}
.site-desc {
    font-size: {$tt_framework->getOption('stonking_fontsize_logodesc')}px;
    color: {$tt_framework->getOption('stonking_color_logodesc')};
}

/* Top menu */
ul.main-nav li a {
    font-size: {$tt_framework->getOption('stonking_fontsize_menu')}px;
    color: {$tt_framework->getOption('stonking_color_menu')};
}
ul.main-nav li a:hover {
	/*background-color: {$tt_framework->getOption('stonking_color_menuhoverbg')};*/
    color: {$tt_framework->getOption('stonking_color_menuhover')};
}
ul.main-nav li.current-menu-item a {
	/*background-color: {$tt_framework->getOption('stonking_color_menuhoverbg')};*/
    color: {$tt_framework->getOption('stonking_color_menucurrent')};
}

/* Sub menu */
ul.sub-menu li a, ul.sub-menu li li a {
    font-size: {$tt_framework->getOption('stonking_fontsize_submenu')}px;
    color: {$tt_framework->getOption('stonking_color_submenu')} !important;
	background: none !important;
}
ul.sub-menu li, ul.sub-menu li li {
	background-color: {$tt_framework->getOption('stonking_color_submenubg')};
}
ul.sub-menu li a:hover, ul.sub-menu li a:active, ul.sub-menu li li a:hover {
	color: {$tt_framework->getOption('stonking_color_submenuhover')} !important;
	background: none !important;
}
ul.main-nav li ul.sub-menu li:hover {
	color: {$tt_framework->getOption('stonking_color_submenuhover')} !important;
	background-color: {$tt_framework->getOption('stonking_color_submenubghover')};
}

/* Portfolio filter */
.portfolio-filter-item a {
	font-size: {$tt_framework->getOption('stonking_fontsize_portfilter')}px;
	color: {$tt_framework->getOption('stonking_color_portmenu')} !important;
	/*background-color: {$tt_framework->getOption('stonking_color_portmenubg')} !important;*/
}
.portfolio-filter .portfolio-filter-item a:hover, .portfolio-filter .portfolio-filter-item a:active {
	color: {$tt_framework->getOption('stonking_color_portmenuhover')} !important;
	/*background-color: {$tt_framework->getOption('stonking_color_portmenubghover')} !important;*/
}
/*.portfolio-filter-item a:hover, .portfolio-filter-item a.filtered {
	background-color: {$tt_framework->getOption('stonking_color_portmenubghover')} !important;
}*/

/* Features section */
.teaser-text {
    font-size: {$tt_framework->getOption('stonking_fontsize_teaser')}px;
    color: {$tt_framework->getOption('stonking_color_teasertext')};
}

.tumblog-meta {
    font-size: {$tt_framework->getOption('stonking_fontsize_postmeta')}px;
    color: {$tt_framework->getOption('stonking_color_postmeta')}; 
} 
.tumblog-meta a {
    font-size: {$tt_framework->getOption('stonking_fontsize_postmeta')}px;
    color: {$tt_framework->getOption('stonking_color_postmeta')}; 
}
.article-info a{
    color: {$tt_framework->getOption('stonking_color_breadcrumblink')};
}
.article-info a:hover{
    color: {$tt_framework->getOption('stonking_color_breadcrumblinkhover')};
}
.date {
    color: {$tt_framework->getOption('stonking_color_postmetadate')};
}
.article-author {
    border-color: {$tt_framework->getOption('stonking_color_postmetadatebg')};
}
a.more-link {
    color: {$tt_framework->getOption('stonking_color_readmorelink')};
}
a.more-link:hover {
    color: {$tt_framework->getOption('stonking_color_readmorelinkhover')};
}
.sidebar {
    font-size: {$tt_framework->getOption('stonking_fontsize_sidebartext')}px;
    color: {$tt_framework->getOption('stonking_color_sidebartext')};
}
.sidebar h1{
    font-size: {$tt_framework->getOption('stonking_fontsize_sidebartitle')}px;
    color: {$tt_framework->getOption('stonking_color_sidebartitle')};
}
.sidebar a {
    color: {$tt_framework->getOption('stonking_color_sidebarlink')};
}
.sidebar a:hover{
    color: {$tt_framework->getOption('stonking_color_sidebarlinkhover')};
}
.sidebar ul li a {
    color: {$tt_framework->getOption('stonking_color_sidebarlink')};
}
.sidebar ul li a:hover{
    color: {$tt_framework->getOption('stonking_color_sidebarlinkhover')};
}
.copyrights {
    font-size: {$tt_framework->getOption('stonking_fontsize_copyright')}px;
    color: {$tt_framework->getOption('stonking_color_copyright')};
}

{$tt_framework->getOption('stonking_custom_css')}
CSS;
?>