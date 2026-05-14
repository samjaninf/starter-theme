<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// get stacked widget area groups
function hovercraft_get_stacked_widget_area_groups() {
	return array(
		'prefooter' => array(
			'name' => 'Prefooter',
			'id' => 'hovercraft_prefooter',
			'class' => 'widget-prefooter',
			'wrapper_id' => 'prefooter-top',
			'legacy' => array(
				'hovercraft_prefooter_top' => array(
					'wrapper_id' => 'prefooter-top',
				),
				'hovercraft_prefooter_bottom' => array(
					'wrapper_id' => 'prefooter-bottom',
				),
			),
		),
		'home_premain' => array(
			'name' => 'Home Premain',
			'id' => 'hovercraft_home_premain',
			'class' => 'widget-home-premain',
			'wrapper_id' => 'home-premain-top',
			'front_page_only' => true,
			'legacy' => array(
				'hovercraft_home_premain_top' => array(
					'wrapper_id' => 'home-premain-top',
				),
				'hovercraft_home_premain_bottom' => array(
					'wrapper_id' => 'home-premain-bottom',
				),
			),
		),
		'home_postmain' => array(
			'name' => 'Home Postmain',
			'id' => 'hovercraft_home_postmain',
			'class' => 'widget-home-postmain',
			'wrapper_id' => 'home-postmain-top',
			'front_page_only' => true,
			'legacy' => array(
				'hovercraft_home_postmain_top' => array(
					'wrapper_id' => 'home-postmain-top',
				),
				'hovercraft_home_postmain_bottom' => array(
					'wrapper_id' => 'home-postmain-bottom',
				),
			),
		),
		'postcolumns' => array(
			'name' => 'Postcolumns',
			'id' => 'hovercraft_postcolumns',
			'class' => 'widget-postcolumns',
			'wrapper_class' => 'postcolumns-top',
			'legacy' => array(
				'hovercraft_postcolumns_top' => array(
					'wrapper_class' => 'postcolumns-top',
				),
				'hovercraft_postcolumns_bottom' => array(
					'wrapper_class' => 'postcolumns-bottom',
				),
			),
		),
	);
}

