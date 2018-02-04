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

			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'  => '</div>',
				) );
			?>
			
		</div><!-- .col-xs-12 -->
	</div>

</article><!-- #post-## -->
