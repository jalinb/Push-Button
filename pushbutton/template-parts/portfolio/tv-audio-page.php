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

		<div class="col-xs-12">
			<?php twentyseventeen_edit_link( get_the_ID() ); ?>
			
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'  => '</div>',
				) );
			?>

			<div class="col-xs-12 portfolio-section section-soundboard">
				<div class="txt-center">
					<h2>Browse By Category</h2>
					<ul class="center-elements">
						<li>
	                        <a href="http://pushbuttonproductions.com/jingles/">
	                            <img class="soundboard-img" alt="Jingles" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/soundbox-button-01.png" />
	                            <div class="soundboard-txt">Jingles</div>
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://pushbuttonproductions.com/radio-ads/">
	                            <img class="soundboard-img" alt="Radio Ads" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/soundbox-button-02.png" />
	                            <div class="soundboard-txt">Radio<br />Ads</div>
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://pushbuttonproductions.com/our-work/creative-hold-music/">
	                            <img class="soundboard-img" alt="Creative On-Hold" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/soundbox-button-03.png" />
	                            <div class="soundboard-txt">Creative<br />On-Hold</div>
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://pushbuttonproductions.com/our-work/audio-logos/">
	                            <img class="soundboard-img" alt="Audio Logos" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/soundbox-button-04.png" />
	                            <div class="soundboard-txt">Audio<br />Logos</div>
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://pushbuttonproductions.com/our-work/tv-audio-narration/">
	                            <img class="soundboard-img" alt="TV Audio" src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/soundbox-button-05.png" />
	                            <div class="soundboard-txt">TV Audio</div>
	                        </a>
	                    </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
		
	<div class="clear"></div>

	<div id="samples" class="default-section section-padding work-bg">
		<div class="container">
			<h2 class="dark-txt title-lg">TV Audio Samples</h2>
			<div class="video-players">
				<?php // Query Jingles
				query_posts(array('showposts' => 6, 'post_parent' => 3130, 'post_type' => 'page','orderby' => 'date', 'order' => 'ASC'));
					while (have_posts()): the_post();

					$youtube_src = get_field( "youtube_link" ); ?>

					<div class="col-xs-12 col-md-6">
				        <div class="video-player-wrap">
					          <div class="audioplayer">
					            <div class="audio-description">
					              <div class="play-img-wrap">
					                <div class="video-modal" data-toggle="modal" data-target="#video-modal">
					                	<i class="fa fa-play-circle pButton" aria-hidden="true" data-video-src="https://www.youtube.com/embed/<?php echo $youtube_src; ?>?rel=0&amp;autoplay=1&amp;showinfo=0"></i>
					                </div>
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

			<div class="modal fade" id="video-modal" tabindex="-1">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			            </div>
			            <div class="modal-body">
			                <iframe width="825" height="464" src="" frameborder="0" allowfullscreen></iframe>
			            </div>
			        </div>
			    </div>
			</div>
		</div>

		<div class="clear"></div>

	</div><!-- .default-section -->

</article><!-- #post-## -->
