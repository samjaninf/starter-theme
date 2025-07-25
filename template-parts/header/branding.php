<div id="branding">

<?php
// get logo urls and settings
$default_logo = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
$alternative_logo = get_theme_mod( 'hovercraft_logo_alternative' );
$logo_setting = get_theme_mod( 'hovercraft_logo_alternative_location', 'none' );

// fallback to 'basic' if no custom template is set
$template_slug = get_page_template_slug();
$template_slug = is_string( $template_slug ) && $template_slug !== '' ? $template_slug : 'basic';

// default to default logo
$logo_url = $default_logo;

if ( $alternative_logo && $logo_setting !== 'none' ) {
    $logo_locations = array(
        'full_hero_only' => array( 'full-hero' ),
        'half_hero_only' => array( 'half-hero' ),
        'mini_hero_only' => array( 'mini-hero' ),
        'basic_header_only' => array( 'basic' ),
        'full_and_half_hero' => array( 'full-hero', 'half-hero' ),
        'full_and_mini_hero' => array( 'full-hero', 'mini-hero' ),
        'full_hero_and_basic_header' => array( 'full-hero', 'basic' ),
        'half_and_mini_hero' => array( 'half-hero', 'mini-hero' ),
        'half_hero_and_basic_header' => array( 'half-hero', 'basic' ),
        'mini_hero_and_basic_header' => array( 'mini-hero', 'basic' ),
        'full_and_half_and_mini_hero' => array( 'full-hero', 'half-hero', 'mini-hero' ),
        'full_and_half_hero_and_basic_header' => array( 'full-hero', 'half-hero', 'basic' ),
        'full_and_mini_hero_and_basic_header' => array( 'full-hero', 'mini-hero', 'basic' ),
        'half_and_mini_hero_and_basic_header' => array( 'half-hero', 'mini-hero', 'basic' ),
        'full_and_half_and_mini_hero_and_basic_header' => array( 'full-hero', 'half-hero', 'mini-hero', 'basic' ),
    );

    if ( isset( $logo_locations[ $logo_setting ] ) ) {
        foreach ( $logo_locations[ $logo_setting ] as $match ) {
            if ( strpos( $template_slug, $match ) !== false ) {
                $logo_url = $alternative_logo;
                break;
            }
        }
    }
}

// check if a logo should be rendered
$has_logo = $logo_url ? true : false;
?>

<?php if ( $has_logo ) : ?>
<div class="branding-media">
    <a href="<?php echo esc_url( home_url() ); ?>" class="custom-logo-link" rel="home">
        <img class="site-logo custom-logo" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo" />
    </a>
</div><!-- branding-media -->
<?php endif; ?>

<?php if ( display_header_text() ) : ?>
<div class="branding-text">
    <a href="<?php echo esc_url( home_url() ); ?>" class="site-title-link" rel="home">
        <div class="site-title"><?php echo get_bloginfo( 'name' ); ?></div>
    </a>
    <div class="tagline"><?php echo get_bloginfo( 'description' ); ?></div>
</div><!-- branding-text -->
<?php endif; ?>

</div><!-- branding -->
