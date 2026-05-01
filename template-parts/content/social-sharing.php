<?php

// set sharing variables
$url_raw = get_permalink();
$url_encoded = rawurlencode( $url_raw );
$image_raw = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
$image_encoded = rawurlencode( $image_raw );
$title_raw = get_the_title();
$title_encoded = rawurlencode( $title_raw );

$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $url_encoded;
$x_url = 'https://twitter.com/intent/tweet?url=' . $url_encoded;
$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url_encoded;
$pinterest_url = 'https://pinterest.com/pin/create/link/?url=' . $url_encoded . '&media=' . $image_encoded . '&description=' . $title_encoded;
$email_url = 'mailto:?subject=Check out this article&body=' . $url_encoded;
$whatsapp_url = 'https://wa.me/?text=' . $url_encoded;
$telegram_url = 'https://t.me/share/url?url=' . $url_encoded;
$line_url = 'https://line.me/R/share?text=' . $url_encoded;
$viber_url = 'viber://forward?text=' . $url_encoded;

// hide sharing on product pages
// make this conditional later based on Customizer settings
if ( post_type_exists( 'product' ) && is_product() ) {
	return;
}

?>

<div class="social-sharing">
	<span class="social-sharing-label"><?php esc_html_e( 'Share: ', 'hovercraft' ); ?></span>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $facebook_url ); ?>" title="Share via Facebook"><i class="fa-brands fa-facebook"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $x_url ); ?>" title="Share via X"><i class="fa-brands fa-x-twitter"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $linkedin_url ); ?>" title="Share via LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $pinterest_url ); ?>" title="Share via Pinterest"><i class="fa-brands fa-pinterest"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $email_url ); ?>" title="Share via Email"><i class="fa-solid fa-envelope"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $whatsapp_url ); ?>" title="Share via WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $telegram_url ); ?>" title="Share via Telegram"><i class="fa-brands fa-telegram"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $line_url ); ?>" title="Share via LINE"><i class="fa-brands fa-line"></i></a>
	<a rel="noopener noreferrer nofollow" target="_blank" href="<?php echo esc_url( $viber_url ); ?>" title="Share via Viber"><i class="fa-brands fa-viber"></i></a>
	<div class="clear"></div>
</div><!-- social-sharing -->

<!-- Ref: ChatGPT -->
<!-- Ref: https://stackoverflow.com/questions/6768793/get-the-full-url-in-php -->
<!-- Ref: https://stackoverflow.com/questions/33426752/linkedin-share-post-url -->
