<?php
/**
 * @package Portfolio Press
 */

/**
 * Displays notice if post_per_page is not divisible by 3
 */
function puredemo_posts_per_page_notice() {

	$posts_per_page = get_option( 'posts_per_page', 10 );

	if ( ( $posts_per_page % 3 ) == 0 ) {
		return;
	}

	$options = get_option( 'puredemo', false );

	if ( isset( $options['post_per_page_ignore'] ) && $options['post_per_page_ignore'] == 1 ) {
		return;
	}

	if ( current_user_can( 'manage_options' ) ) {
		echo '<div class="updated"><p>';
			printf( __(
				'Portfolio Press recommends setting <a href="%3$s">posts per page</a> to 9 or 12. <a href="%1$s">Update</a> | <a href="%2$s">Hide Notice</a>', 'portfolio-press' ),
				'?portfolio_update_posts_per_page=1',
				'?portfolio_post_per_page_ignore=1',
				admin_url( 'options-reading.php', false )
			);
		echo '</p></div>';
	}
}
add_action( 'admin_notices', 'puredemo_posts_per_page_notice', 120 );

/**
 * Display notice to regenerate thumbnails
 */
function puredemo_thumbnail_notice() {

	$options = get_option( 'puredemo', false );

	if ( isset( $options['regnerate_thumbnails'] ) && $options['regnerate_thumbnails'] == 1 ) {
		return;
	}

	if ( current_user_can( 'manage_options' ) ) {
		echo '<div class="updated"><p>';
			printf( __(
				'Portfolio Press recommends regenerating thumbnails. <a href="%1$s" target="_blank">Read More</a> | <a href="%2$s">Hide Notice</a>', 'portfolio-press' ),
				esc_url( 'https://wordpress.org/plugins/regenerate-thumbnails/' ),
				'?portfolio_thumbnails_ignore=1'
				);
		echo '</p></div>';
	}
}
add_action( 'admin_notices', 'puredemo_thumbnail_notice', 200 );

/**
 * Hides notices if user chooses to dismiss it
 */
function puredemo_notice_ignores() {

	$options = get_option( 'puredemo' );

	if ( isset( $_GET['portfolio_post_per_page_ignore'] ) && '1' == $_GET['portfolio_post_per_page_ignore'] ) {
		$options['post_per_page_ignore'] = 1;
		update_option( 'puredemo', $options );
	}

	if ( isset( $_GET['portfolio_update_posts_per_page'] ) && '1' == $_GET['portfolio_update_posts_per_page'] ) {
		update_option( 'posts_per_page', 9 );
	}

	if ( isset( $_GET['portfolio_thumbnails_ignore'] ) && '1' == $_GET['portfolio_thumbnails_ignore'] ) {
		$options['regnerate_thumbnails'] = 1;
		update_option( 'puredemo', $options );
	}

}
add_action( 'admin_init', 'puredemo_notice_ignores' );

/**
 * Filter Page Templates if Portfolio Post Type Plugin
 * is not active.
 *
 * @param array $templates Array of templates.
 * @return array $templates Modified Array of templates.
 */
function puredemo_page_templates_mod( $templates ) {
	if ( !class_exists( 'Portfolio_Post_Type' ) ) {
		unset( $templates['templates/portfolio.php'] );
		unset( $templates['templates/full-width-portfolio.php'] );
	}
	return $templates;
}
add_filter( 'theme_page_templates', 'puredemo_page_templates_mod' );

/**
 * WP PageNavi Support
 *
 * Removes wp-pagenavi styling since it is handled by theme.
 */
function puredemo_deregister_styles() {
    wp_deregister_style( 'wp-pagenavi' );
}
add_action( 'wp_print_styles', 'puredemo_deregister_styles', 100 );