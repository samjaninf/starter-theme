<?php
// styles for mini hero
?>

#hero-mini {
<?php if ( $hero_gradient_tones == 'two_tones' ) { ?>
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
<?php } elseif ( $hero_gradient_tones == 'three_tones' ) { ?>
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_mid_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_mid_color_transparency})"; 
		?> <?php echo $hero_gradient_mid_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
<?php } ?>
	background-position: <?php $minipos = str_replace('_',' ',$mini_hero_background_position); echo $minipos; ?>;
	background-size: cover;
	background-repeat: no-repeat;
}

.hero-main-mini {
<?php if ( $hero_gradient_tones == 'two_tones' ) { ?>
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
<?php } elseif ( $hero_gradient_tones == 'three_tones' ) { ?>
	background: linear-gradient(<?php echo $hero_gradient_angle; ?>, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_start_color_transparency})"; 
		?> <?php echo $hero_gradient_start_color_length; ?>%, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_mid_color, "#%02x%02x%02x");
		echo "rgba({$r1}, {$g1}, {$b1}, {$hero_gradient_mid_color_transparency})"; 
		?> <?php echo $hero_gradient_mid_color_length; ?>%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba({$r2}, {$g2}, {$b2}, {$hero_gradient_stop_color_transparency})"; 
		?> <?php echo $hero_gradient_stop_color_length; ?>%)<?php if (!empty( $hero_image )) echo ", url({$hero_image})" ?>;
<?php } ?>
	background-position: <?php $minipos = str_replace('_',' ',$mini_hero_background_position); echo $minipos; ?>;
	background-size: cover;
	background-repeat: no-repeat;
}

#header-mini-hero .menu-mobile-wrapper i {
	margin-left: 20px;
	font-size: 36px;
	color: <?php echo $mini_hero_header_text_color; ?>;
}

#header-mini-hero a {
	color: <?php echo $mini_hero_header_link_color; ?>;
}

#header-mini-hero .main-menu ul li a {
	text-decoration: none;
	color: <?php echo $mini_hero_header_link_color; ?>;
}

#header-basic .main-menu ul li a {
	text-decoration: none;
	color: <?php echo $header_basic_hero_link_color; ?>;
}

@media screen and (max-width: 1200px) {
	#hero-mini {
		width:100%; /* correct */
		padding:0px; /* correct */
		display:table; /* correct */
	}
}

@media screen and (min-width: 1200px) {
	#hero-mini {
		width:100%; /* correct */
		padding:0px; /* correct */
		display:table; /* correct */
	}
}

@media screen and (max-width: 1200px) {
	.hero-main-mini {
		padding: 60px 20px; /* correct */
	}
}

@media screen and (min-width: 1200px) {
	.hero-main-mini {
		padding: <?php echo $mini_hero_vertical_padding; ?>px 0px;
	}
}

@media screen and (max-width: 1200px) {
	#header-mini-hero {
		width: 100%;
		display: table;
		padding: 10px 20px;
		background: <?php echo $mini_hero_background_color; ?>;
		color: <?php echo $mini_hero_header_text_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
	#header-mini-hero {
		width: 100%;
		display: table;
		margin: 0px auto;
		padding: 20px 0px;
		background: <?php echo $mini_hero_background_color; ?>;
		color: <?php echo $mini_hero_header_text_color; ?>;
	}
}

@media screen and (max-width: 1200px) {
	h1.mini-hero-title {
		font-weight: 700;
		margin-bottom: 0;
		color: #ffffff;
	}
}

@media screen and (min-width: 1200px) {
	h1.mini-hero-title {
		font-weight: 700;
		margin-bottom: 0;
		color: #ffffff;
	}
}

.hero-main-mini .search-input {
	background: #ffffff !important;
	box-shadow: inset 0px 0px 0px 1px #ffffff !important;
}
