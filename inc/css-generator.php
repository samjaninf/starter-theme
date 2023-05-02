<?php

// css from customizer
function hovercraft_generate_css(){
	
	$url_hero_video = wp_get_attachment_url( get_theme_mod( 'hovercraft_video' ) ); 
	$url_header_image = esc_url( get_header_image() );
	$url_featured_image = wp_get_attachment_url( get_post_thumbnail_id(), 'large' ); 
	
	if (!empty( $url_featured_image )) { 
		$hero_image = $url_featured_image; 
	} else { 
		$hero_image = $url_header_image; 
	}
    
	$basic_hero_header_link_color = get_theme_mod( 'hovercraft_basic_hero_header_link_color', '#5C6BC0' );
	$basic_hero_header_text_color = get_theme_mod( 'hovercraft_basic_hero_header_text_color', '#263238' );
	$mini_hero_header_link_color = get_theme_mod( 'hovercraft_mini_hero_header_link_color', '#5C6BC0' );
	$mini_hero_header_text_color = get_theme_mod( 'hovercraft_mini_hero_header_text_color', '#263238' );
	$full_hero_background_position = get_theme_mod( 'hovercraft_full_hero_background_position', 'center_center' );
	$half_hero_background_position = get_theme_mod( 'hovercraft_half_hero_background_position', 'center_center' );
	$mini_hero_background_position = get_theme_mod( 'hovercraft_mini_hero_background_position', 'center_center' );
	$sitewide_layout = get_theme_mod( 'hovercraft_sitewide_layout', 'floating_islands' );
	$scroll_to_top = get_theme_mod( 'hovercraft_scroll_to_top', 'mobile_only' );
	$mobile_topbar_widget = get_theme_mod( 'hovercraft_mobile_topbar', 'topbar_left' );
	$mobile_preheader_widget = get_theme_mod( 'hovercraft_mobile_preheader', 'none' );
	$desktop_logo_width = get_theme_mod( 'hovercraft_desktop_logo_width', '150' );
	$mobile_logo_width = get_theme_mod( 'hovercraft_mobile_logo_width', '100' );
	$default_font_family = get_theme_mod( 'hovercraft_default_font', 'noto_sans' );
	$site_name_font_family = get_theme_mod( 'hovercraft_site_name_font', 'noto_sans' );
	$site_name_mobile_font_size = get_theme_mod( 'hovercraft_site_name_mobile_font_size', '24' );
	$site_name_desktop_font_size = get_theme_mod( 'hovercraft_site_name_desktop_font_size', '36' );
	$site_name_font_weight = get_theme_mod( 'hovercraft_site_name_font_weight', '700' );
	$hero_gradient_angle = get_theme_mod( 'hovercraft_hero_gradient_angle', '60deg' );
	$hero_gradient_start_color_transparency = get_theme_mod( 'hovercraft_hero_gradient_start_color_transparency', '0.50' );
	$hero_gradient_stop_color_transparency = get_theme_mod( 'hovercraft_hero_gradient_stop_color_transparency', '0.50' );
	$hero_gradient_start_color_length = get_theme_mod( 'hovercraft_hero_gradient_start_color_length', '30' );
	$hero_gradient_stop_color_length = get_theme_mod( 'hovercraft_hero_gradient_stop_color_length', '100' );
	$hero_content_width_desktop = get_theme_mod( 'hovercraft_hero_content_width_desktop', '900px' );
	$default_text_color = get_theme_mod( 'hovercraft_default_text_color', '#263238' );
	$default_link_color = get_theme_mod( 'hovercraft_default_link_color', '#5C6BC0' );
	$default_link_decoration = get_theme_mod( 'hovercraft_default_link_decoration', 'underline' );
	$default_hover_color = get_theme_mod( 'hovercraft_default_hover_color', '#283593' );
	$topbar_background_color = get_theme_mod( 'hovercraft_topbar_background_color', '#263238' );
	$topbar_text_color = get_theme_mod( 'hovercraft_topbar_text_color', '#ffffff' );
	$topbar_link_color = get_theme_mod( 'hovercraft_topbar_link_color', '#ffffff' );
	$topbar_link_decoration = get_theme_mod( 'hovercraft_topbar_link_decoration', 'underline' );
	$preheader_background_color = get_theme_mod( 'hovercraft_preheader_background_color', '#eceff1' );
	$preheader_text_color = get_theme_mod( 'hovercraft_preheader_text_color', '#263238' );
	$preheader_link_color = get_theme_mod( 'hovercraft_preheader_link_color', '#263238' );
	$preheader_link_decoration = get_theme_mod( 'hovercraft_preheader_link_decoration', 'underline' );
	$hero_gradient_start_color = get_theme_mod( 'hovercraft_hero_gradient_start_color', '#37474f' );
	$hero_gradient_stop_color = get_theme_mod( 'hovercraft_hero_gradient_stop_color', '#ffffff' );
    $header_half_hero_background_color = get_theme_mod( 'hovercraft_header_half_hero_background_color', '#ffffff' ); 
    $header_mini_hero_background_color = get_theme_mod( 'hovercraft_header_mini_hero_background_color', '#ffffff' );
    $header_basic_background_color = get_theme_mod( 'hovercraft_header_basic_background_color', '#eceff1' );
	$posthero_background_color = get_theme_mod( 'hovercraft_posthero_background_color', '#eceff1' );
	$posthero_text_color = get_theme_mod( 'hovercraft_posthero_text_color', '#263238' );
	$posthero_link_color = get_theme_mod( 'hovercraft_posthero_link_color', '#5C6BC0' );
	$posthero_link_decoration = get_theme_mod( 'hovercraft_posthero_link_decoration', 'underline' );
	$sidebar_callout_background_color = get_theme_mod( 'hovercraft_sidebar_callout_background_color', '#283593' );
	$sidebar_callout_text_color = get_theme_mod( 'hovercraft_sidebar_callout_text_color', '#ffffff' );
	$sidebar_callout_link_color = get_theme_mod( 'hovercraft_sidebar_callout_link_color', '#ffffff' );
	$main_background_color = get_theme_mod( 'hovercraft_main_background_color', '#eceff1' );
    $prefooter_top_background_color = get_theme_mod( 'hovercraft_prefooter_top_background_color', '#eceff1' );
	$prefooter_top_text_color = get_theme_mod( 'hovercraft_prefooter_top_text_color', '#263238' );
	$prefooter_top_link_color = get_theme_mod( 'hovercraft_prefooter_top_link_color', '#5C6BC0' );
	$prefooter_top_link_decoration = get_theme_mod( 'hovercraft_prefooter_top_link_decoration', 'underline' );
    $prefooter_bottom_background_color = get_theme_mod( 'hovercraft_prefooter_bottom_background_color', '#263238' );
	$prefooter_bottom_text_color = get_theme_mod( 'hovercraft_prefooter_bottom_text_color', '#ffffff' );
	$prefooter_bottom_link_color = get_theme_mod( 'hovercraft_prefooter_bottom_link_color', '#5C6BC0' );
	$prefooter_bottom_link_decoration = get_theme_mod( 'hovercraft_prefooter_bottom_link_decoration', 'underline' );
    $footer_background_color = get_theme_mod( 'hovercraft_footer_background_color', '#eceff1' );
	$footer_text_color = get_theme_mod( 'hovercraft_footer_text_color', '#263238' );
	$footer_link_color = get_theme_mod( 'hovercraft_footer_link_color', '#5C6BC0' );
	$footer_link_decoration = get_theme_mod( 'hovercraft_footer_link_decoration', 'underline' );
    $copyright_background_color = get_theme_mod( 'hovercraft_copyright_background_color', '#eceff1' );
	$copyright_text_color = get_theme_mod( 'hovercraft_copyright_text_color', '#263238' );
	$copyright_link_color = get_theme_mod( 'hovercraft_copyright_link_color', '#5C6BC0' );
	$copyright_link_decoration = get_theme_mod( 'hovercraft_copyright_link_decoration', 'underline' );
     
    ?>

<style type="text/css" id="hovercraft_custom_css">
html, body {
	font-family: <?php echo ucwords(str_replace("_", " ", $default_font_family)); ?>;
	color: <?php echo $default_text_color; ?>;
}


/* logo */

@media screen and (max-width: 1200px) {
.site-logo {
	width: <?php echo $mobile_logo_width; ?>px !important;
	max-width: <?php echo $mobile_logo_width; ?>px !important;
	height: auto;
	margin-right: 10px;
	display: inline-block;
	}
}

@media screen and (min-width: 1200px) {
.site-logo {
	width: <?php echo $desktop_logo_width; ?>px !important;
	max-width: <?php echo $desktop_logo_width; ?>px !important;
	height: auto;
	margin-right: 20px;
	display: inline-block;
	}
}


/* site name */

@media screen and (max-width: 1200px) {
.site-name {
	font-family: <?php echo ucwords(str_replace("_", " ", $site_name_font_family)); ?>;
	font-weight: <?php echo $site_name_font_weight; ?>;
	font-size: <?php echo $site_name_mobile_font_size; ?>px;
	line-height: 1; /* because site-tagline is hidden on mobile */
	display: block;
	}
}

@media screen and (min-width: 1200px) {
.site-name {
	font-family: <?php echo ucwords(str_replace("_", " ", $site_name_font_family)); ?>;
	font-weight: <?php echo $site_name_font_weight; ?>;
	font-size: <?php echo $site_name_desktop_font_size; ?>px;
	display: block;
	}
}

/* general */
	
.white {
	color: #ffffff !important;
}

.full-width {
	width: 100%;
}

.center {
	text-align: center;
}
	
/* links */

a {
	color: <?php echo $default_link_color; ?>;
	text-decoration: <?php echo $default_link_decoration; ?>;
}
	
.cta-hero-primary ul li a {
	background: <?php echo $default_link_color; ?>;
}
	
a:hover {
	color: <?php echo $default_hover_color; ?>;
}
	
.cta-hero-primary ul li a:hover {
	background: <?php echo $default_hover_color; ?>;
}

/* images */
	
.alignright { 
	float: right; 
	margin: 0 0 20px 20px; 
}

.alignleft { 
	float: left; 
	margin: 0 20px 20px 0; 
}

.aligncenter { 
	display: block; 
	margin-left: auto; 
	margin-right: auto; 
}

.wp-caption-text {
	font-size: 12px;
	color: #444;
}

/* tiles */

.tile i {
	color: <?php echo $default_hover_color; ?>;
}


/* topbar */

@media screen and (max-width: 1200px) {
#topbar {
	width: 100%;
	padding: 10px 20px;
	font-size: 14px;
	line-height: 1.5;
	background: <?php echo $topbar_background_color; ?>;
	color: <?php echo $topbar_text_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
#topbar {
	width: 100%;
	padding: 10px 0px;
	font-size: 14px;
	line-height: 1.5;
	display: table;
	background: <?php echo $topbar_background_color; ?>;
	color: <?php echo $topbar_text_color; ?>;
	}
}

