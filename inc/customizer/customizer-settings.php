<?php

function hovercraft_customizer($wp_customize) {
	// load google fonts array (via functions.php)
	$hovercraft_google_fonts_array = hovercraft_google_fonts_array();

	// load google fonts multilingual array (via functions.php)
	$hovercraft_google_fonts_multilingual_array = hovercraft_google_fonts_multilingual_array();

	// load google fonts helper function (via functions.php)
	$hovercraft_available_fonts = hovercraft_available_fonts();

    // remove header text color control
    $wp_customize->remove_control('header_textcolor');

    // hero media section
    $wp_customize->get_section('header_image')->title = __('Hero Media', 'hovercraft');

    // homepage section
    $wp_customize->get_section('static_front_page')->title = __('Homepage', 'hovercraft');
    $wp_customize->get_section('static_front_page')->priority = 31;

    // general options section
    $wp_customize->add_section('hovercraft_general', array(
        'title'    => 'General Options',
        'priority' => 30,
    ));
	
// sitewide layout setting
$wp_customize->add_setting( 'hovercraft_sitewide_layout', array(
    'default'    => 'floating_islands',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// sitewide layout control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sitewide_layout',
        array(
            'label'     => __( 'Sitewide Layout', 'hovercraft' ),
			'description' => __( 'Which layout style to use? This affects padding and alignment, so you might need to adjust background colors accordingly.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_sitewide_layout',
            'type'      => 'select',
			'choices' => array(
        		'floating_islands' => 'Floating Islands',
        		'classic_clean' => 'Classic Clean'
    			)
        )
) );

// mobile menu setting
$wp_customize->add_setting( 'hovercraft_mobile_menu', array(
    'default'    => 'accordion',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// mobile menu control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_mobile_menu',
        array(
            'label'     => __( 'Mobile Menu Style', 'hovercraft' ),
			'description' => __( 'Which mobile menu style do you want to use? Larger menus should usually use the Accordion Push.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_mobile_menu',
            'type'      => 'select',
			'choices' => array(
        		'overlay' => 'Overlay Simple',
        		'accordion' => 'Accordion Push'
    			)
        )
) );

// tagline display setting
$wp_customize->add_setting( 'hovercraft_tagline_display', array(
    'default'    => 'right_of_site_title',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// tagline display control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_tagline_display',
        array(
            'label'     => __( 'Tagline Display (Desktop)', 'hovercraft' ),
			'description' => __( 'Where should the Tagline display in the header? Note: Tagline must be filled in the Site Identity section for this to work, and will always be hidden on mobile devices regardless.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_tagline_display',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Hidden)',
				'right_of_site_title' => 'Right of Site Title',
				'below_site_title' => 'Below Site Title'
    			)
        )
) );

// site name display setting
$wp_customize->add_setting( 'hovercraft_site_name_display_mobile', array(
    'default'    => 'block',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// site name display control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_site_name_display_mobile',
        array(
            'label'     => __( 'Site Name Display (Mobile)', 'hovercraft' ),
			'description' => __( 'Should the Site Name be displayed on mobile devices next to the logo?', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_site_name_display_mobile',
            'type'      => 'select',
			'choices' => array(
        		'block' => 'Visible (Block)',
				'none' => 'None (Hidden)'
    			)
        )
) );

// alternative logo location setting
$wp_customize->add_setting( 'hovercraft_logo_alternative_location', array(
    'default' => 'none',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// alternative logo location control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_logo_alternative_location',
    array(
        'label' => __( 'Alternative Logo Location', 'hovercraft' ),
        'description' => __( 'Where should the alternative logo appear?', 'hovercraft' ),
        'section' => 'hovercraft_general',
        'settings' => 'hovercraft_logo_alternative_location',
        'type' => 'select',
        'priority' => 9,
        'choices' => array(
            'none' => 'None',
            'full_hero_only' => 'Full Hero Only',
            'half_hero_only' => 'Half Hero Only',
            'mini_hero_only' => 'Mini Hero Only',
            'basic_header_only' => 'Basic Header Only',
            'full_and_half_hero' => 'Full + Half Hero',
            'full_and_mini_hero' => 'Full + Mini Hero',
            'full_hero_and_basic_header' => 'Full Hero + Basic Header',
            'half_and_mini_hero' => 'Half + Mini Hero',
            'half_hero_and_basic_header' => 'Half Hero + Basic Header',
            'mini_hero_and_basic_header' => 'Mini Hero + Basic Header',
            'full_and_half_and_mini_hero' => 'Full + Half + Mini Hero',
            'full_and_half_hero_and_basic_header' => 'Full + Half Hero + Basic Header',
            'full_and_mini_hero_and_basic_header' => 'Full + Mini Hero + Basic Header',
            'half_and_mini_hero_and_basic_header' => 'Half + Mini Hero + Basic Header',
            'full_and_half_and_mini_hero_and_basic_header' => 'Full + Half + Mini Hero + Basic Header',
        ),
    )
) );

// logo width setting (desktop)
$wp_customize->add_setting( 'hovercraft_desktop_logo_width', array(
    'default'    => '150',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// logo width control (desktop)
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_desktop_logo_width',
        array(
            'label'     => __( 'Logo Width (Desktop)', 'hovercraft' ),
			'description' => __( 'Specificy desktop logo width in pixels? The height will be determined automatically.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_desktop_logo_width',
            'type' => 'text'
        )
) );

// logo width setting (mobile)
$wp_customize->add_setting( 'hovercraft_mobile_logo_width', array(
    'default'    => '100',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// logo width control (mobile)
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_mobile_logo_width',
        array(
            'label'     => __( 'Logo Width (Mobile)', 'hovercraft' ),
			'description' => __( 'Specificy mobile logo width in pixels? The height will be determined automatically.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_mobile_logo_width',
            'type' => 'text'
        )
) );

// header width setting (desktop)
$wp_customize->add_setting( 'hovercraft_desktop_header_width', array(
    'default' => 'fixed',
	'sanitize_callback' => 'hovercraft_sanitize_select'
	)
);

// header width control (desktop)
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_desktop_header_width',
        array(
            'label'     => __( 'Header Width (Desktop)', 'hovercraft' ),
			'description' => __( 'What should the header width be on desktop? Note: Always Full Width on mobile.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_desktop_header_width',
            'type'      => 'select',
			'choices' => array(
				'full' => 'Full Width',
				'fixed' => 'Fixed Width (1200px)'
    			)
        )
) );

// copyright width setting (desktop)
$wp_customize->add_setting( 'hovercraft_desktop_copyright_width', array(
    'default' => 'fixed',
	'sanitize_callback' => 'hovercraft_sanitize_select'
	)
);

// copyright width control (desktop)
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_desktop_copyright_width',
        array(
            'label'     => __( 'Copyright Width (Desktop)', 'hovercraft' ),
			'description' => __( 'What should the copyright width be on desktop? Note: Always Full Width on mobile.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_desktop_copyright_width',
            'type'      => 'select',
			'choices' => array(
				'full' => 'Full Width',
				'fixed' => 'Fixed Width (1200px)'
    			)
        )
) );

// after byline padding setting (desktop)
$wp_customize->add_setting( 'hovercraft_after_byline_padding', array(
    'default'    => '0',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// after byline padding control (desktop)
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_after_byline_padding',
        array(
            'label'     => __( 'After Byline Padding', 'hovercraft' ),
			'description' => __( 'Specificy After Byline widget padding in pixels?', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_after_byline_padding',
            'type' => 'text'
        )
) );
	
// posthero widget display setting
$wp_customize->add_setting( 'hovercraft_posthero_widget_display', array(
    'default'    => 'full_and_half_hero',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// posthero widget display control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_posthero_widget_display',
        array(
            'label'     => __( 'Posthero Widget Display', 'hovercraft' ),
			'description' => __( 'Below which hero types should the posthero widget be displayed when active?', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_posthero_widget_display',
            'type'      => 'select',
			'choices' => array(
        		'full_hero_only' => 'Full Hero Only',
        		'full_and_half_hero' => 'Full &amp; Half Hero',
        		'full_and_half_and_mini_hero' => 'Full &amp; Half &amp; Mini Hero',
    			)
        )
) );

// mobile topbar setting
$wp_customize->add_setting( 'hovercraft_mobile_topbar', array(
    'default'    => 'topbar_left',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// mobile topbar control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_mobile_topbar',
        array(
            'label'     => __( 'Mobile Topbar Widget', 'hovercraft' ),
			'description' => __( 'Which widget to display on mobile topbar? This only applies if both widgets are active.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_mobile_topbar',
            'type'      => 'select',
			'choices' => array(
				'topbar_left' => 'Topbar Left',
				'topbar_right' => 'Topbar Right'
    			)
        )
) );

// mobile preheader setting
$wp_customize->add_setting( 'hovercraft_mobile_preheader', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// mobile preheader control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_mobile_preheader',
        array(
            'label'     => __( 'Mobile Preheader Widget', 'hovercraft' ),
			'description' => __( 'Which widget to display on mobile preheader? Note: We suggest disabling this.', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_mobile_preheader',
            'type'      => 'select',
			'choices' => array(
				'none' => 'None (Disabled)',
				'preheader_left' => 'Preheader Left',
				'preheader_right' => 'Preheader Right'
    			)
        )
) );

// scroll to top setting
$wp_customize->add_setting( 'hovercraft_scroll_to_top', array(
    'default'    => 'mobile_only',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// scroll to top control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_scroll_to_top',
        array(
            'label'     => __( 'Back To Top Display', 'hovercraft' ),
			'description' => __( 'On which devices should the "back to top" element be displayed in the footer?', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_scroll_to_top',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
        		'mobile_only' => 'Mobile Only',
        		'desktop_and_mobile' => 'Desktop &amp; Mobile'
    			)
        )
) );
	
// search icon setting
$wp_customize->add_setting( 'hovercraft_search_icon', array(
    'default'    => 'desktop_only',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// search icon control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_search_icon',
        array(
            'label'     => __( 'Search Icon Display', 'hovercraft' ),
			'description' => __( 'On which devices should the search icon be displayed in the header?', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_search_icon',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'desktop_only' => 'Desktop Only',
				'desktop_and_mobile' => 'Desktop &amp; Mobile',
        		'mobile_only' => 'Mobile Only'
    			)
        )
) );

// breadcrumbs setting
$wp_customize->add_setting( 'hovercraft_breadcrumbs', array(
    'default'    => 'sitewide_except_homepage',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// breadcrumbs control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_breadcrumbs',
        array(
            'label'     => __( 'Breadcrumbs Display', 'hovercraft' ),
			'description' => __( 'On which pages should the breadcrumbs element be displayed (top of primary)?', 'hovercraft' ),
            'section'   => 'hovercraft_general',
            'settings'  => 'hovercraft_breadcrumbs',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'sitewide_except_homepage' => 'Sitewide Except Homepage',
				'sitewide' => 'Sitewide (All Pages)'
    			)
        )
) );

// seo section
$wp_customize->add_section( 'hovercraft_seo', array(
    'title'      => 'SEO',
    'priority'   => 32,
) );

// homepage html title setting
$wp_customize->add_setting( 'hovercraft_homepage_html_title', array(
    'default'    => 'site_name_site_tagline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// homepage html title control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_homepage_html_title',
        array(
            'label'     => __( 'Homepage HTML Title', 'hovercraft' ),
			'description' => __( 'How should the homepage HTML title tag be generated? Note: Page Title options only work if homepage set to use static page.', 'hovercraft' ),
            'section'   => 'hovercraft_seo',
            'settings'  => 'hovercraft_homepage_html_title',
            'type'      => 'select',
			'choices' => array(
				'site_name_site_tagline' => 'Site Title | Tagline',
				'site_name_dash_site_tagline' => 'Site Title - Tagline',
				'site_name_only' => 'Site Title Only',
				'site_name_page_title' => 'Site Title | Page Title',
				'site_name_dash_page_title' => 'Site Title - Page Title',
				'page_title_only' => 'Page Title Only',
    			)
        )
) );

// faq noindex setting
$wp_customize->add_setting( 'hovercraft_faq_posts_noindex', array(
    'default'    => 'noindex',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// faq noindex control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_faq_posts_noindex',
        array(
            'label'     => __( 'Noindex FAQ Posts', 'hovercraft' ),
			'description' => __( 'Do you want to noindex the FAQ posts? Note: We recommend keep noindex enabled for FAQ posts if you are displaying all FAQ post text on the FAQ category page.', 'hovercraft' ),
            'section'   => 'hovercraft_seo',
            'settings'  => 'hovercraft_faq_posts_noindex',
            'type'      => 'select',
			'choices' => array(
				'noindex' => 'Noindex',
				'disable_noindex' => 'Do Not Noindex'
    			)
        )
) );

// widget layouts section
$wp_customize->add_section( 'hovercraft_widget_layouts', array(
    'title'      => 'Widget Areas',
    'priority'   => 33,
) );

// home premain top widget columns setting
$wp_customize->add_setting( 'hovercraft_home_premain_top_columns', array(
    'default'    => '1',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// home premain top widget columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_premain_top_columns',
        array(
            'label'     => __('Home Premain Top Columns (Desktop)', 'hovercraft'),
			'description' => __( 'How many widgets across should display in the Home Premain Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_premain_top_columns',
            'type'      => 'select',
			'choices' => array(
				'1' => '1 Column',
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// home premain top text-align setting
$wp_customize->add_setting( 'hovercraft_home_premain_top_align', array(
    'default'    => 'center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home premain top text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_premain_top_align',
        array(
            'label'     => __( 'Home Premain Top Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Home Premain Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_premain_top_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// home premain bottom widget columns setting
$wp_customize->add_setting( 'hovercraft_home_premain_bottom_columns', array(
    'default'    => '1',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// home premain bottom widget columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_premain_bottom_columns',
        array(
            'label'     => __('Home Premain Bottom Columns (Desktop)', 'hovercraft'),
			'description' => __( 'How many widgets across should display in the Home Premain Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_premain_bottom_columns',
            'type'      => 'select',
			'choices' => array(
				'1' => '1 Column',
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// home premain bottom text-align setting
$wp_customize->add_setting( 'hovercraft_home_premain_bottom_align', array(
    'default'    => 'center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home premain bottom text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_premain_bottom_align',
        array(
            'label'     => __( 'Home Premain Bottom Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Home Premain Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_premain_bottom_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// home postmain top widget columns setting
$wp_customize->add_setting( 'hovercraft_home_postmain_top_columns', array(
    'default'    => '1',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// home postmain top widget columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_postmain_top_columns',
        array(
            'label'     => __('Home Postmain Top Columns (Desktop)', 'hovercraft'),
			'description' => __( 'How many widgets across should display in the Home Postmain Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_postmain_top_columns',
            'type'      => 'select',
			'choices' => array(
				'1' => '1 Column',
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// home postmain top text-align setting
$wp_customize->add_setting( 'hovercraft_home_postmain_top_align', array(
    'default'    => 'center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home postmain top text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_postmain_top_align',
        array(
            'label'     => __( 'Home Postmain Top Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Home Postmain Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_postmain_top_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// home postmain bottom widget columns setting
$wp_customize->add_setting( 'hovercraft_home_postmain_bottom_columns', array(
    'default'    => '1',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// home postmain bottom widget columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_postmain_bottom_columns',
        array(
            'label'     => __('Home Postmain Bottom Columns (Desktop)', 'hovercraft'),
			'description' => __( 'How many widgets across should display in the Home Postmain Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_postmain_bottom_columns',
            'type'      => 'select',
			'choices' => array(
				'1' => '1 Column',
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// home postmain bottom text-align setting
$wp_customize->add_setting( 'hovercraft_home_postmain_bottom_align', array(
    'default'    => 'center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home postmain bottom text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_home_postmain_bottom_align',
        array(
            'label'     => __( 'Home Postmain Bottom Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Home Postmain Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_home_postmain_bottom_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );
	
// prefooter top widget columns setting
$wp_customize->add_setting( 'hovercraft_prefooter_top_columns', array(
    'default'    => '1',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// prefooter top widget columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_prefooter_top_columns',
        array(
            'label'     => __('Prefooter Top Columns (Desktop)', 'hovercraft'),
			'description' => __( 'How many widgets across should display in the Prefooter Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_prefooter_top_columns',
            'type'      => 'select',
			'choices' => array(
				'1' => '1 Column',
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// prefooter top text-align setting
$wp_customize->add_setting( 'hovercraft_prefooter_top_align', array(
    'default'    => 'left',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// prefooter top text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_prefooter_top_align',
        array(
            'label'     => __( 'Prefooter Top Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Prefooter Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_prefooter_top_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// prefooter bottom widget columns setting
$wp_customize->add_setting( 'hovercraft_prefooter_bottom_columns', array(
    'default'    => '1',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// prefooter bottom widget columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_prefooter_bottom_columns',
        array(
            'label'     => __('Prefooter Bottom Columns (Desktop)', 'hovercraft'),
			'description' => __( 'How many widgets across should display in the Prefooter Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_prefooter_bottom_columns',
            'type'      => 'select',
			'choices' => array(
				'1' => '1 Column',
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// prefooter bottom text-align setting
$wp_customize->add_setting( 'hovercraft_prefooter_bottom_align', array(
    'default'    => 'left',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// prefooter bottom text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_prefooter_bottom_align',
        array(
            'label'     => __( 'Prefooter Bottom Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Prefooter Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_prefooter_bottom_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// postcolumns top text-align setting
$wp_customize->add_setting( 'hovercraft_postcolumns_top_align', array(
    'default'    => 'left',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// postcolumns top text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_postcolumns_top_align',
        array(
            'label'     => __( 'Postcolumns Top Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Postcolumns Top widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_postcolumns_top_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// postcolumns bottom text-align setting
$wp_customize->add_setting( 'hovercraft_postcolumns_bottom_align', array(
    'default'    => 'left',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// postcolumns bottom text-align control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_postcolumns_bottom_align',
        array(
            'label'     => __( 'Postcolumns Bottom Text Align', 'hovercraft' ),
			'description' => __( 'How should content be aigned in the Postcolumns Bottom widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_widget_layouts',
            'settings'  => 'hovercraft_postcolumns_bottom_align',
            'type'      => 'select',
			'choices' => array(
        		'center' => 'Center',
				'left' => 'Left'
    			)
        )
) );

// category layouts section
$wp_customize->add_section( 'hovercraft_category_layouts', array(
    'title'      => 'Category Layouts',
    'priority'   => 34,
) );
	
// homepage hide main setting
$wp_customize->add_setting('hovercraft_homepage_hide_main', array(
    'default' => 0,
	'sanitize_callback' => 'hovercraft_sanitize_checkbox',
));

// homepage hide main control
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'hovercraft_homepage_hide_main',
        array(
            'label'     => __('Hide homepage main section', 'hovercraft'),
            'section'   => 'static_front_page',
            'settings'  => 'hovercraft_homepage_hide_main',
            'type'      => 'checkbox',
        )
    )
);

// page layouts section
$wp_customize->add_section( 'hovercraft_page_layouts', array(
    'title'      => 'Page Layouts',
    'priority'   => 35,
) );

// tiles across setting
$wp_customize->add_setting( 'hovercraft_tiles_across', array(
    'default'    => '3',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// tiles across control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_tiles_across',
        array(
            'label'     => __('Tiles Across (Desktop)', 'hovercraft'),
			'description' => __( 'How many tiles across should display in the tiles widget area? (How many columns)', 'hovercraft' ),
            'section'   => 'hovercraft_page_layouts',
            'settings'  => 'hovercraft_tiles_across',
            'type'      => 'select',
			'choices' => array(
        		'2' => '2 Columns',
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
        		'6' => '6 Columns',
				'7' => '7 Columns',
				'8' => '8 Columns',
				'9' => '9 Columns',
				'10' => '10 Columns',
        		'11' => '11 Columns',
				'12' => '12 Columns'
    			)
        )
) );

// columns across setting
$wp_customize->add_setting( 'hovercraft_columns_across', array(
    'default'    => '4',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// columns across control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_columns_across',
        array(
            'label'     => __('Columns Across (Desktop)', 'hovercraft'),
			'description' => __( 'How many columns across should display in the columns widget area? (How many columns)', 'hovercraft' ),
            'section'   => 'hovercraft_page_layouts',
            'settings'  => 'hovercraft_columns_across',
            'type'      => 'select',
			'choices' => array(
        		'3' => '3 Columns',
				'4' => '4 Columns',
				'5' => '5 Columns',
				'6' => '6 Columns'
    			)
        )
) );

// gallery captions setting
$wp_customize->add_setting( 'hovercraft_gallery_captions', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// gallery captions control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_gallery_captions',
        array(
            'label'     => __('Gallery Captions Display', 'hovercraft'),
			'description' => __( 'What display style should the image gallery captions use?', 'hovercraft' ),
            'section'   => 'hovercraft_page_layouts',
            'settings'  => 'hovercraft_gallery_captions',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'below_image' => 'Below Image',
				'inside_image' => 'Inside Image (Bottom)'
    			)
        )
) );

// tiles captions setting
$wp_customize->add_setting( 'hovercraft_tiles_captions', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// tiles captions control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_tiles_captions',
        array(
            'label'     => __('Tiles Captions Display', 'hovercraft'),
			'description' => __( 'What display style should the images captions inside Tiles use?', 'hovercraft' ),
            'section'   => 'hovercraft_page_layouts',
            'settings'  => 'hovercraft_tiles_captions',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'below_image' => 'Below Image',
				'inside_image' => 'Inside Image (Bottom)'
    			)
        )
) );

// blockquote captions setting
$wp_customize->add_setting( 'hovercraft_blockquote_captions', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// blockquote captions control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_blockquote_captions',
        array(
            'label'     => __('Gallery Blockquote Display', 'hovercraft'),
			'description' => __( 'What display style should the blockquote captions use?', 'hovercraft' ),
            'section'   => 'hovercraft_page_layouts',
            'settings'  => 'hovercraft_blockquote_captions',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'below_image' => 'Below Image',
				'inside_image' => 'Inside Image (Bottom)'
    			)
        )
) );

// blog options section
$wp_customize->add_section( 'hovercraft_blog', array(
    'title'      => 'Blog (Posts)',
    'priority'   => 113,
) );

// featured image position setting
$wp_customize->add_setting( 'hovercraft_featured_image_position', array(
    'default'    => 'above_title',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// featured image position control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_featured_image_position',
        array(
            'label'     => __( 'Featured Image Position', 'hovercraft' ),
			'description' => __( 'Where should the featured images appear on blog posts?', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_featured_image_position',
            'type'      => 'select',
			'choices' => array(
        		'above_title' => 'Above Title',
				'below_title' => 'Below Title'
    			)
        )
) );

// social sharing setting
$wp_customize->add_setting( 'hovercraft_social_sharing', array(
    'default'    => 'bottom_of_post',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// social sharing control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_social_sharing',
        array(
            'label'     => __( 'Social Sharing Links', 'hovercraft' ),
			'description' => __( 'Where should the social sharing links be displayed?', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_social_sharing',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'top_of_post' => 'Top Of Post',
				'bottom_of_post' => 'Bottom Of Post',
				'top_and_bottom_of_post' => 'Top & Bottom Of Post'
    			)
        )
) );

// author biography display setting
$wp_customize->add_setting( 'hovercraft_biography', array(
    'default'    => 'native_posts_only',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// author biography display control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_biography',
        array(
            'label'     => __( 'Author Biography Display', 'hovercraft' ),
			'description' => __( 'On which post types should the author biography be displayed (below article text)? Note: for SEO reasons, we highly recommend keeping this enabled in most cases.', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_biography',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'native_posts_only' => 'Native Posts Only',
				'all_post_types' => 'Native & Custom Post Types'
    			)
        )
) );

// author social media links setting
$wp_customize->add_setting( 'hovercraft_biography_links', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// author social media links control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_biography_links',
        array(
            'label'     => __( 'Author Social Media Links', 'hovercraft' ),
			'description' => __( 'Where should the author social media links be displayed? Note: Biography options require Author Biography to be enabled.', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_biography_links',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'byline_only' => 'Byline Only',
				'biography_only' => 'Biography Only',
				'byline_and_biography' => 'Byline & Biography'
    			)
        )
) );

// author photo setting
$wp_customize->add_setting( 'hovercraft_byline_photo', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// author photo control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_byline_photo',
        array(
            'label'     => __( 'Author Photo (Gravatar)', 'hovercraft' ),
			'description' => __( 'Where should the author gravatar photo be displayed? Note: Biography options require Author Biography to be enabled.', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_byline_photo',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'byline_only' => 'Byline Only',
				'biography_only' => 'Biography Only',
				'byline_and_biography' => 'Byline & Biography'
    			)
        )
) );

// byline date setting
$wp_customize->add_setting( 'hovercraft_byline_date', array(
    'default'    => 'updated_date_only',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// byline date control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_byline_date',
        array(
            'label'     => __( 'Post Byline Date', 'hovercraft' ),
			'description' => __( 'Which date should appear next to the post author name (in the byline)? Note: for SEO reasons, most sites should probably use the Updated Date Only option to keep things cleaner.', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_byline_date',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'updated_date_only' => 'Updated Date Only',
				'published_date_only' => 'Published Date Only',
				'updated_and_published_dates' => 'Updated & Published Dates'
    			)
        )
) );

// post tags setting
$wp_customize->add_setting( 'hovercraft_post_tags', array(
    'default'    => 'native_posts_only',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// post tags control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_post_tags',
        array(
            'label'     => __( 'Post Tags Display', 'hovercraft' ),
			'description' => __( 'Should the Tags be displayed at the bottom of articles or not?', 'hovercraft' ),
            'section'   => 'hovercraft_blog',
            'settings'  => 'hovercraft_post_tags',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'native_posts_only' => 'Native Posts Only',
				'native_posts_and_pages' => 'Native Posts & Pages',
				'native_posts_and_custom_posts' => 'Native Posts & Custom Posts',
				'native_posts_and_pages_and_custom_posts' => 'Native Posts, Pages & Custom Posts'
    			)
        )
) );

    // fonts section
    $wp_customize->add_section( 'hovercraft_fonts', array(
        'title'    => 'Fonts',
        'priority' => 43,
    ) );

    // first font family setting
    $wp_customize->add_setting( 'hovercraft_first_font_family', array(
        'default'           => 'noto_sans',
        'sanitize_callback' => 'hovercraft_sanitize_select',
    ) );

    // first font family control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_first_font_family',
        array(
            'label'       => __( 'First Google Fonts Family', 'hovercraft' ),
            'description' => __( 'This will load the chosen Google Fonts family, thus powering font options below. Note: Only font weights 400, 600, and 700 are loaded.', 'hovercraft' ),
            'section'     => 'hovercraft_fonts',
            'settings'    => 'hovercraft_first_font_family',
            'type'        => 'select',
            'choices'     => $hovercraft_google_fonts_array,
        )
    ) );

    // second font family setting
    $wp_customize->add_setting( 'hovercraft_second_font_family', array(
        'default'           => '',
        'sanitize_callback' => 'hovercraft_sanitize_select',
    ) );

    // second font family control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_second_font_family',
        array(
            'label'       => __( 'Second Google Fonts Family', 'hovercraft' ),
            'description' => __( 'This will load the chosen Google Fonts family, thus powering font options below. Note: Only font weights 400, 600, and 700 are loaded.', 'hovercraft' ),
            'section'     => 'hovercraft_fonts',
            'settings'    => 'hovercraft_second_font_family',
            'type'        => 'select',
            'choices'     => $hovercraft_google_fonts_array,
        )
    ) );

    // third font family setting
    $wp_customize->add_setting( 'hovercraft_third_font_family', array(
        'default'           => '',
        'sanitize_callback' => 'hovercraft_sanitize_select',
    ) );

    // third font family control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_third_font_family',
        array(
            'label'       => __( 'Third Google Fonts Family', 'hovercraft' ),
            'description' => __( 'This will load the chosen Google Fonts family, thus powering font options below. Note: Only font weights 400, 600, and 700 are loaded.', 'hovercraft' ),
            'section'     => 'hovercraft_fonts',
            'settings'    => 'hovercraft_third_font_family',
            'type'        => 'select',
            'choices'     => $hovercraft_google_fonts_array,
        )
    ) );

    // multilingual font family setting
    $wp_customize->add_setting( 'hovercraft_multilingual_font_family', array(
        'default'           => '',
        'sanitize_callback' => 'hovercraft_sanitize_select',
    ) );

    // multilingual font family control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_multilingual_font_family',
        array(
            'label'       => __( 'Multilingual Google Fonts Family', 'hovercraft' ),
            'description' => __( 'This will load the chosen Google Fonts family, thus powering font options below. Note: Only font weights 400, 600, and 700 are loaded. Be sure the font you choose here matches your other font families above to avoid conflicts.', 'hovercraft' ),
            'section'     => 'hovercraft_fonts',
            'settings'    => 'hovercraft_multilingual_font_family',
            'type'        => 'select',
            'choices'     => $hovercraft_google_fonts_multilingual_array,
        )
    ) );

    // default font family setting
    $wp_customize->add_setting( 'hovercraft_default_font', array(
        'default'           => '',
        'sanitize_callback' => 'hovercraft_sanitize_select',
    ) );

    // default font family control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_default_font',
        array(
            'label'       => __( 'Default Font Family', 'hovercraft' ),
            'description' => __( 'Which Google Fonts family should be used for the default site-wide font?', 'hovercraft' ),
            'section'     => 'hovercraft_fonts',
            'settings'    => 'hovercraft_default_font',
            'type'        => 'select',
            'choices'     => $hovercraft_available_fonts,
        )
    ) );

// default font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_default_desktop_font_size', array(
    'default'    => '16',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// default font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_default_desktop_font_size',
        array(
            'label'     => __( 'Default Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the default on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_default_desktop_font_size',
            'type' => 'text'
        )
) );

// default font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_default_mobile_font_size', array(
    'default'    => '16',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// default font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_default_mobile_font_size',
        array(
            'label'     => __( 'Default Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the default on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_default_mobile_font_size',
            'type' => 'text'
        )
) );

// add setting for site name font family
$wp_customize->add_setting( 'hovercraft_site_name_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// add control for site name font family
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_site_name_font',
    array(
        'label'       => __( 'Site Name Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for the site name in the header? Note: Display must be enabled under the Site Identity section.', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_site_name_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// site name text transform setting
$wp_customize->add_setting( 'hovercraft_site_name_text_transform', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// site name text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_site_name_text_transform',
        array(
            'label'     => __( 'Site Name Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for Site Name element?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_site_name_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );

// site name font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_site_name_desktop_font_size', array(
    'default'    => '36',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// site name font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_site_name_desktop_font_size',
        array(
            'label'     => __( 'Site Name Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the site name on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_site_name_desktop_font_size',
            'type' => 'text'
        )
) );
	
// site name font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_site_name_mobile_font_size', array(
    'default'    => '24',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// site name font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_site_name_mobile_font_size',
        array(
            'label'     => __( 'Site Name Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the site name on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_site_name_mobile_font_size',
            'type' => 'text'
        )
) );

// site name font weight setting
$wp_customize->add_setting( 'hovercraft_site_name_font_weight', array(
    'default'    => '700',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// site name font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_site_name_font_weight',
        array(
            'label'     => __('Site Name Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the site name? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_site_name_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// offcanvas menu text transform setting
$wp_customize->add_setting( 'hovercraft_offcanvas_menu_text_transform', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// offcanvas menu text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_offcanvas_menu_text_transform',
        array(
            'label'     => __( 'Offcanvas Menu Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for Offcanvas menu list items?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_offcanvas_menu_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );

// offcanvas menu font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_offcanvas_font_size', array(
    'default'    => '18',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// offcanvas menu font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_offcanvas_font_size',
        array(
            'label'     => __( 'Offcanvas Menu Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the Offcanvas Menu on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_offcanvas_font_size',
            'type' => 'text'
        )
) );

// offcanvas menu font weight setting
$wp_customize->add_setting( 'hovercraft_offcanvas_font_weight', array(
    'default'    => '400',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// offcanvas menu font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_offcanvas_font_weight',
        array(
            'label'     => __('Offcanvas Menu Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the Offcanvas Menu? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_offcanvas_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// offcanvas submenu text transform setting
$wp_customize->add_setting( 'hovercraft_offcanvas_submenu_text_transform', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// offcanvas submenu text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_offcanvas_submenu_text_transform',
        array(
            'label'     => __( 'Offcanvas Submenu Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for Offcanvas submenu list items?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_offcanvas_submenu_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );

// offcanvas submenu font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_offcanvas_submenu_font_size', array(
    'default'    => '16',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// offcanvas submenu font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_offcanvas_submenu_font_size',
        array(
            'label'     => __( 'Offcanvas Submenu Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the Offcanvas submenus on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_offcanvas_submenu_font_size',
            'type' => 'text'
        )
) );

// offcanvas submenu font weight setting
$wp_customize->add_setting( 'hovercraft_offcanvas_submenu_font_weight', array(
    'default'    => '400',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// offcanvas submenu font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_offcanvas_submenu_font_weight',
        array(
            'label'     => __('Offcanvas Submenu Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the Offcanvas Submenu? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_offcanvas_submenu_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// topbar text transform setting
$wp_customize->add_setting( 'hovercraft_topbar_text_transform', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// topbar text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_topbar_text_transform',
        array(
            'label'     => __( 'Topbar Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for Topbar area?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_topbar_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );
	
// topbar font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_topbar_desktop_font_size', array(
    'default'    => '14',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// topbar font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_topbar_desktop_font_size',
        array(
            'label'     => __( 'Topbar Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the Topbar on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_topbar_desktop_font_size',
            'type' => 'text'
        )
) );

// topbar font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_topbar_mobile_font_size', array(
    'default'    => '14',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// topbar font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_topbar_mobile_font_size',
        array(
            'label'     => __( 'Topbar Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the Topbar on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_topbar_mobile_font_size',
            'type' => 'text'
        )
) );

// topbar font weight setting
$wp_customize->add_setting( 'hovercraft_topbar_font_weight', array(
    'default'    => '400',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// topbar font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_topbar_font_weight',
        array(
            'label'     => __('Topbar Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the Topbar area? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_topbar_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// main menu font family setting
$wp_customize->add_setting( 'hovercraft_main_menu_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// main menu font family control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_main_menu_font',
    array(
        'label'       => __( 'Main Menu Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for the main menu links?', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_main_menu_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// main menu text transform setting
$wp_customize->add_setting( 'hovercraft_main_menu_text_transform', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// main menu text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_main_menu_text_transform',
        array(
            'label'     => __( 'Main Menu Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for Main Menu list items?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_main_menu_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );

// main menu font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_main_menu_desktop_font_size', array(
    'default'    => '18',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// main menu font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_main_menu_desktop_font_size',
        array(
            'label'     => __( 'Main Menu Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the main menu links on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_main_menu_desktop_font_size',
            'type' => 'text'
        )
) );

// main menu font weight setting
$wp_customize->add_setting( 'hovercraft_main_menu_font_weight', array(
    'default'    => '600',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// main menu font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_main_menu_font_weight',
        array(
            'label'     => __('Main Menu Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the main menu? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_main_menu_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// after byline (desktop) setting
$wp_customize->add_setting( 'hovercraft_after_byline_desktop_font_size', array(
    'default'    => '12',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// after byline (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_after_byline_desktop_font_size',
        array(
            'label'     => __( 'After Byline Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the After Byline widget on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_after_byline_desktop_font_size',
            'type' => 'text'
        )
) );

// after byline (mobile) setting
$wp_customize->add_setting( 'hovercraft_after_byline_mobile_font_size', array(
    'default'    => '12',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// after byline (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_after_byline_mobile_font_size',
        array(
            'label'     => __( 'After Byline Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the After Byline widget on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_after_byline_mobile_font_size',
            'type' => 'text'
        )
) );

// back to top text transform setting
$wp_customize->add_setting( 'hovercraft_back_to_top_text_transform', array(
    'default'    => 'uppercase',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// back to top text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_back_to_top_text_transform',
        array(
            'label'     => __( 'Back To Top Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for the Back To Top element?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_back_to_top_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );

// back to top font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_back_to_top_desktop_font_size', array(
    'default'    => '12',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// back to top font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_back_to_top_desktop_font_size',
        array(
            'label'     => __( 'Back To Top Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the back to top element on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_back_to_top_desktop_font_size',
            'type' => 'text'
        )
) );

// back to top font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_back_to_top_mobile_font_size', array(
    'default'    => '12',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// back to top font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_back_to_top_mobile_font_size',
        array(
            'label'     => __( 'Back To Top Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the back to top element on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_back_to_top_mobile_font_size',
            'type' => 'text'
        )
) );

// back to top font weight setting
$wp_customize->add_setting( 'hovercraft_back_to_top_font_weight', array(
    'default'    => '400',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// back to top font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_back_to_top_font_weight',
        array(
            'label'     => __('Back To Top Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the Back To Top element?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_back_to_top_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );
	
// h1 font family setting
$wp_customize->add_setting( 'hovercraft_h1_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// h1 font family control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_h1_font',
    array(
        'label'       => __( 'H1 Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for all H1 titles site-wide?', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_h1_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// h1 font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_h1_desktop_font_size', array(
    'default'    => '48',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h1 font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h1_desktop_font_size',
        array(
            'label'     => __( 'H1 Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the H1 titles on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h1_desktop_font_size',
            'type' => 'text'
        )
) );

// h1 font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_h1_mobile_font_size', array(
    'default'    => '36',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h1 font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h1_mobile_font_size',
        array(
            'label'     => __( 'H1 Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the H1 titles on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h1_mobile_font_size',
            'type' => 'text'
        )
) );

// h1 font weight setting
$wp_customize->add_setting( 'hovercraft_h1_font_weight', array(
    'default'    => '700',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h1 font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h1_font_weight',
        array(
            'label'     => __('H1 Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the H1 titles? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h1_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// h1 divider display setting
$wp_customize->add_setting( 'hovercraft_h1_divider_display', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// h1 divider display control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h1_divider_display',
        array(
            'label'     => __( 'H1 Divider Display', 'hovercraft' ),
			'description' => __( 'Choose if you want to display a divider (line) below the H1 elements?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h1_divider_display',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Hidden)',
				'everywhere_possible' => 'Everywhere Possible',
				'everywhere_except_heros' => 'Everywhere Except Heros'
    			)
        )
) );

// h2 font family setting
$wp_customize->add_setting( 'hovercraft_h2_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// h2 font family control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_h2_font',
    array(
        'label'       => __( 'H2 Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for all h2 titles site-wide?', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_h2_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// h2 font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_h2_desktop_font_size', array(
    'default'    => '36',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h2 font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h2_desktop_font_size',
        array(
            'label'     => __( 'H2 Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h2 titles on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h2_desktop_font_size',
            'type' => 'text'
        )
) );

// h2 font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_h2_mobile_font_size', array(
    'default'    => '30',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h2 font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h2_mobile_font_size',
        array(
            'label'     => __( 'H2 Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h2 titles on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h2_mobile_font_size',
            'type' => 'text'
        )
) );

// h2 font weight setting
$wp_customize->add_setting( 'hovercraft_h2_font_weight', array(
    'default'    => '700',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h2 font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h2_font_weight',
        array(
            'label'     => __('H2 Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the h2 titles? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h2_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// h2 divider display setting
$wp_customize->add_setting( 'hovercraft_h2_divider_display', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// h2 divider display control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h2_divider_display',
        array(
            'label'     => __( 'H2 Divider Display', 'hovercraft' ),
			'description' => __( 'Choose if you want to display a divider (line) below the H2 elements?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h2_divider_display',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Hidden)',
				'everywhere_possible' => 'Everywhere Possible'
    			)
        )
) );

// h3 font family setting
$wp_customize->add_setting( 'hovercraft_h3_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// h3 font family control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_h3_font',
    array(
        'label'       => __( 'H3 Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for all h3 titles site-wide?', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_h3_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// h3 font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_h3_desktop_font_size', array(
    'default'    => '24',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h3 font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h3_desktop_font_size',
        array(
            'label'     => __( 'H3 Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h3 titles on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h3_desktop_font_size',
            'type' => 'text'
        )
) );

// h3 font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_h3_mobile_font_size', array(
    'default'    => '24',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h3 font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h3_mobile_font_size',
        array(
            'label'     => __( 'H3 Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h3 titles on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h3_mobile_font_size',
            'type' => 'text'
        )
) );

// h3 font weight setting
$wp_customize->add_setting( 'hovercraft_h3_font_weight', array(
    'default'    => '700',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h3 font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h3_font_weight',
        array(
            'label'     => __('H3 Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the h3 titles? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h3_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// h4 font family setting
$wp_customize->add_setting( 'hovercraft_h4_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// h4 font family control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_h4_font',
    array(
        'label'       => __( 'H4 Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for all h4 titles site-wide?', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_h4_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// h4 font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_h4_desktop_font_size', array(
    'default'    => '20',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h4 font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h4_desktop_font_size',
        array(
            'label'     => __( 'H4 Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h4 titles on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h4_desktop_font_size',
            'type' => 'text'
        )
) );

// h4 font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_h4_mobile_font_size', array(
    'default'    => '20',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h4 font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h4_mobile_font_size',
        array(
            'label'     => __( 'H4 Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h4 titles on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h4_mobile_font_size',
            'type' => 'text'
        )
) );

// h4 font weight setting
$wp_customize->add_setting( 'hovercraft_h4_font_weight', array(
    'default'    => '700',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h4 font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h4_font_weight',
        array(
            'label'     => __('H4 Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the h4 titles? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h4_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// h5 font family setting
$wp_customize->add_setting( 'hovercraft_h5_font', array(
    'default'    => '',
    'sanitize_callback' => 'hovercraft_sanitize_select',
) );

// h5 font family control
$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'hovercraft_h5_font',
    array(
        'label'       => __( 'H5 Font Family', 'hovercraft' ),
        'description' => __( 'Which Google Fonts family should be used for all h5 titles site-wide?', 'hovercraft' ),
        'section'     => 'hovercraft_fonts',
        'settings'    => 'hovercraft_h5_font',
        'type'        => 'select',
        'choices'     => $hovercraft_available_fonts,
    )
) );

// h5 font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_h5_desktop_font_size', array(
    'default'    => '18',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h5 font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h5_desktop_font_size',
        array(
            'label'     => __( 'H5 Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h5 titles on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h5_desktop_font_size',
            'type' => 'text'
        )
) );

// h5 font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_h5_mobile_font_size', array(
    'default'    => '18',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h5 font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h5_mobile_font_size',
        array(
            'label'     => __( 'H5 Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the h5 titles on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h5_mobile_font_size',
            'type' => 'text'
        )
) );

// h5 font weight setting
$wp_customize->add_setting( 'hovercraft_h5_font_weight', array(
    'default'    => '700',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// h5 font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_h5_font_weight',
        array(
            'label'     => __('H5 Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the h5 titles? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_h5_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// sidebar widget title text transform setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_title_text_transform', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// sidebar widget title text transform control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sidebar_widget_title_text_transform',
        array(
            'label'     => __( 'Sidebar Widget Title Text Transform', 'hovercraft' ),
			'description' => __( 'Specify text transform for sidebar widget titles?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_sidebar_widget_title_text_transform',
            'type' => 'select',
			'choices' => array(
				'none' => 'Default (None)',
				'uppercase' => 'Uppercase',
				'lowercase' => 'Lowercase',
				'capitalize' => 'Capitalize',
    			)
        )
) );

// sidebar widget title font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_title_desktop_font_size', array(
    'default'    => '24',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// sidebar widget title font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sidebar_widget_title_desktop_font_size',
        array(
            'label'     => __( 'Sidebar Widget Title Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the sidebar widget titles on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_sidebar_widget_title_desktop_font_size',
            'type' => 'text'
        )
) );

// sidebar widget title font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_title_mobile_font_size', array(
    'default'    => '24',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// sidebar widget title font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sidebar_widget_title_mobile_font_size',
        array(
            'label'     => __( 'Sidebar Widget Title Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the sidebar widget titles on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_sidebar_widget_title_mobile_font_size',
            'type' => 'text'
        )
) );

// sidebar widget title font weight setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_title_font_weight', array(
    'default'    => '600',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// sidebar widget title font weight control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sidebar_widget_title_font_weight',
        array(
            'label'     => __('Sidebar Widget Title Font Weight', 'hovercraft'),
			'description' => __( 'Specify font weight to use for the Sidebar widget titles? Note: Ensure your chosen font family supports the font weight that you choose.', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_sidebar_widget_title_font_weight',
            'type'      => 'select',
			'choices' => array(
        		'700' => '700',
        		'600' => '600',
				'400' => '400'
    			)
        )
) );

// social sharing font size setting
$wp_customize->add_setting( 'hovercraft_social_sharing_font_size', array(
    'default'    => '18',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// social sharing font size control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_social_sharing_font_size',
        array(
            'label'     => __( 'Social Sharing Font Size', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the social sharing icons?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_social_sharing_font_size',
            'type' => 'text'
        )
) );

// footer font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_footer_desktop_font_size', array(
    'default'    => '14',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// footer font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_footer_desktop_font_size',
        array(
            'label'     => __( 'Footer Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the footer on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_footer_desktop_font_size',
            'type' => 'text'
        )
) );

// footer font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_footer_mobile_font_size', array(
    'default'    => '14',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// footer font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_footer_mobile_font_size',
        array(
            'label'     => __( 'Footer Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the footer on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_footer_mobile_font_size',
            'type' => 'text'
        )
) );

// copyright font size (desktop) setting
$wp_customize->add_setting( 'hovercraft_copyright_desktop_font_size', array(
    'default'    => '14',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// copyright font size (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_copyright_desktop_font_size',
        array(
            'label'     => __( 'Copyright Font Size (Desktop)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the copyright on desktop devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_copyright_desktop_font_size',
            'type' => 'text'
        )
) );

// copyright font size (mobile) setting
$wp_customize->add_setting( 'hovercraft_copyright_mobile_font_size', array(
    'default'    => '14',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// copyright font size (mobile) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_copyright_mobile_font_size',
        array(
            'label'     => __( 'Copyright Font Size (Mobile)', 'hovercraft' ),
			'description' => __( 'Specify font size to use, in pixels, for the copyright on mobile devices?', 'hovercraft' ),
            'section'   => 'hovercraft_fonts',
            'settings'  => 'hovercraft_copyright_mobile_font_size',
            'type' => 'text'
        )
) );

// default text color setting
$wp_customize->add_setting( 'hovercraft_default_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// default text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_default_text_color', array(
	'label' => 'Default Text Color',
	'description' => 'Default text color site-wide',
	'section' => 'colors',
	'settings' => 'hovercraft_default_text_color'
	)
) );

// divider above default link colors setting
$wp_customize->add_setting( 'hovercraft_divider_default_link_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above default link colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_default_link_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_default_link_colors',
)));
	
// default link color setting
$wp_customize->add_setting( 'hovercraft_default_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// default link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_default_link_color', array(
	'label' => 'Default Link Color',
	'description' => 'Default link color site-wide',
	'section' => 'colors',
	'settings' => 'hovercraft_default_link_color'
	)
) );
	
// default hover color setting
$wp_customize->add_setting( 'hovercraft_default_hover_color', array(
	'default' => '#283593',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// default hover color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_default_hover_color', array(
	'label' => 'Default Hover Color',
	'description' => 'Default hover color site-wide',
	'section' => 'colors',
	'settings' => 'hovercraft_default_hover_color'
	)
) );

// divider above hero snippet colors setting
$wp_customize->add_setting( 'hovercraft_divider_hero_snippet_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above hero snippet colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_hero_snippet_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_hero_snippet_colors',
)));

// hero snippet text color setting
$wp_customize->add_setting( 'hovercraft_hero_snippet_text_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// hero snippet text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_hero_snippet_text_color', array(
	'label' => 'Hero Snippet Text Color',
	'description' => 'Hero Snippet Text Color',
	'section' => 'colors',
	'settings' => 'hovercraft_hero_snippet_text_color'
	)
) );

// hero snippet link color setting
$wp_customize->add_setting( 'hovercraft_hero_snippet_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// hero snippet link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_hero_snippet_link_color', array(
	'label' => 'Hero Snippet Link Color',
	'description' => 'Hero Snippet Link Color',
	'section' => 'colors',
	'settings' => 'hovercraft_hero_snippet_link_color'
	)
) );

// divider above breadcrumbs colors setting
$wp_customize->add_setting( 'hovercraft_divider_breadcrumbs_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above breadcrumbs colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_breadcrumbs_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_breadcrumbs_colors',
)));
	
// breadcrumbs text color setting
$wp_customize->add_setting( 'hovercraft_breadcrumbs_text_color', array(
	'default' => '#607D8B',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// breadcrumbs text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_breadcrumbs_text_color', array(
	'label' => 'Breadcrumbs Text Color',
	'description' => 'Breadcrumbs text color',
	'section' => 'colors',
	'settings' => 'hovercraft_breadcrumbs_text_color'
	)
) );

// breadcrumbs link color setting
$wp_customize->add_setting( 'hovercraft_breadcrumbs_link_color', array(
	'default' => '#607D8B',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// breadcrumbs link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_breadcrumbs_link_color', array(
	'label' => 'Breadcrumbs Link Color',
	'description' => 'Breadcrumbs link color',
	'section' => 'colors',
	'settings' => 'hovercraft_breadcrumbs_link_color'
	)
) );

// divider above search bar colors setting
$wp_customize->add_setting( 'hovercraft_divider_search_bar_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above search bar colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_search_bar_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_search_bar_colors',
)));

// search bar background color setting
$wp_customize->add_setting( 'hovercraft_search_bar_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// search bar background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_search_bar_background_color', array(
	'label' => 'Search Bar Background Color',
	'description' => 'Specify background color of the search bar element?',
	'section' => 'colors',
	'settings' => 'hovercraft_search_bar_background_color'
	)
) );

// search bar border color setting
$wp_customize->add_setting( 'hovercraft_search_bar_border_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// search bar border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_search_bar_border_color', array(
	'label' => 'Search Bar Border Color',
	'description' => 'Specify border color of the search bar element?',
	'section' => 'colors',
	'settings' => 'hovercraft_search_bar_border_color'
	)
) );
	
// search input placeholder color setting
$wp_customize->add_setting( 'hovercraft_search_input_placeholder_color', array(
	'default' => '#757575',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// search input placeholder color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_search_input_placeholder_color', array(
	'label' => 'Search Input Placeholder Color',
	'description' => 'Specify color of the placeholder text that appears before search input element is active?',
	'section' => 'colors',
	'settings' => 'hovercraft_search_input_placeholder_color'
	)
) );

// search input text color setting
$wp_customize->add_setting( 'hovercraft_search_input_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// search input text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_search_input_text_color', array(
	'label' => 'Search Input Text Color',
	'description' => 'Search input text color',
	'section' => 'colors',
	'settings' => 'hovercraft_search_input_text_color'
	)
) );

// divider above heading colors setting
$wp_customize->add_setting( 'hovercraft_divider_heading_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above heading colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_heading_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_heading_colors',
)));

// h1 h2 title divider background color setting
$wp_customize->add_setting( 'hovercraft_title_divider_background_color', array(
	'default' => '#757575',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// h1 h2 title divider background color color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_title_divider_background_color', array(
	'label' => 'H1 H2 Divider Background Color',
	'description' => 'Specificy the background color of the H1 H2 divider line?',
	'section' => 'colors',
	'settings' => 'hovercraft_title_divider_background_color'
	)
) );

// divider above blockquote colors setting
$wp_customize->add_setting( 'hovercraft_divider_blockquote_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above blockquote colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_blockquote_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_blockquote_colors',
)));

// blockquote text color setting
$wp_customize->add_setting( 'hovercraft_blockquote_text_color', array(
	'default' => '#616161',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// blockquote text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_blockquote_text_color', array(
	'label' => 'Blockquote Text Color',
	'description' => 'Specificy the text color on blockquotes?',
	'section' => 'colors',
	'settings' => 'hovercraft_blockquote_text_color'
	)
) );

// blockquote border color setting
$wp_customize->add_setting( 'hovercraft_blockquote_border_color', array(
	'default' => '#757575',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// blockquote border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_blockquote_border_color', array(
	'label' => 'Blockquote Border Color',
	'description' => 'Specificy the border-left color on blockquotes?',
	'section' => 'colors',
	'settings' => 'hovercraft_blockquote_border_color'
	)
) );

// divider above woocommerce price colors setting
$wp_customize->add_setting( 'hovercraft_divider_woocommerce_price_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above woocommerce price colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_woocommerce_price_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_woocommerce_price_colors',
)));

// woocommerce price text color setting
$wp_customize->add_setting( 'hovercraft_woocommerce_price_text_color', array(
	'default' => '#9E9D24',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// woocommerce price text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_woocommerce_price_text_color', array(
	'label' => 'WooCommerce Price Text Color',
	'description' => 'Text color of the prices displayed by WooCommerce on products?',
	'section' => 'colors',
	'settings' => 'hovercraft_woocommerce_price_text_color'
	)
) );

// divider above offcanvas menu colors setting
$wp_customize->add_setting( 'hovercraft_divider_offcanvas_menu_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above offcanvas menu colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_offcanvas_menu_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_offcanvas_menu_colors',
)));

// offcanvas menu background color setting
$wp_customize->add_setting( 'hovercraft_offcanvas_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// offcanvas menu background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_offcanvas_background_color', array(
	'label' => 'Offcanvas Menu Background Color',
	'description' => 'Specify background color of the Offcanvas Menu element?',
	'section' => 'colors',
	'settings' => 'hovercraft_offcanvas_background_color'
	)
) );

// offcanvas toggle background color setting
$wp_customize->add_setting( 'hovercraft_offcanvas_toggle_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// offcanvas toggle background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_offcanvas_toggle_background_color', array(
	'label' => 'Offcanvas Toggle Background Color',
	'description' => 'Specify background color of the Offcanvas Menu toggle elements?',
	'section' => 'colors',
	'settings' => 'hovercraft_offcanvas_toggle_background_color'
	)
) );

// divider above topbar colors setting
$wp_customize->add_setting( 'hovercraft_divider_topbar_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above topbar colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_topbar_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_topbar_colors',
)));
 
// topbar background color setting
$wp_customize->add_setting( 'hovercraft_topbar_background_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// topbar background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_topbar_background_color', array(
	'label' => 'Topbar Background Color',
	'description' => 'Specify background color of the Topbar element? Note: Choose a bold tone or black for best results, and avoid white or shades of gray, which may result in poor visibility or CSS conflicts.',
	'section' => 'colors',
	'settings' => 'hovercraft_topbar_background_color'
	)
) );
	
// topbar text color setting
$wp_customize->add_setting( 'hovercraft_topbar_text_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// topbar text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_topbar_text_color', array(
	'label' => 'Topbar Text Color',
	'description' => 'Applies to any plain text inside the topbar.',
	'section' => 'colors',
	'settings' => 'hovercraft_topbar_text_color'
	)
) );
	
// topbar link color setting
$wp_customize->add_setting( 'hovercraft_topbar_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// topbar link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_topbar_link_color', array(
	'label' => 'Topbar Link Color',
	'description' => 'Applies to any links inside the topbar.',
	'section' => 'colors',
	'settings' => 'hovercraft_topbar_link_color'
	)
) );

// divider above full hero colors setting
$wp_customize->add_setting( 'hovercraft_divider_full_hero_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above full hero colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_full_hero_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_full_hero_colors',
)));

// full hero header background color setting
$wp_customize->add_setting( 'hovercraft_full_hero_header_background_color', array(
	'default' => '#37474f',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// full hero header background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_full_hero_header_background_color', array(
	'label' => 'Full Hero Header Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_full_hero_header_background_color'
	)
) );

// divider above hero gradient colors setting
$wp_customize->add_setting( 'hovercraft_divider_hero_gradient_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above hero gradient colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_hero_gradient_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_hero_gradient_colors',
)));

// hero gradient start color setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_start_color', array(
	'default' => '#37474f',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// hero gradient start color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_hero_gradient_start_color', array(
	'label' => 'Hero Gradient Start Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_hero_gradient_start_color'
	)
) );

// hero gradient mid color setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_mid_color', array(
	'default' => '#37474f',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// hero gradient mid color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_hero_gradient_mid_color', array(
	'label' => 'Hero Gradient Mid Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_hero_gradient_mid_color'
	)
) );
	
// hero gradient stop color setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_stop_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// hero gradient stop color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_hero_gradient_stop_color', array(
	'label' => 'Hero Gradient Stop Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_hero_gradient_stop_color'
	)
) );

// divider above half hero colors setting
$wp_customize->add_setting( 'hovercraft_divider_half_hero_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above half hero colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_half_hero_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_half_hero_colors',
)));
	
// header half hero background color setting
$wp_customize->add_setting( 'hovercraft_header_half_hero_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header half hero background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_header_half_hero_background_color', array(
	'label' => 'Header (Half Hero) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_header_half_hero_background_color'
	)
) );

// header half hero text color setting
$wp_customize->add_setting( 'hovercraft_header_half_hero_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header half hero text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_header_half_hero_text_color', array(
	'label' => 'Header (Half Hero) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_header_half_hero_text_color'
	)
) );

// header half hero link color setting
$wp_customize->add_setting( 'hovercraft_header_half_hero_link_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header half hero link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_header_half_hero_link_color', array(
	'label' => 'Header (Half Hero) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_header_half_hero_link_color'
	)
) );

// divider above mini hero colors setting
$wp_customize->add_setting( 'hovercraft_divider_mini_hero_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above mini hero colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_mini_hero_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_mini_hero_colors',
)));
	
// header mini hero background color setting
$wp_customize->add_setting( 'hovercraft_header_mini_hero_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header mini hero background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_header_mini_hero_background_color', array(
	'label' => 'Header (Mini Hero) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_header_mini_hero_background_color'
	)
) );
	
// header mini hero text color setting
$wp_customize->add_setting( 'hovercraft_mini_hero_header_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header mini hero text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_mini_hero_header_text_color', array(
	'label' => 'Header (Mini Hero) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_mini_hero_header_text_color'
	)
) );
	
// header mini hero link color setting
$wp_customize->add_setting( 'hovercraft_mini_hero_header_link_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header mini hero link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_mini_hero_header_link_color', array(
	'label' => 'Header (Mini Hero) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_mini_hero_header_link_color'
	)
) );

// divider above header basic colors setting
$wp_customize->add_setting( 'hovercraft_divider_header_basic_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above header basic colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_header_basic_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_header_basic_colors',
)));
	
// header basic background color setting
$wp_customize->add_setting( 'hovercraft_header_basic_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header basic background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_header_basic_background_color', array(
	'label' => 'Header (Basic) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_header_basic_background_color'
	)
) );
	
// header basic hero text color setting
$wp_customize->add_setting( 'hovercraft_basic_hero_header_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header basic hero text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_basic_hero_header_text_color', array(
	'label' => 'Header (Basic) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_basic_hero_header_text_color'
	)
) );
	
// header basic hero link color setting
$wp_customize->add_setting( 'hovercraft_basic_hero_header_link_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// header basic hero link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_basic_hero_header_link_color', array(
	'label' => 'Header (Basic) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_basic_hero_header_link_color'
	)
) );

// divider above posthero colors setting
$wp_customize->add_setting( 'hovercraft_divider_posthero_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above posthero colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_posthero_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_posthero_colors',
)));
	
// posthero background color setting
$wp_customize->add_setting( 'hovercraft_posthero_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// posthero background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_posthero_background_color', array(
	'label' => 'Posthero Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_posthero_background_color'
	)
) );
	
// posthero text color setting
$wp_customize->add_setting( 'hovercraft_posthero_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// posthero text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_posthero_text_color', array(
	'label' => 'Posthero Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_posthero_text_color'
	)
) );

// posthero link color setting
$wp_customize->add_setting( 'hovercraft_posthero_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// posthero link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_posthero_link_color', array(
	'label' => 'Posthero Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_posthero_link_color'
	)
) );

// divider above after byline colors setting
$wp_customize->add_setting( 'hovercraft_divider_after_byline_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above after byline colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_after_byline_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_after_byline_colors',
)));

// after byline background color setting
$wp_customize->add_setting( 'hovercraft_after_byline_background_color', array(
	'default' => '#fff8e1',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// after byline background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_after_byline_background_color', array(
	'label' => 'After Byline Background Color',
	'description' => 'Applies to the After Byline widget element.',
	'section' => 'colors',
	'settings' => 'hovercraft_after_byline_background_color'
	)
) );

// after byline text color setting
$wp_customize->add_setting( 'hovercraft_after_byline_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// after byline text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_after_byline_text_color', array(
	'label' => 'After Byline Text Color',
	'description' => 'Specify the text color in the After Byline widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_after_byline_text_color'
	)
) );

// after byline link color setting
$wp_customize->add_setting( 'hovercraft_after_byline_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// after byline link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_after_byline_link_color', array(
	'label' => 'After Byline Link Color',
	'description' => 'Specify the link color in the After Byline widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_after_byline_link_color'
	)
) );

// divider above main background colors setting
$wp_customize->add_setting( 'hovercraft_divider_main_background_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above main background colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_main_background_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_main_background_colors',
)));

// main background color setting
$wp_customize->add_setting( 'hovercraft_main_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// main background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_main_background_color', array(
	'label' => 'Main Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_main_background_color'
	)
) );

// main background color (homepage) setting
$wp_customize->add_setting( 'hovercraft_main_background_color_homepage', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// main background color (homepage) control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_main_background_color_homepage', array(
	'label' => 'Main Background Color (Homepage)',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_main_background_color_homepage'
	)
) );

// divider above content background colors setting
$wp_customize->add_setting( 'hovercraft_divider_content_background_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above content background colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_content_background_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_content_background_colors',
)));

// content background color setting
$wp_customize->add_setting( 'hovercraft_content_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// content background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_content_background_color', array(
	'label' => 'Content Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_content_background_color'
	)
) );

// divider above sidebar callout colors setting
$wp_customize->add_setting( 'hovercraft_divider_sidebar_callout_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above sidebar callout colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_sidebar_callout_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_sidebar_callout_colors',
)));
	
// sidebar callout background color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_background_color', array(
	'default' => '#283593',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_background_color', array(
	'label' => 'Sidebar Callout Background Color',
	'description' => 'Specify background color of the Sidebar Callout widget? Note: Choose a bold tone for best results, and avoid white or shades of gray, which may result in poor visibility or CSS conflicts.',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_background_color'
	)
) );

// sidebar callout border color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_border_color', array(
	'default' => '#283593',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_border_color', array(
	'label' => 'Sidebar Callout Border Color',
	'description' => 'Specify border color of sidebar callout widget',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_border_color'
	)
) );
	
// sidebar callout text color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_text_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_text_color', array(
	'label' => 'Sidebar Callout Text Color',
	'description' => 'Specify text color of the Sidebar Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_text_color'
	)
) );

