<?php
/**
 * The template for displaying search forms in Generate
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="hidden" name="post_type" value="post"/>
	<label>
		<input type="search" class="search-field" placeholder="search..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php echo esc_attr( apply_filters( 'generate_search_label', _x( 'Search for:', 'label', 'generatepress' ) ) ); // WPCS: XSS ok, sanitization ok. ?>">
	</label>
    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