#topbar a {
	color: <?php echo $topbar_link_color; ?>;
	text-decoration: <?php echo $topbar_link_decoration; ?>;
}

#topbar p {
	margin-bottom: 0;
}
	
@media screen and (max-width: 1200px) {
.topbar-left {
    vertical-align: middle;
	text-align: center;
	<?php if ( $mobile_topbar_widget == 'topbar_right') { echo "display: none;"; } ?>
	}
}

@media screen and (min-width: 1200px) {
.topbar-left {
	display:table-cell;
    vertical-align:middle;
	height:inherit;
	white-space:nowrap;
	width:auto;
	text-align:left;
	}
}

@media screen and (max-width: 1200px) {
.topbar-right {
	vertical-align: middle;
	text-align: center;
	<?php if ( $mobile_topbar_widget == 'topbar_left') { echo "display: none;"; } ?>
	}
}

@media screen and (min-width: 1200px) {
.topbar-right {
	display:table-cell;
    vertical-align:middle;
	height:inherit;
	text-align:right;
	width:100%;
	}
}
	
@media screen and (max-width: 1200px) {
.topbar-center {
	text-align: center;
	}
}

@media screen and (min-width: 1200px) {
.topbar-center {
    vertical-align: middle;
	height: inherit;
	text-align: center;
	}
}


