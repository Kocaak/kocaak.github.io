<?php

/*----Custom Header Color----*/ 
function financeup_custom_header_color() {
$financeup_top_background = get_theme_mod('financeup_top_background');
$financeup_top_color = get_theme_mod('financeup_top_color');
$financeup_site_title_color = get_theme_mod('financeup_site_title_color');
$financeup_header_background = get_theme_mod('financeup_header_background');
$financeup_menu_background = get_theme_mod('financeup_menu_background');
$financeup_menu_bar = get_theme_mod('financeup_menu_bar');
$financeup_menu_background_hover = get_theme_mod('financeup_menu_background_hover');
$financeup_menu_border_color = get_theme_mod('financeup_menu_border_color');
$financeup_menu_border_active_color = get_theme_mod('financeup_menu_border_active_color');
$financeup_menu_color = get_theme_mod('financeup_menu_color');
$financeup_menu_active_color = get_theme_mod('financeup_menu_active_color');
$financeup_menu_submenu_background = get_theme_mod('financeup_menu_submenu_background');
$financeup_menu_submenu_background_hover = get_theme_mod('financeup_menu_submenu_background_hover');
$financeup_menu_submenu_color = get_theme_mod('financeup_menu_submenu_color');
?>
<style type="text/css">
.ta-head-detail{
	background: <?php echo esc_attr( $financeup_top_background);?>;
}
.ta-head-detail .info-left li a , .ta-head-detail li a i, .ta-head-detail .info-right li a {
	color: <?php echo esc_attr( $financeup_top_color);?>;
}
/*=== navbar menu Background hover color ===*/ 
.navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li > a:focus, .navbar-wp .navbar-nav > li > a.active {
	background:<?php echo esc_attr( $financeup_menu_background_hover);?>;
}
/*=== navbar background color ===*/ 
.navbar-wp .navbar-nav > li > a {
	background:<?php echo esc_attr( $financeup_menu_background);?>;
}
/*=== navbar text color ===*/ 
.navbar-wp .navbar-nav > li > a {
	color: <?php echo esc_attr( $financeup_menu_color);?>;
}
/*=== navbar text color ===*/ 
.navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li > a:focus, .navbar-wp .navbar-nav > li > a.active {
	color:<?php echo esc_attr( $financeup_menu_active_color);?>;
}
/*=== navbar hover border-color ===*/
.navbar-wp .navbar-nav > li > a {
	border-color: <?php echo $financeup_menu_border_color;?>;
}
/*=== navbar hover active ===*/
.navbar-wp .navbar-nav > .active > a, .navbar-wp .navbar-nav > .active > a:hover, .navbar-wp .navbar-nav > .active > a:focus, .navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li > a:focus, .navbar-wp .navbar-nav > .open > a, .navbar-wp .navbar-nav > .open > a:hover, .navbar-wp .navbar-nav > .open > a:focus, .navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li >a:focus {
	background-color:<?php echo esc_attr( $financeup_menu_background_hover);?>;
}
/*=== navbar Menu Border Bottom Hover color ===*/ 
.navbar-wp .navbar-nav > li > ul::before {
	border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) <?php echo esc_attr( $financeup_menu_border_active_color);?>;
}
.navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li > a:focus,  .navbar-wp .navbar-nav > .active > a, .navbar-wp .navbar-nav > .active > a:hover, .navbar-wp .navbar-nav > .active > a:focus, .navbar-wp .navbar-nav > .open > a, .navbar-wp .navbar-nav > .open > a:hover, .navbar-wp .navbar-nav > .open > a:focus, .navbar-wp .navbar-toggle:hover, .navbar-wp .navbar-toggle:focus {
	border-color: <?php echo esc_attr( $financeup_menu_border_active_color);?>;
}
.navbar-wp .navbar-nav > .dropdown > a .caret, .navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li > a:focus, .navbar-wp .navbar-nav > .active > a, .navbar-wp .navbar-nav > .active > a:hover, .navbar-wp .navbar-nav > .active > a:focus {
	border-bottom-color:<?php echo esc_attr( $financeup_menu_border_active_color);?>;
}

