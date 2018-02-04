<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="container">
			<div class="col-xs-12 col-sm-8">
				<!-- Awards Section -->
				<div class="header-awards row">
					<div class="center-elements">
						<img alt="Pollie Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/pollie-awards.jpg" />
						<img alt="Creativity Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/creativity-awards.jpg" />
						<img alt="Summit Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/summit-award.jpg" />
						<img alt="Diamond Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/diamond-award.jpg" />
						<img alt="Addy Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/addy-award.jpg" />
						<img alt="Spectrum Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/spectrum-award.jpg" />
						<img alt="W3 Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/w3-award.jpg" />
					</div>
				</div>
			</div>
		</div>

		<div class="fluid-container">
			<div class="col-xs-12">
				<?php twentyseventeen_edit_link( get_the_ID() ); ?>
				
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div>
	</div>
		
			
		<div class="clear"></div>

</article><!-- #post-## -->