/* preheader */

@media screen and (max-width: 1200px) {
#preheader {
	width: 100%;
	padding: 10px 20px;
	font-size: 14px;
	line-height: 1.5;
	background: <?php echo $preheader_background_color; ?>;
	color: <?php echo $preheader_text_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
#preheader {
	width: 100%;
	padding: 10px 0px;
	font-size: 14px;
	line-height: 1.5;
	display: table;
	background: <?php echo $preheader_background_color; ?>;
	color: <?php echo $preheader_text_color; ?>;
	}
}

#preheader a {
	color: <?php echo $preheader_link_color; ?>;
	text-decoration: <?php echo $preheader_link_decoration; ?>;
}

#preheader p {
	margin-bottom: 0;
}
	
@media screen and (max-width: 1200px) {
.preheader-left {
    vertical-align: middle;
	text-align: center;
	<?php if ( $mobile_preheader_widget == 'preheader_right') { echo "display: none;"; } ?>
	}
}

@media screen and (min-width: 1200px) {
.preheader-left {
	display:table-cell;
    vertical-align:middle;
	height:inherit;
	white-space:nowrap;
	width:auto;
	text-align:left;
	}
}

@media screen and (max-width: 1200px) {
.preheader-right {
	vertical-align: middle;
	text-align: center;
	<?php if ( $mobile_preheader_widget == 'preheader_left') { echo "display: none;"; } ?>
	}
}