/*=== navbar dropdown text color ===*/ 
.navbar-toggle, .navbar-wp .dropdown-menu > li > a, .navbar-wp .navbar-nav > li > a.dropdown-form-toggle {
	color: <?php echo esc_attr( $financeup_menu_submenu_color);?>;
}
/*=== navbar dropdown background Hover color ===*/ 
.ta-search-box .ta-search .btn, .navbar-wp .dropdown-menu > a, .navbar-wp .dropdown-menu > li > a, .navbar-wp .navbar-toggle {
	background: <?php echo esc_attr( $financeup_menu_submenu_background);?>;
}
/*=== navbar dropdown background Hover color ===*/ 
.navbar-wp .dropdown-menu > .active > a, .navbar-wp .dropdown-menu > .active > a:hover, .navbar-wp .dropdown-menu > .active > a:focus, .navbar-wp .dropdown-menu > li > a:hover, .navbar-wp .navbar-toggle:hover, .navbar-wp .navbar-toggle:focus, .ta-search-box .ta-search .btn {
	background: <?php echo esc_attr( $financeup_menu_submenu_background_hover);?>;
}

/*=== navbar Title color ===*/ 
.navbar-header .navbar-brand {
	color: <?php echo esc_attr( $financeup_site_title_color);?>;
}
/*=== navbar background color ===*/ 
.ta-main-nav {
	background: <?php echo esc_attr( $financeup_header_background);?>;
}
.navbar-wp {
	background: <?php echo esc_attr( $financeup_menu_bar);?>;
}
</style>
<?php
}

/*----Custom Footer Color----*/ 
function financeup_custom_footer_color() {
$financeup_footer_background = get_theme_mod('financeup_footer_background','#202830');
$financeup_footer_head_color = get_theme_mod('financeup_footer_head_color');
$financeup_footer_text_color = get_theme_mod('financeup_footer_text_color','#fff');
$financeup_footer_copy_background = get_theme_mod('financeup_footer_copy_background');
$financeup_footer_copy_color = get_theme_mod('financeup_footer_copy_color');
?>
<style type="text/css">
/*==================== footer background ====================*/
footer {
	background: <?php echo esc_attr( $financeup_footer_background);?>;
}
footer .ta-footer-copyright {
	background: <?php echo esc_attr( $financeup_footer_copy_background);?>;
}
footer .ta-footer-copyright p, footer .ta-footer-copyright a {
	color: <?php echo esc_attr( $financeup_footer_copy_color);?>;
}
footer .ta-footer-copyright a:hover, footer .ta-footer-copyright a:focus {
	color: #fff;
}
footer .ta-footer-widget-area {
	border-top-color: rgba(225,225,225,0.2);
}
/*==================== footer color ====================*/
/*=== footer heading color ===*/
footer .ta-widget h6 {
	color: <?php echo esc_attr( $financeup_footer_head_color);?>;
}

footer .ta-widget .calendar_wrap table thead th, label, footer p, footer .ta-blog-post span, footer .ta-widget .textwidget, footer a, footer .ta-widget .list-unstyled li a, footer .ta-widget .ta-twitter-feed li, footer .ta-widget .ta-widget-address li, footer .ta-widget .ta-social li span.icon-soci, footer .ta-widget .ta-opening-hours li, footer .ta-widget .ta-widget-tags a ,footer .ta-widget .tagcloud a, footer .ta-widget-quote .form-control, footer .ta-widget-tollfree li a, footer .ta-widget-tollfree li i, footer .ta-widget-payment a, footer .ta-calendar a:hover, footer .ta-calendar thead th, footer .wpcf7-form p, footer .ta-widget .wpcf7-form .wpcf7-form-control {
	color: <?php echo esc_attr( $financeup_footer_text_color);?>;
}

footer .ta-widget .form-control, footer .ta-widget ul li, footer .ta-widget .list-unstyled li, footer .ta-widget .ta-social li span.icon-soci, footer .calendar_wrap caption, footer .ta-widget .ta-widget-tags a, footer .ta-widget .tagcloud a, footer .calendar_wrap table thead th  {
	border-color: <?php echo esc_attr( $financeup_footer_text_color);?>;
}
/*==================== footer hover color ====================*/
footer a:hover, footer a:focus, footer .ta-widget .ta-subscribe:hover, footer .ta-widget .ta-subscribe:focus, footer .ta-widget .ta-search-widget .btn:hover, footer .ta-widget .ta-search-widget .btn:focus, footer .ta-widget .list-unstyled li a:hover, footer .ta-widget .ta-opening-hours li:hover, footer .ta-widget .ta-widget-address li span.icon-addr, footer .ta-widget .ta-social li span.icon-soci:hover i, footer .ta-widget .ta-social li span.icon-soci:hover, footer .ta-widget .ta-widget-tags a:hover ,footer .ta-widget .tagcloud a:hover, footer .ta-calendar a, footer .ta-calendar tbody td, footer .ta-calendar tbody #today {
	color: #fff;
}

footer .ta-calendar tbody #today:hover, footer .ta-calendar tbody td:hover, footer .ta-calendar tfoot, footer .ta-calendar tfoot a {
	color: #333;
}
</style>
<?php
} ?>