// sidebar callout CTA background color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_cta_background_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout CTA background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_cta_background_color', array(
	'label' => 'Sidebar Callout CTA Background Color',
	'description' => 'Specify background color of the Sidebar Callout CTA?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_cta_background_color'
	)
) );

// sidebar callout CTA border color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_cta_border_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout CTA border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_cta_border_color', array(
	'label' => 'Sidebar Callout CTA Border Color',
	'description' => 'Specify border color of the Sidebar Callout CTA?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_cta_border_color'
	)
) );
	
// sidebar callout CTA link color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout CTA link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_link_color', array(
	'label' => 'Sidebar Callout CTA Link Color',
	'description' => 'Specify link color of the Sidebar Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_link_color'
	)
) );

// sidebar callout (hover) background color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_hover_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout (hover) background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_hover_background_color', array(
	'label' => 'Sidebar Callout CTA Background Hover Color',
	'description' => 'Specify the hover background color for the CTA button in SideBar Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_hover_background_color'
	)
) );

// sidebar callout (hover) link color setting
$wp_customize->add_setting( 'hovercraft_sidebar_callout_hover_link_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar callout (hover) link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_callout_hover_link_color', array(
	'label' => 'Sidebar Callout CTA Link Hover Color',
	'description' => 'Specify the hover link color for the CTA button in SideBar Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_callout_hover_link_color'
	)
) );