@media screen and (min-width: 1200px) {
.preheader-right {
	display:table-cell;
    vertical-align:middle;
	height:inherit;
	text-align:right;
	width:100%;
	}
}
	
@media screen and (max-width: 1200px) {
.preheader-center {
	text-align: center;
	}
}

@media screen and (min-width: 1200px) {
.preheader-center {
    vertical-align: middle;
	height: inherit;
	text-align: center;
	}
}

#hero-full-container {
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
	background-position: <?php $fullpos = str_replace('_',' ',$full_hero_background_position); echo $fullpos; ?>;
	background-size: cover;
	background-repeat: no-repeat;
}

video.hero-background-video {
	width: 100%; /* correct */
	height: 100%; /* correct */
	object-fit: cover; /* simulates background-size: cover */
  	position: absolute; /* correct */
  	top: 0;
  	left: 0;
}

.hero-background-video-overlay {
	width: 100%; /* correct */
	height: 100%; /* correct */
	object-fit: cover; /* simulates background-size: cover */
  	position: absolute; /* correct */
  	top: 0;
  	left: 0;
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%);
	background-position: top center;
	background-size: cover;
	background-repeat: no-repeat;
}
	
.hero-half {
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
	background-position: <?php $halfpos = str_replace('_',' ',$half_hero_background_position); echo $halfpos; ?>;
	background-size: cover;
	background-repeat: no-repeat;
}

#header-half-hero {
	background: <?php echo $header_half_hero_background_color; ?>;
}

/* mini header */

#hero-mini {
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
	background-position: <?php $minipos = str_replace('_',' ',$mini_hero_background_position); echo $minipos; ?>;
	background-size: cover;
	background-repeat: no-repeat;
}
	
.hero-main-mini {
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%), url(<?php echo $hero_image; ?>);
	background-position: <?php $minipos = str_replace('_',' ',$mini_hero_background_position); echo $minipos; ?>;
	background-size: cover;
	background-repeat: no-repeat;
}

@media screen and (max-width: 1200px) {
#header-mini-hero {
	width: 100%;
	display: table;
	padding: 10px 20px;
	border-bottom: 1px solid transparent;
	background: <?php echo $header_mini_hero_background_color; ?>;
	color: <?php echo $mini_hero_header_text_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
#header-mini-hero {
	width: 100%;
	display: table;
	margin: 0px auto;
	padding: 20px 0px;
	border-bottom: 1px solid transparent;
	background: <?php echo $header_mini_hero_background_color; ?>;
	color: <?php echo $mini_hero_header_text_color; ?>;
	}
}
	
