<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php 
if ( is_front_page() ) :

	get_template_part( 'template-parts/header/home', 'slider' );

else: ?>

	<?php get_template_part( 'template-parts/header/header', 'interior' ); ?>

<?php endif; ?>