// divider above sidebar widgets colors setting
$wp_customize->add_setting( 'hovercraft_divider_sidebar_widgets_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above sidebar widgets colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_sidebar_widgets_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_sidebar_widgets_colors',
)));

// sidebar left border color setting
$wp_customize->add_setting( 'hovercraft_sidebar_left_border_color', array(
	'default' => '#e0e0e0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar left border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_left_border_color', array(
	'label' => 'Sidebar Left Border Color',
	'description' => 'Specify the color of the left border of the sidebar.',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_left_border_color'
) ) );


// sidebar widgets background color setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar widgets background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_widget_background_color', array(
	'label' => 'Sidebar Widgets Background Color',
	'description' => 'Specify background color of default sidebar widgets?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_widget_background_color'
	)
) );

// sidebar widgets border color setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_border_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar widgets border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_widget_border_color', array(
	'label' => 'Sidebar Widgets Border Color',
	'description' => 'Specify border color of default sidebar widgets?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_widget_border_color'
	)
) );
	
// sidebar widgets text color setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar widgets text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_widget_text_color', array(
	'label' => 'Sidebar Widgets Text Color',
	'description' => 'Specify text color of default sidebar widgets?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_widget_text_color'
	)
) );
	
// sidebar widgets link color setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar widgets link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_widget_link_color', array(
	'label' => 'Sidebar Widgets Link Color',
	'description' => 'Specify link color of default sidebar widgets?',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_widget_link_color'
	)
) );