#header-mini-hero .main-menu ul li a {
	text-decoration: none;
	color: <?php echo $mini_hero_header_link_color; ?>;
	font-weight: 600;
}

#header-mini-hero a {
	color: <?php echo $mini_hero_header_link_color; ?>;
}

/* basic header */

@media screen and (max-width: 1200px) {
#header-basic {
	width: 100%;
	display: table;
	padding: 10px 20px;
	border-bottom: 1px solid transparent;
	background: <?php echo $header_basic_background_color; ?>;
	color: <?php echo $basic_hero_header_text_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
#header-basic {
	width: 100%;
	display: table;
	margin: 0px auto;
	padding: 20px 0px;
	border-bottom: 1px solid transparent;
	background: <?php echo $header_basic_background_color; ?>;
	color: <?php echo $basic_hero_header_text_color; ?>;
	}
}

#header-basic .main-menu ul li a {
	text-decoration: none;
	color: <?php echo $basic_hero_header_link_color; ?>;
	font-weight: 600;
}

#header-basic a {
	color: <?php echo $basic_hero_header_link_color; ?>;
}

	
.cta-header-primary ul li a {
	font-size: 18px;
	font-weight: 700;
	display: inline-block;
	padding: 10px 20px;
	background: <?php echo $default_link_color; ?>;
	text-decoration: none !important;
	border-radius: 5px;
}

.cta-header-primary ul li a:hover {
	background: <?php echo $default_hover_color; ?>;
}

@media screen and (min-width: 1200px) {
.welcome-wrapper {
	max-width: <?php echo $hero_content_width_desktop; ?>;
	}
}

@media screen and (max-width: 1200px) {
#posthero {
	width: 100%;
	padding: 30px 20px;
	text-align: center;
	background: <?php echo $posthero_background_color; ?>;
	color: <?php echo $posthero_text_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
#posthero {
	width: 100%;
	padding: 30px 0px;
	text-align: center;
	background: <?php echo $posthero_background_color; ?>;
	color: <?php echo $posthero_text_color; ?>;
	}
}
	
#posthero img {
	margin-right: 30px;
}
	
#posthero img:last-child {
	margin-right: 0;
}

#posthero a {
	color: <?php echo $posthero_link_color; ?>;
	text-decoration: <?php echo $posthero_link_decoration; ?>;
}
	
#posthero h3:last-child, #posthero h4:last-child {
	margin-bottom: 0;
}

/* main */
/* main refers to everything between header/splash and footer */

@media screen and (max-width: 1200px) {
#main {
	width: 100%;
	padding: 0px 0px;
	background: <?php echo $main_background_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
#main {
	padding: 40px 0px;
	background: <?php echo $main_background_color; ?>;
	<?php if ( $sitewide_layout == 'floating_islands' ) { 
			echo "background: $main_background_color;\n"; 
		} else { 
			echo "background: #ffffff;\n"; 
		}  ?>
	}
}

/* primary */

@media screen and (max-width: 1200px) {
#primary {
	width: 100%;
	padding: 0px 0px;
	}
}

@media screen and (min-width: 1200px) {
#primary {
	float: left;
	padding: 0px 0px;
	<?php if ( $sitewide_layout == 'floating_islands' ) { 
			echo "width: 768px;\n"; 
		} else { 
			echo "width: 768px;\n"; 
		}  ?>
	}
}
	
/* primary-wide */

@media screen and (max-width: 1200px) {
#primary-wide {
	width: 100%;
	padding: 20px 20px;
	}
}

@media screen and (min-width: 1200px) {
#primary-wide {
	width: 100%;
	}
}
	
/* primary-center */

@media screen and (max-width: 1200px) {
#primary-center {
	width: 100%;
	}
}

@media screen and (min-width: 1200px) {
#primary-center {
	width: 768px;
	margin: 0px auto;
	}
}


/* author byline */

.author-byline {
	margin-bottom: 20px;	
}	


/* alignment */
	
.aligncenter {
	text-align: center;
	margin: 0 auto;
	display: block;
}
	
