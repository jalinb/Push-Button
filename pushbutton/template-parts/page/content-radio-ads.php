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
						<img alt="Pollie Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/pollie-awards.jpg">
						<img alt="Creativity Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/creativity-awards.jpg">
						<img alt="Summit Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/summit-award.jpg">
						<img alt="Diamond Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/diamond-award.jpg">
						<img alt="Addy Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/addy-award.jpg">
						<img alt="Spectrum Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/spectrum-award.jpg">
						<img alt="W3 Award" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/w3-award.jpg">
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
			</div><!-- .col-xs-12 -->
		</div>
	</div><!-- .row -->

	<div class="clear"></div>

	<div id="samples" class="default-section section-padding work-bg">
		<div class="container">
			<div class="col-xs-12">
				<div class="row">
					<h2 class="dark-txt title-lg">Radio Ad Samples</h2>
					<div class="players">
						<?php // Query Jingles
						query_posts(array('showposts' => 6, 'post_parent' => 3118, 'post_type' => 'page','orderby' => 'date', 'order' => 'ASC'));
							while (have_posts()): the_post();

							$audio_src = get_field( "mp3_file" ); ?>

							<div class="col-xs-12 col-md-6">
						        <!-- Player 1 -->
						        <div class="player-wrap">
						          <audio class="music" preload="none">
						            <source src="<?php echo $audio_src; ?>">
						            Your browser does not support the audio element.
						          </audio>

							          <div class="audioplayer">
							            <div class="audio-description">
							              <div class="play-img-wrap">
							                <i class="fa fa-play-circle pButton" aria-hidden="true"></i>
							                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="player-img" />
							              </div>
							              <div class="player-description">
							                <h3><?php the_title(); ?></h3>
							                <p><?php the_content(); ?></p>
							              </div>
							            </div>
							            <div class="player-wrap">
							              <div class="timeline">
							                <div class="playhead"></div>
							              </div>
							              <div class="clear"></div>
							            </div>
						        	</div>
						        </div>
						     </div>

							<?php endwhile;
						wp_reset_query(); ?>
					</div><!-- .players -->
				</div>
			</div><!-- .col-xs-12 -->
		</div>

		<div class="clear"></div>

	</div><!-- .default-section -->
	
</article><!-- #post-## -->