// sidebar widget title text color setting
$wp_customize->add_setting( 'hovercraft_sidebar_widget_title_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// sidebar widget title text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_sidebar_widget_title_text_color', array(
	'label' => 'Sidebar Widget Title Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_sidebar_widget_title_text_color'
	)
) );

// divider above tile colors setting
$wp_customize->add_setting( 'hovercraft_divider_tile_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above tile colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_tile_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_tile_colors',
)));

// tile background color setting
$wp_customize->add_setting( 'hovercraft_tile_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// tile background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_tile_background_color', array(
	'label' => 'Tile Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_tile_background_color'
	)
) );

// tile border color setting
$wp_customize->add_setting( 'hovercraft_tile_border_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// tile border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_tile_border_color', array(
	'label' => 'Tile Border Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_tile_border_color'
	)
) );

// divider above column colors setting
$wp_customize->add_setting( 'hovercraft_divider_column_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above column colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_column_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_column_colors',
)));

// column background color setting
$wp_customize->add_setting( 'hovercraft_column_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// column background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_column_background_color', array(
	'label' => 'Column Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_column_background_color'
	)
) );

// column border color setting
$wp_customize->add_setting( 'hovercraft_column_border_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// column border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_column_border_color', array(
	'label' => 'Column Border Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_column_border_color'
	)
) );