.alignleft {
	text-align: left;
	display: inline-block;
}

.alignright {
	text-align: right;
	display: inline-block;
}


/* images */

@media screen and (max-width: 1200px) {
img.featured-image {
	width: 100%;
	}
}

@media screen and (min-width: 1200px) {
img.featured-image {
	<?php if ( $sitewide_layout == 'floating_islands' ) { 
			echo "width: 768px;\n"; 
		} else { 
			echo "width: 768px;\n"; 
		}  ?>
	}
}
	
/* breadcrumbs */

@media screen and (max-width: 1200px) {
.breadcrumbs {
	width: 100%;
	font-size: 14px;
	margin-bottom: 20px;
	color: #607D8B;
	white-space: normal;
	}
}

@media screen and (min-width: 1200px) {
.breadcrumbs {
	font-size: 14px;
	margin-bottom: 20px;
	color: #607D8B;
	white-space: normal;
	}
}

.breadcrumbs ul {
	display: inline;
	list-style-position: unset;
	margin-left: 0 !important;
}

.breadcrumbs ul li {
	display: inline;
	word-break: break-all;
	overflow-wrap: break-all;
	margin-right: 5px;
}

.breadcrumbs a {
	color: #607D8B;
}
	
/* content */
	
@media screen and (max-width: 1200px) {
#content {
	background: #ffffff;
	border-radius: 0;
	}
}
	
@media screen and (min-width: 1200px) {
#content {
	background: #ffffff;
	border-radius: 5px;
	}
}
	
#content img {
	max-width: 100%;
	height: auto;
}

#content ul {
	margin-left: 30px;
	margin-bottom: 30px;
}

#content ol {
	margin-left: 30px;
	margin-bottom: 30px;
}

#content ol li {
	margin-bottom: 15px;
}

@media screen and (max-width: 1200px) {
.content-padded {
	padding: 20px 20px 0px 20px;
	}
}

@media screen and (min-width: 1200px) {
.content-padded {
	<?php if ( $sitewide_layout == 'floating_islands' ) { 
			echo "padding: 40px 40px 20px 40px;\n"; 
		} else { 
			echo "padding: 40px 40px 20px 0px;\n"; 
		}  ?>
	}
}


/* author biography */

.author-biography {
	margin: 40px 0px;
	padding: 40px;
	border: 1px solid #ccc;
	border-radius: 5px;
}

.author-biography p {
	margin-bottom: 0;
}


/* sidebar */

@media screen and (max-width: 1200px) {
#sidebar {
	width: 100%;
	padding: 30px 20px;
	background: #FFF;
	}
}

@media screen and (min-width: 1200px) {
#sidebar {
	float: right;
	width: 392px;
	margin-left: 40px;
	<?php // $sidebar_padding_checked = get_theme_mod( 'hovercraft_sidebar_padding' ) ? true : false;
	// if ( $sidebar_padding_checked == true ) { echo "padding: 40px;"; } ?>
	}
}

#sidebar .widget-wrapper {
	width: 100%;
	background: #ffffff;
	padding: 40px 40px;
    margin-bottom: 40px;
	border-radius: 5px;
}

#sidebar .widget-wrapper:first-child {
   	background: <?php echo $sidebar_callout_background_color; ?>;
	color: <?php echo $sidebar_callout_text_color; ?>;
}
	
#sidebar .widget-wrapper:first-child a {
	color: <?php echo $sidebar_callout_link_color; ?>;
}

#sidebar .widget-wrapper:last-child {
    margin-bottom: 0;
}

#sidebar p:last-child {
	margin-bottom: 0;
}

#sidebar ol li {
	margin-bottom: 15px;
}

#prefooter-top {
	background: <?php echo $prefooter_top_background_color; ?>;
	color: <?php echo $prefooter_top_text_color; ?>;
}
	
#prefooter-top a {
	color: <?php echo $prefooter_top_link_color; ?>;
	text-decoration: <?php echo $prefooter_top_link_decoration; ?>;
}