// register preferred stacked widget areas
function hovercraft_register_stacked_widget_areas() {
	$stacked_widget_area_groups = hovercraft_get_stacked_widget_area_groups();

	foreach ( $stacked_widget_area_groups as $stacked_widget_area_group ) {
		register_sidebar(
			array(
				'name' => $stacked_widget_area_group['name'],
				'id' => $stacked_widget_area_group['id'],
				'before_widget' => '<div class="' . $stacked_widget_area_group['class'] . ' widget-wrapper">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'hovercraft_register_stacked_widget_areas' );

// get legacy stacked widget area ids
function hovercraft_get_legacy_stacked_widget_area_ids() {
	$legacy_widget_area_ids = array();
	$stacked_widget_area_groups = hovercraft_get_stacked_widget_area_groups();

	foreach ( $stacked_widget_area_groups as $stacked_widget_area_group ) {
		foreach ( $stacked_widget_area_group['legacy'] as $legacy_widget_area_id => $legacy_widget_area ) {
			$legacy_widget_area_ids[] = $legacy_widget_area_id;
		}
	}

	return $legacy_widget_area_ids;
}

// mark legacy stacked widget areas in admin
function hovercraft_label_legacy_stacked_widget_areas() {
	global $wp_registered_sidebars;

	$legacy_widget_area_ids = hovercraft_get_legacy_stacked_widget_area_ids();

	foreach ( $legacy_widget_area_ids as $legacy_widget_area_id ) {
		if ( ! isset( $wp_registered_sidebars[ $legacy_widget_area_id ]['name'] ) ) {
			continue;
		}

		if ( strpos( $wp_registered_sidebars[ $legacy_widget_area_id ]['name'], 'Legacy ' ) === 0 ) {
			continue;
		}

		$wp_registered_sidebars[ $legacy_widget_area_id ]['name'] = 'Legacy ' . $wp_registered_sidebars[ $legacy_widget_area_id ]['name'];
	}
}
add_action( 'widgets_init', 'hovercraft_label_legacy_stacked_widget_areas', 20 );

// hide empty legacy stacked widget areas
function hovercraft_hide_empty_legacy_stacked_widget_areas() {
	$legacy_widget_area_ids = hovercraft_get_legacy_stacked_widget_area_ids();

	foreach ( $legacy_widget_area_ids as $legacy_widget_area_id ) {
		if ( is_active_sidebar( $legacy_widget_area_id ) ) {
			continue;
		}

		unregister_sidebar( $legacy_widget_area_id );
	}
}
add_action( 'widgets_init', 'hovercraft_hide_empty_legacy_stacked_widget_areas', 30 );

// check if legacy stacked widget area group has content
function hovercraft_has_legacy_stacked_widget_area_group( $group_key ) {
	$stacked_widget_area_groups = hovercraft_get_stacked_widget_area_groups();

	if ( ! isset( $stacked_widget_area_groups[ $group_key ] ) ) {
		return false;
	}

	foreach ( $stacked_widget_area_groups[ $group_key ]['legacy'] as $legacy_widget_area_id => $legacy_widget_area ) {
		if ( is_active_sidebar( $legacy_widget_area_id ) ) {
			return true;
		}
	}

	return false;
}

// show legacy stacked widget area notices
function hovercraft_legacy_stacked_widget_area_notices() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$stacked_widget_area_groups = hovercraft_get_stacked_widget_area_groups();

	foreach ( $stacked_widget_area_groups as $group_key => $stacked_widget_area_group ) {
		if ( ! hovercraft_has_legacy_stacked_widget_area_group( $group_key ) ) {
			continue;
		}
		?>
		<div class="notice notice-warning">
			<p><?php echo esc_html( 'HoverCraft legacy ' . $stacked_widget_area_group['name'] . ' widget areas are active. Please transfer those elements into the new ' . $stacked_widget_area_group['name'] . ' widget area.' ); ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'hovercraft_legacy_stacked_widget_area_notices' );

// render stacked widget area wrapper
function hovercraft_render_stacked_widget_area_wrapper( $widget_area_id, $wrapper_id, $wrapper_class = '' ) {
	if ( $wrapper_id ) {
		?>
		<div id="<?php echo esc_attr( $wrapper_id ); ?>">
			<div class="inner">
				<?php dynamic_sidebar( $widget_area_id ); ?>
				<div class="clear"></div>
			</div><!-- inner -->
		</div><!-- <?php echo esc_html( $wrapper_id ); ?> -->
		<?php
		return;
	}

	if ( $wrapper_class ) {
		?>
		<div class="<?php echo esc_attr( $wrapper_class ); ?>">
			<?php dynamic_sidebar( $widget_area_id ); ?>
			<div class="clear"></div>
		</div><!-- <?php echo esc_html( $wrapper_class ); ?> -->
		<?php
	}
}

// render preferred stacked widget area with legacy fallback
function hovercraft_render_stacked_widget_area_group( $group_key ) {
	$stacked_widget_area_groups = hovercraft_get_stacked_widget_area_groups();

	if ( ! isset( $stacked_widget_area_groups[ $group_key ] ) ) {
		return;
	}

	$stacked_widget_area_group = $stacked_widget_area_groups[ $group_key ];

	if ( isset( $stacked_widget_area_group['front_page_only'] ) && $stacked_widget_area_group['front_page_only'] && ! is_front_page() ) {
		return;
	}

	if ( is_active_sidebar( $stacked_widget_area_group['id'] ) ) {
		$wrapper_id = '';
		$wrapper_class = '';

		if ( isset( $stacked_widget_area_group['wrapper_id'] ) ) {
			$wrapper_id = $stacked_widget_area_group['wrapper_id'];
		}

		if ( isset( $stacked_widget_area_group['wrapper_class'] ) ) {
			$wrapper_class = $stacked_widget_area_group['wrapper_class'];
		}

		hovercraft_render_stacked_widget_area_wrapper( $stacked_widget_area_group['id'], $wrapper_id, $wrapper_class );
		return;
	}

	foreach ( $stacked_widget_area_group['legacy'] as $legacy_widget_area_id => $legacy_widget_area ) {
		if ( ! is_active_sidebar( $legacy_widget_area_id ) ) {
			continue;
		}

		$wrapper_id = '';
		$wrapper_class = '';

		if ( isset( $legacy_widget_area['wrapper_id'] ) ) {
			$wrapper_id = $legacy_widget_area['wrapper_id'];
		}

		if ( isset( $legacy_widget_area['wrapper_class'] ) ) {
			$wrapper_class = $legacy_widget_area['wrapper_class'];
		}

		hovercraft_render_stacked_widget_area_wrapper( $legacy_widget_area_id, $wrapper_id, $wrapper_class );
	}
}

// render home premain widget area
function hovercraft_render_home_premain() {
	hovercraft_render_stacked_widget_area_group( 'home_premain' );
}

// render home postmain widget area
function hovercraft_render_home_postmain() {
	hovercraft_render_stacked_widget_area_group( 'home_postmain' );
}

// render prefooter widget area
function hovercraft_render_prefooter() {
	hovercraft_render_stacked_widget_area_group( 'prefooter' );
}

// render postcolumns widget area
function hovercraft_render_postcolumns() {
	hovercraft_render_stacked_widget_area_group( 'postcolumns' );
}