// divider above postmain top colors setting
$wp_customize->add_setting( 'hovercraft_divider_postmain_top_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above postmain top colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_postmain_top_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_postmain_top_colors',
)));

// home postmain (top) background color setting
$wp_customize->add_setting( 'hovercraft_postmain_top_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// home postmain (top) background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_postmain_top_background_color', array(
	'label' => 'Home Postmain (Top) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_postmain_top_background_color'
	)
) );
	
// home postmain (top) text color setting
$wp_customize->add_setting( 'hovercraft_postmain_top_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// home postmain (top) text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_postmain_top_text_color', array(
	'label' => 'Home Postmain (Top) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_postmain_top_text_color'
	)
) );
	
// home postmain (top) link color setting
$wp_customize->add_setting( 'hovercraft_postmain_top_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// home postmain (top) link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_postmain_top_link_color', array(
	'label' => 'Home Postmain (Top) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_postmain_top_link_color'
	)
) );

// divider above postmain bottom colors setting
$wp_customize->add_setting( 'hovercraft_divider_postmain_bottom_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above postmain bottom colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_postmain_bottom_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_postmain_bottom_colors',
)));

// home postmain (bottom) background color setting
$wp_customize->add_setting( 'hovercraft_postmain_bottom_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// home postmain (bottom) background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_postmain_bottom_background_color', array(
	'label' => 'Home Postmain (Bottom) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_postmain_bottom_background_color'
	)
) );
	