#prefooter-bottom {
	background: <?php echo $prefooter_bottom_background_color; ?>;
	color: <?php echo $prefooter_bottom_text_color; ?>;
}
	
#prefooter-bottom a {
	color: <?php echo $prefooter_bottom_link_color; ?>;
	text-decoration: <?php echo $prefooter_bottom_link_decoration; ?>;
}

#footer {
	background: <?php echo $footer_background_color; ?>;
	color: <?php echo $footer_text_color; ?>;
}

#footer a {
	color: <?php echo $footer_link_color; ?>;
	text-decoration: <?php echo $footer_link_decoration; ?>;
}

#copyright {
	background: <?php echo $copyright_background_color; ?>;
	color: <?php echo $copyright_text_color; ?>;
}

#copyright a {
	color: <?php echo $copyright_link_color; ?>;
	text-decoration: <?php echo $copyright_link_decoration; ?>;
}


/* copyright icons */

#copyright i {
	font-size: 24px;
	margin-left: 20px !important;
}

#copyright i:first-child {
	margin-left: 0;
}


/* other stuff */
	
form {
	padding: 0 !important;
}

textarea {
	width: 100%;
	font-size: 18px;
	font-weight: 400;
	display: inline-block;
	padding: 10px 20px !important;
	background: #ffffff;
	border-radius: 5px;
	border: 0;
	box-shadow: inset 0px 0px 0px 1px #BDBDBD;
}
	
select {
	width: 100%;
	font-size: 18px;
	font-weight: 400;
	display: inline-block;
	background: #ffffff;
	border-radius: 5px;
	border: 0;
	outline: none;
	box-shadow: inset 0px 0px 0px 1px #BDBDBD;
}
	
button[type="submit"] {
	font-weight: 600;
	background: <?php echo $default_link_color; ?> !important;
	text-decoration: none;
	color: #ffffff;
	border-radius: 5px;
	border: 0;
	cursor: pointer;
}
	
input[type="text"], input[type="email"], select {
	width: 100%;
	font-size: 18px;
	font-weight: 400;
	display: inline-block;
	padding: 10px 20px !important;
	background: #ffffff;
	border-radius: 5px;
	border: 0;
	outline: none;
	box-shadow: inset 0px 0px 0px 1px #BDBDBD;
}

input[type="submit"] {
	width: 100%;
	font-size: 18px;
	font-weight: 600;
	display: inline-block;
	padding: 10px 20px !important;
	background: <?php echo $default_link_color; ?>;
	text-decoration: none;
	color: #ffffff;
	border-radius: 5px;
	border: 0;
	cursor: pointer;
}
	
button[type="submit"]:hover, input[type="submit"]:hover {
	background: <?php echo $default_hover_color; ?> !important;
}

/* scroll-to-top */

@media screen and (max-width: 1200px) {
.scrollup-wrapper {
	<?php if ( $scroll_to_top == 'none') { echo "display: none;"; } ?>
	margin-top: 20px;
	}
}
	
@media screen and (min-width: 1200px) {
.scrollup-wrapper {
	<?php if ( $scroll_to_top == 'mobile_only') { echo "display: none;"; } ?>
	margin-top: 20px;
	}
}

.scrollup-link {
	display: block;
	width: 100%;
	
	cursor: pointer;
	font-size: 14px;
	line-height: 1;
	padding: 10px 0px;
	color: rgba(255, 255, 255, 0.5) !important;
	text-decoration: none !important;
	text-align: center;
	vertical-align: middle;
	background: rgba(0, 0, 0, 0.1);
	border-radius: 5px;
}

.scrollup-link:active, .scrollup-link:hover {
	background: rgba(0, 0, 0, 0.2);
	color: #ffffff !important;
	outline: none !important;
	-webkit-tap-highlight-color: transparent;
}

.scrollup-wrapper i {
	font-size: 14px !important;
	line-height: 1 !important;
	vertical-align: middle;
}

.scrollup-wrapper i:first-child {
	margin-left: 10px !important;
}
</style>

<?php }
 
add_action( 'wp_head', 'hovercraft_generate_css' );

// https://codex.wordpress.org/Wrapping_Text_Around_Images