// home postmain (bottom) text color setting
$wp_customize->add_setting( 'hovercraft_postmain_bottom_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// home postmain (bottom) text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_postmain_bottom_text_color', array(
	'label' => 'Home Postmain (Bottom) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_postmain_bottom_text_color'
	)
) );
	
// home postmain (bottom) link color setting
$wp_customize->add_setting( 'hovercraft_postmain_bottom_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// home postmain (bottom) link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_postmain_bottom_link_color', array(
	'label' => 'Home Postmain (Bottom) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_postmain_bottom_link_color'
	)
) );

// divider above prefooter top colors setting
$wp_customize->add_setting( 'hovercraft_divider_prefooter_top_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above prefooter top colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_prefooter_top_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_prefooter_top_colors',
)));

// prefooter (top) background color setting
$wp_customize->add_setting( 'hovercraft_prefooter_top_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// prefooter (top) background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_prefooter_top_background_color', array(
	'label' => 'Prefooter (Top) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_prefooter_top_background_color'
	)
) );
	
// prefooter (top) text color setting
$wp_customize->add_setting( 'hovercraft_prefooter_top_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// prefooter (top) text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_prefooter_top_text_color', array(
	'label' => 'Prefooter (Top) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_prefooter_top_text_color'
	)
) );
	
// prefooter (top) link color setting
$wp_customize->add_setting( 'hovercraft_prefooter_top_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// prefooter (top) link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_prefooter_top_link_color', array(
	'label' => 'Prefooter (Top) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_prefooter_top_link_color'
	)
) );

// divider above prefooter bottom colors setting
$wp_customize->add_setting( 'hovercraft_divider_prefooter_bottom_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above prefooter bottom colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_prefooter_bottom_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_prefooter_bottom_colors',
)));

// prefooter (bottom) background color setting
$wp_customize->add_setting( 'hovercraft_prefooter_bottom_background_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// prefooter (bottom) background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_prefooter_bottom_background_color', array(
	'label' => 'Prefooter (Bottom) Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_prefooter_bottom_background_color'
	)
) );
	
// prefooter (bottom) text color setting
$wp_customize->add_setting( 'hovercraft_prefooter_bottom_text_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// prefooter (bottom) text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_prefooter_bottom_text_color', array(
	'label' => 'Prefooter (Bottom) Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_prefooter_bottom_text_color'
	)
) );
	
// prefooter (bottom) link color setting
$wp_customize->add_setting( 'hovercraft_prefooter_bottom_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// prefooter (bottom) link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_prefooter_bottom_link_color', array(
	'label' => 'Prefooter (Bottom) Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_prefooter_bottom_link_color'
	)
) );

// divider above footer colors setting
$wp_customize->add_setting( 'hovercraft_divider_footer_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above footer colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_footer_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_footer_colors',
)));

// footer background color setting
$wp_customize->add_setting( 'hovercraft_footer_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// footer background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_background_color', array(
	'label' => 'Footer Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_background_color'
	)
) );
	
// footer text color setting
$wp_customize->add_setting( 'hovercraft_footer_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// footer text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_text_color', array(
	'label' => 'Footer Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_text_color'
	)
) );
	
// footer link color setting
$wp_customize->add_setting( 'hovercraft_footer_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );
 
// footer link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_link_color', array(
	'label' => 'Footer Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_link_color'
	)
) );

// footer callout background color setting
$wp_customize->add_setting( 'hovercraft_footer_callout_background_color', array(
	'default' => '#283593',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// footer callout background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_callout_background_color', array(
	'label' => 'Footer Callout Background Color',
	'description' => 'Specify background color of the Footer Callout widget? Note: Choose a bold tone for best results, and avoid white or shades of gray, which may result in poor visibility or CSS conflicts.',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_callout_background_color'
	)
) );

// footer callout border color setting
$wp_customize->add_setting( 'hovercraft_footer_callout_border_color', array(
	'default' => '#283593',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// footer callout border color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_callout_border_color', array(
	'label' => 'Footer Callout Border Color',
	'description' => 'Specify border color of the Footer Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_callout_border_color'
	)
) );

// footer callout text color setting
$wp_customize->add_setting( 'hovercraft_footer_callout_text_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// footer callout text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_callout_text_color', array(
	'label' => 'Footer Callout Text Color',
	'description' => 'Specify text color of the Footer Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_callout_text_color'
	)
) );

// footer callout link color setting
$wp_customize->add_setting( 'hovercraft_footer_callout_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// footer callout link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_footer_callout_link_color', array(
	'label' => 'Footer Callout Link Color',
	'description' => 'Specify link color of the Footer Callout widget?',
	'section' => 'colors',
	'settings' => 'hovercraft_footer_callout_link_color'
	)
) );

// divider above copyright colors setting
$wp_customize->add_setting( 'hovercraft_divider_copyright_colors', array(
	'sanitize_callback' => '__return_null',
));

// divider above copyright colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_copyright_colors', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_copyright_colors',
)));

// copyright background color setting
$wp_customize->add_setting( 'hovercraft_copyright_background_color', array(
        'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
		));
 
// copyright background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_copyright_background_color', array(
	'label' => 'Copyright Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_copyright_background_color'
    )));

// copyright text color setting
$wp_customize->add_setting( 'hovercraft_copyright_text_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// copyright text color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_copyright_text_color', array(
	'label' => 'Copyright Text Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_copyright_text_color'
	)
) );
	
// copyright link color setting
$wp_customize->add_setting( 'hovercraft_copyright_link_color', array(
	'default' => '#5C6BC0',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// copyright link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_copyright_link_color', array(
	'label' => 'Copyright Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_copyright_link_color'
	)
) );

// divider above back to top colors setting
$wp_customize->add_setting( 'hovercraft_divider_back_to_top', array(
	'sanitize_callback' => '__return_null',
));

// divider above back to top colors control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hovercraft_divider_back_to_top', array(
	'description' => '<hr style="margin: 16px 0; border: 0; border-top: 2px solid #ddd;">',
	'type' => 'hidden',
	'section' => 'colors',
	'settings' => 'hovercraft_divider_back_to_top',
)));

// back to top background color setting
$wp_customize->add_setting( 'hovercraft_back_to_top_background_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// back to top background color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_back_to_top_background_color', array(
	'label' => 'Back To Top Background Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_back_to_top_background_color'
	)
) );

// back to top background hover color setting
$wp_customize->add_setting( 'hovercraft_back_to_top_background_hover_color', array(
	'default' => '#eceff1',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// back to top background hover color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_back_to_top_background_hover_color', array(
	'label' => 'Back To Top Background Hover Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_back_to_top_background_hover_color'
	)
) );
	
// back to top link color setting
$wp_customize->add_setting( 'hovercraft_back_to_top_link_color', array(
	'default' => '#263238',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// back to top link color control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hovercraft_back_to_top_link_color', array(
	'label' => 'Back To Top Link Color',
	'description' => 'This is a description',
	'section' => 'colors',
	'settings' => 'hovercraft_back_to_top_link_color'
	)
) );

// sidebar section
$wp_customize->add_section( 'hovercraft_sidebar', array(
    'title'      => 'Sidebar',
    'priority'   => 120,
) );

// sidebar appears setting
$wp_customize->add_setting( 'hovercraft_sidebar_appears', array(
    'default'    => 'everywhere',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// sidebar appears control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sidebar_appears',
        array(
            'label'     => __( 'Sidebar Appears', 'hovercraft' ),
			'description' => __( 'One which pages should the Sidebar element be displayed (Note: when enabled, this forces the Main Content width to be narrow)?', 'hovercraft' ),
            'section'   => 'hovercraft_sidebar',
            'settings'  => 'hovercraft_sidebar_appears',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
				'everywhere' => 'Everywhere Possible',
				'posts_only' => 'Posts Only'
    			)
        )
) );

// primary width setting
$wp_customize->add_setting( 'hovercraft_primary_width', array(
    'default'    => 'narrow_centered',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// primary width control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_primary_width',
        array(
            'label'     => __( 'Main Content Width (Desktop)', 'hovercraft' ),
			'description' => __( 'If Sidebar disabled, what should be the default width of the Main Content section?', 'hovercraft' ),
            'section'   => 'hovercraft_sidebar',
            'settings'  => 'hovercraft_primary_width',
            'type'      => 'select',
			'choices' => array(
        		'narrow_centered' => 'Narrow Centered (768px)',
        		'wide' => 'Wide (1200px)'
    			)
        )
) );

// sidebar padding setting
$wp_customize->add_setting( 'hovercraft_sidebar_padding', array(
    'default' => 0,
	'sanitize_callback' => 'hovercraft_sanitize_checkbox',
) );

// sidebar padding control
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'hovercraft_sidebar_padding',
        array(
            'label'     => __('Enable sidebar padding', 'hovercraft'),
            'section'   => 'hovercraft_sidebar',
            'settings'  => 'hovercraft_sidebar_padding',
            'type'      => 'checkbox',
        )
    )
);

// footer section
$wp_customize->add_section( 'hovercraft_footer', array(
	'title'      => 'Footer',
    'priority'    => 130,
    'description' => 'Allows you to customize how many footer columns',
 	)
);

// footer columns setting
$wp_customize->add_setting( 'hovercraft_footer_columns', array(
    'default'    => 'four_weighted',
    'type'       => 'theme_mod',
	'sanitize_callback' => 'hovercraft_sanitize_radio',
 	)
);

// footer columns control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
 		'hovercraft_footer_columns', array(
    		'label' => 'Footer Columns',
    		'description' => 'Using this option you can change footer columns',
    		'settings' => 'hovercraft_footer_columns',
    		'priority' => 10,
    		'section' => 'hovercraft_footer',
    		'type' => 'radio',
    		'choices' => array(
        		'four_weighted' => 'Four Weighted',
        		'four_equal' => 'Four Equal',
        		'three_weighted' => 'Three Weighted',
        		'three_equal' => 'Three Equal',
    			)
			)
) );

// hover effects section
$wp_customize->add_section( 'hovercraft_effects', array(
    'title'      => 'Hover Effects',
    'priority'   => 107,
) );

// hover effects logo setting
$wp_customize->add_setting( 'hovercraft_logo_effect', array(
    'default'    => 'default',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// hover effects logo control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_logo_effect',
        array(
            'label'     => __('Logo effect', 'hovercraft'),
			'description' => __( 'CSS hover effect for logos in the header', 'hovercraft' ),
            'section'   => 'hovercraft_effects',
            'settings'  => 'hovercraft_logo_effect',
            'type'      => 'select',
			'choices' => array(
        		'default' => 'Default',
        		'cerulean' => 'Cerulean',
        		'cosmo' => 'Cosmo',
        		'cyborg' => 'cyborg',
    			)
        )
) );

// hover effects main menu links setting
$wp_customize->add_setting( 'hovercraft_main_menu_links_effect', array(
    'default'    => 'default',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// hover effects main menu links control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_main_menu_links_effect',
        array(
            'label'     => __('Main menu links effect', 'hovercraft'),
			'description' => __( 'CSS hover effect for main menu links in the header', 'hovercraft' ),
            'section'   => 'hovercraft_effects',
            'settings'  => 'hovercraft_main_menu_links_effect',
            'type'      => 'select',
			'choices' => array(
        		'default' => 'Default',
        		'cerulean' => 'Cerulean',
        		'cosmo' => 'Cosmo',
        		'cyborg' => 'cyborg',
    			)
        )
) );
	
// link styling section
$wp_customize->add_section( 'hovercraft_link_styling', array(
    'title'      => 'Link Styling',
    'priority'   => 103,
) );
	
// default link decoration setting
$wp_customize->add_setting( 'hovercraft_default_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// default link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_default_link_decoration',
        array(
            'label'     => __('Default link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_default_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );
	
// topbar link decoration setting
$wp_customize->add_setting( 'hovercraft_topbar_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// topbar link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_topbar_link_decoration',
        array(
            'label'     => __('Topbar link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_topbar_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// posthero link decoration setting
$wp_customize->add_setting( 'hovercraft_posthero_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// posthero link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_posthero_link_decoration',
        array(
            'label'     => __('Posthero link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_posthero_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// home premain (top) link decoration setting
$wp_customize->add_setting( 'hovercraft_premain_top_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home premain (top) link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_premain_top_link_decoration',
        array(
            'label'     => __('Home Premain (Top) Link Decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_premain_top_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// home premain (bottom) link decoration setting
$wp_customize->add_setting( 'hovercraft_premain_bottom_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home premain (bottom) link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_premain_bottom_link_decoration',
        array(
            'label'     => __('Home Premain (Bottom) Link Decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_premain_bottom_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// home postmain (top) link decoration setting
$wp_customize->add_setting( 'hovercraft_postmain_top_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home postmain (top) link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_postmain_top_link_decoration',
        array(
            'label'     => __('Home Postmain (Top) Link Decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_postmain_top_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// home postmain (bottom) link decoration setting
$wp_customize->add_setting( 'hovercraft_postmain_bottom_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// home postmain (bottom) link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_postmain_bottom_link_decoration',
        array(
            'label'     => __('Home Postmain (Bottom) Link Decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_postmain_bottom_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );
	
// prefooter (top) link decoration setting
$wp_customize->add_setting( 'hovercraft_prefooter_top_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// prefooter (top) link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_prefooter_top_link_decoration',
        array(
            'label'     => __('Prefooter (top) link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_prefooter_top_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );
	
// prefooter (bottom) link decoration setting
$wp_customize->add_setting( 'hovercraft_prefooter_bottom_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// prefooter (bottom) link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_prefooter_bottom_link_decoration',
        array(
            'label'     => __('Prefooter (bottom) link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_prefooter_bottom_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );
	
// footer link decoration setting
$wp_customize->add_setting( 'hovercraft_footer_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// footer link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_footer_link_decoration',
        array(
            'label'     => __('Footer link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_footer_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// footer callout link decoration setting
$wp_customize->add_setting( 'hovercraft_footer_callout_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// footer callout link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_footer_callout_link_decoration',
        array(
            'label'     => __('Footer Callout Link Decoration', 'hovercraft'),
			'description' => __( 'Specify link decoration style for the Footer Callout widget area?', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_footer_callout_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// copyright link decoration setting
$wp_customize->add_setting( 'hovercraft_copyright_link_decoration', array(
    'default'    => 'underline',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// copyright link decoration control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_copyright_link_decoration',
        array(
            'label'     => __('Copyright link decoration', 'hovercraft'),
			'description' => __( 'What type of link decoration', 'hovercraft' ),
            'section'   => 'hovercraft_link_styling',
            'settings'  => 'hovercraft_copyright_link_decoration',
            'type'      => 'select',
			'choices' => array(
				'underline' => 'Underline',
				'none' => 'None (no decoration)',
    			)
        )
) );

// icons section
$wp_customize->add_section( 'hovercraft_icons', array(
    'title'      => 'Icons',
    'priority'   => 102,
) );

// layout icons setting
$wp_customize->add_setting( 'hovercraft_layout_icons', array(
    'default'    => 'material_icons_classic',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// layout icons control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_layout_icons',
        array(
            'label'     => __( 'Default Icon Elements', 'hovercraft' ),
			'description' => __( 'Which icon elements should be used for critical site layout and usability features?', 'hovercraft' ),
            'section'   => 'hovercraft_icons',
            'settings'  => 'hovercraft_layout_icons',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
        		'material_icons_classic' => 'Material Icons (Classic)',
				'font_awesome_version_6' => 'Font Awesome (Version 6)'
    			)
        )
) );

// material icons setting
$wp_customize->add_setting( 'hovercraft_material_icons', array(
    'default'    => 'classic_only',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// material icons control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_material_icons',
        array(
            'label'     => __( 'Material Icons Library', 'hovercraft' ),
			'description' => __( 'Which variations of the Material Icons should be loaded? Note: Disabling this might break your search, navigation, and shopping layout.', 'hovercraft' ),
            'section'   => 'hovercraft_icons',
            'settings'  => 'hovercraft_material_icons',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
        		'classic_only' => 'Classic Only',
				'classic_and_outlined' => 'Classic &amp; Outlined',
        		'classic_and_outlined_and_two_toned' => 'Classic &amp; Outlined &amp; Two-Toned'
    			)
        )
) );

// font awesome setting
$wp_customize->add_setting( 'hovercraft_font_awesome', array(
    'default'    => 'none',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// font awesome control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_font_awesome',
        array(
            'label'     => __( 'Font Awesome Library', 'hovercraft' ),
			'description' => __( 'Which variations of Font Awesome icons should be loaded? Note: Disabling this might break your search, navigation, and shopping layout.', 'hovercraft' ),
            'section'   => 'hovercraft_icons',
            'settings'  => 'hovercraft_font_awesome',
            'type'      => 'select',
			'choices' => array(
        		'none' => 'None (Disabled)',
        		'version_6' => 'Version 6',
				'version_5' => 'Version 5',
        		'version_4' => 'Version 4'
    			)
        )
) );

// hero styling section
$wp_customize->add_section( 'hovercraft_hero_styling', array(
    'title'      => 'Hero Options',
    'priority'   => 87,
) );
	
// full hero background position setting
$wp_customize->add_setting( 'hovercraft_full_hero_background_position', array(
    'default'    => 'center_center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// full hero background position control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_full_hero_background_position',
        array(
            'label'     => __('Full Hero Background Position', 'hovercraft'),
			'description' => __( 'Background position of the hero image?', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_full_hero_background_position',
            'type'      => 'select',
			'choices' => array(
				'left_top' => 'Left Top',
				'left_center' => 'Left Center',
				'left_bottom' => 'Left Bottom',
				'right_top' => 'Right Top',
				'right_center' => 'Right Center',
				'right_bottom' => 'Right Bottom',
				'center_top' => 'Center Top',
				'center_center' => 'Center Center',
				'center_bottom' => 'Center Bottom'
    			)
        )
) );
	
// half hero background position setting
$wp_customize->add_setting( 'hovercraft_half_hero_background_position', array(
    'default'    => 'center_center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// half hero background position control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_half_hero_background_position',
        array(
            'label'     => __('Half Hero Background Position', 'hovercraft'),
			'description' => __( 'Background position of the hero image?', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_half_hero_background_position',
            'type'      => 'select',
			'choices' => array(
				'left_top' => 'Left Top',
				'left_center' => 'Left Center',
				'left_bottom' => 'Left Bottom',
				'right_top' => 'Right Top',
				'right_center' => 'Right Center',
				'right_bottom' => 'Right Bottom',
				'center_top' => 'Center Top',
				'center_center' => 'Center Center',
				'center_bottom' => 'Center Bottom'
    			)
        )
) );
	
// mini hero background position setting
$wp_customize->add_setting( 'hovercraft_mini_hero_background_position', array(
    'default'    => 'center_center',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// mini hero background position control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_mini_hero_background_position',
        array(
            'label'     => __('Mini Hero Background Position', 'hovercraft'),
			'description' => __( 'Background position of the hero image?', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_mini_hero_background_position',
            'type'      => 'select',
			'choices' => array(
				'left_top' => 'Left Top',
				'left_center' => 'Left Center',
				'left_bottom' => 'Left Bottom',
				'right_top' => 'Right Top',
				'right_center' => 'Right Center',
				'right_bottom' => 'Right Bottom',
				'center_top' => 'Center Top',
				'center_center' => 'Center Center',
				'center_bottom' => 'Center Bottom'
    			)
        )
) );

// hero content width (desktop) setting
$wp_customize->add_setting( 'hovercraft_hero_content_width_desktop', array(
    'default'    => '900px',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// hero content width (desktop) control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_content_width_desktop',
        array(
            'label'     => __('Full Hero Content Width', 'hovercraft'),
			'description' => __( 'Width of hero content (desktop)', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_content_width_desktop',
            'type'      => 'select',
			'choices' => array(
				'600px' => '600px',
				'900px' => '900px',
				'1200px' => 'Full width (1200px)',
    			)
        )
) );

// mini hero vertical padding setting (desktop)
$wp_customize->add_setting( 'hovercraft_mini_hero_vertical_padding', array(
    'default'    => '80',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// mini hero vertical padding control (desktop)
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_mini_hero_vertical_padding',
        array(
            'label'     => __( 'Mini Hero Padding (Desktop)', 'hovercraft' ),
			'description' => __( 'Specificy mini hero vertical padding in pixels?', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_mini_hero_vertical_padding',
            'type' => 'text'
        )
) );

// hero gradient angle setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_angle', array(
    'default'    => '60deg',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// hero gradient angle control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_angle',
        array(
            'label'     => __('Gradient angle', 'hovercraft'),
			'description' => __( 'Choose the angle of the hero gradient', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_angle',
            'type'      => 'select',
			'choices' => array(
				'0deg' => '0 Degrees',
        		'45deg' => '45 Degrees',
        		'60deg' => '60 Degrees',
        		'90deg' => '90 Degrees',
        		'120deg' => '120 Degrees',
				'135deg' => '135 Degrees',
				'180deg' => '180 Degrees',
				'225deg' => '225 Degrees',
				'270deg' => '270 Degrees',
				'315deg' => '315 Degrees',
    			)
        )
) );

// hero gradient status setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_status', array(
    'default'    => 'all_hero_instances',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// hero gradient status control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_status',
        array(
            'label'     => __('Hero Gradient Status', 'hovercraft'),
			'description' => __( 'Which pages should the hero CSS gradient be applied?', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_status',
            'type'      => 'select',
			'choices' => array(
				'all_hero_instances' => 'All Hero Instances',
				'homepage_only' => 'Homepage Hero Only',
				'none' => 'None (Disabled)'
    			)
        )
) );

// hero gradient tones setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_tones', array(
    'default'    => 'two_tones',
	'sanitize_callback' => 'hovercraft_sanitize_select',
	)
);

// hero gradient tones control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_tones',
        array(
            'label'     => __('Hero Gradient Tones', 'hovercraft'),
			'description' => __( 'How many color tones should be used to generate the CSS gradient?', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_tones',
            'type'      => 'select',
			'choices' => array(
				'two_tones' => '2 Tones',
				'three_tones' => '3 Tones'
    			)
        )
) );

// full hero header background transparency setting
$wp_customize->add_setting( 'hovercraft_full_hero_header_background_transparency', array(
    'default'    => '0.20',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// full hero header background transparency control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_full_hero_header_background_transparency',
        array(
            'label'     => __('Full Hero Header Background Transparency', 'hovercraft'),
			'description' => __( 'Transparency of the Full Hero header background color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_full_hero_header_background_transparency',
            'type'      => 'select',
			'choices' => array(
        		'0.0' => '0.00',
        		'0.10' => '0.10',
				'0.15' => '0.15',
				'0.20' => '0.20',
        		'0.25' => '0.25',
				'0.30' => '0.30',
				'0.35' => '0.35',
				'0.40' => '0.40',
				'0.45' => '0.45',
        		'0.50' => '0.50',
				'0.55' => '0.55',
				'0.60' => '0.60',
				'0.65' => '0.65',
				'0.70' => '0.70',
        		'0.75' => '0.75',
				'0.80' => '0.80',
				'0.85' => '0.85',
				'0.90' => '0.90',
				'0.95' => '0.95',
        		'1.0' => '1.00',
    			)
        )
) );

// hero gradient start color transparency setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_start_color_transparency', array(
    'default'    => '0.50',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// hero gradient start color transparency control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_start_color_transparency',
        array(
            'label'     => __('Start Color Transparency', 'hovercraft'),
			'description' => __( 'Transparency of the start color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_start_color_transparency',
            'type'      => 'select',
			'choices' => array(
        		'0.0' => '0.00',
        		'0.10' => '0.10',
				'0.15' => '0.15',
				'0.20' => '0.20',
        		'0.25' => '0.25',
				'0.30' => '0.30',
				'0.35' => '0.35',
				'0.40' => '0.40',
				'0.45' => '0.45',
        		'0.50' => '0.50',
				'0.55' => '0.55',
				'0.60' => '0.60',
				'0.65' => '0.65',
				'0.70' => '0.70',
        		'0.75' => '0.75',
				'0.80' => '0.80',
				'0.85' => '0.85',
				'0.90' => '0.90',
				'0.95' => '0.95',
        		'1.0' => '1.00',
    			)
        )
) );

// hero gradient mid color transparency setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_mid_color_transparency', array(
    'default'    => '0.50',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// hero gradient mid color transparency control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_mid_color_transparency',
        array(
            'label'     => __('Mid Color Transparency', 'hovercraft'),
			'description' => __( 'Transparency of the mid color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_mid_color_transparency',
            'type'      => 'select',
			'choices' => array(
        		'0.0' => '0.00',
        		'0.10' => '0.10',
				'0.15' => '0.15',
				'0.20' => '0.20',
        		'0.25' => '0.25',
				'0.30' => '0.30',
				'0.35' => '0.35',
				'0.40' => '0.40',
				'0.45' => '0.45',
        		'0.50' => '0.50',
				'0.55' => '0.55',
				'0.60' => '0.60',
				'0.65' => '0.65',
				'0.70' => '0.70',
        		'0.75' => '0.75',
				'0.80' => '0.80',
				'0.85' => '0.85',
				'0.90' => '0.90',
				'0.95' => '0.95',
        		'1.0' => '1.00',
    			)
        )
) );
	
// hero gradient stop color transparency setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_stop_color_transparency', array(
    'default'    => '0.50',
	'sanitize_callback' => 'hovercraft_sanitize_float',
	)
);

// hero gradient stop color transparency control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_stop_color_transparency',
        array(
            'label'     => __('Stop Color Transparency', 'hovercraft'),
			'description' => __( 'Transparency of the stop color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_stop_color_transparency',
            'type'      => 'select',
			'choices' => array(
				'0.0' => '0.00',
        		'0.10' => '0.10',
				'0.15' => '0.15',
				'0.20' => '0.20',
        		'0.25' => '0.25',
				'0.30' => '0.30',
				'0.35' => '0.35',
				'0.40' => '0.40',
				'0.45' => '0.45',
        		'0.50' => '0.50',
				'0.55' => '0.55',
				'0.60' => '0.60',
				'0.65' => '0.65',
				'0.70' => '0.70',
        		'0.75' => '0.75',
				'0.80' => '0.80',
				'0.85' => '0.85',
				'0.90' => '0.90',
				'0.95' => '0.95',
        		'1.0' => '1.00',
    			)
        )
) );
	
// hero gradient start color length setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_start_color_length', array(
    'default'    => '30',
	'sanitize_callback' => 'absint',
	)
);

// hero gradient start color length control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_start_color_length',
        array(
            'label'     => __('Start color length', 'hovercraft'),
			'description' => __( 'Length of the start color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_start_color_length',
            'type'      => 'select',
			'choices' => array(
				'0' => '0%',
				'5' => '5%',
				'10' => '10%',
				'15' => '15%',
				'20' => '20%',
        		'25' => '25%',
				'30' => '30%',
				'35' => '35%',
				'40' => '40%',
				'45' => '45%',
        		'50' => '50%',
				'55' => '55%',
				'60' => '60%',
				'65' => '65%',
				'70' => '70%',
        		'75' => '75%',
				'80' => '80%',
				'85' => '85%',
				'90' => '90%',
				'95' => '95%',
        		'100' => '100%',
    			)
        )
) );

// hero gradient mid color length setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_mid_color_length', array(
    'default'    => '30',
	'sanitize_callback' => 'absint',
	)
);

// hero gradient mid color length control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_mid_color_length',
        array(
            'label'     => __('Mid color length', 'hovercraft'),
			'description' => __( 'Length of the mid color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_mid_color_length',
            'type'      => 'select',
			'choices' => array(
				'0' => '0%',
				'5' => '5%',
				'10' => '10%',
				'15' => '15%',
				'20' => '20%',
        		'25' => '25%',
				'30' => '30%',
				'35' => '35%',
				'40' => '40%',
				'45' => '45%',
        		'50' => '50%',
				'55' => '55%',
				'60' => '60%',
				'65' => '65%',
				'70' => '70%',
        		'75' => '75%',
				'80' => '80%',
				'85' => '85%',
				'90' => '90%',
				'95' => '95%',
        		'100' => '100%',
    			)
        )
) );
	
// hero gradient stop color length setting
$wp_customize->add_setting( 'hovercraft_hero_gradient_stop_color_length', array(
    'default'    => '100',
	'sanitize_callback' => 'absint',
	)
);

// hero gradient stop color length control
$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'hovercraft_hero_gradient_stop_color_length',
        array(
            'label'     => __('Stop color length', 'hovercraft'),
			'description' => __( 'Length of the stop color', 'hovercraft' ),
            'section'   => 'hovercraft_hero_styling',
            'settings'  => 'hovercraft_hero_gradient_stop_color_length',
            'type'      => 'select',
			'choices' => array(
				'0' => '0%',
				'5' => '5%',
				'10' => '10%',
				'15' => '15%',
				'20' => '20%',
        		'25' => '25%',
				'30' => '30%',
				'35' => '35%',
				'40' => '40%',
				'45' => '45%',
        		'50' => '50%',
				'55' => '55%',
				'60' => '60%',
				'65' => '65%',
				'70' => '70%',
        		'75' => '75%',
				'80' => '80%',
				'85' => '85%',
				'90' => '90%',
				'95' => '95%',
        		'100' => '100%',
    			)
        )
) );

// license key section
$wp_customize->add_section( 'hovercraft_license_key', array(
    'title' => 'License Key',
    'priority' => 999,
) );

// license key setting
$wp_customize->add_setting( 'hovercraft_license_key', array(
    'default' => '',
    'sanitize_callback' => 'hovercraft_sanitize_text',
) );

// license key control
$wp_customize->add_control( 'hovercraft_license_key', array(
    'label' => 'Enter your license key',
    'section' => 'hovercraft_license_key',
    'type' => 'text',
    'input_attrs' => array(
        'autocomplete' => 'off',
        'spellcheck' => 'false',
    ),
) );

// end function hovercraft_customizer
}

add_action('customize_register', 'hovercraft_customizer');

// sanitize select input
function hovercraft_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return array_key_exists( $input, $choices ) ? $input : $setting->default;
}

// sanitize radio input
function hovercraft_sanitize_radio( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return array_key_exists( $input, $choices ) ? $input : $setting->default;
}

// sanitize checkbox input
function hovercraft_sanitize_checkbox( $checked ) {
    return isset( $checked ) && true === $checked;
}

// sanitize float input
function hovercraft_sanitize_float( $input ) {
    return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}

// sanitize text input
function hovercraft_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

// Ref: ChatGPT
// Ref: https://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
// Ref: https://divpusher.com/blog/wordpress-customizer-sanitization-examples/
// Ref: https://wordpress.stackexchange.com/questions/225825/customizer-sanitize-callback-for-input-type-number
// Ref: https://core.trac.wordpress.org/ticket/24528
// Ref: https://wp-a2z.org/oik_api/twentytwenty_customizesanitize_checkbox/
// Ref: https://wordpress.stackexchange.com/questions/261969/how-to-rename-and-rearrange-multiple-sections-in-the-customizer
// Ref: https://wphelp.blog/how-to-remove-sections-from-wordpress-customizer/
// Ref: https://stackoverflow.com/questions/7073672/how-to-load-return-array-from-a-php-file
// Ref: https://stackoverflow.com/questions/53613871/how-to-check-whether-checkox-is-checked-in-wordpress-customizer
