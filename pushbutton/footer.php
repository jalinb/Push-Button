<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="fluid-container footer-blue">

				<?php // Footer WP Page
				query_posts('page_id=2597&post_type=page');
					while (have_posts()): the_post(); ?>
							<?php the_content(); ?>
					<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div><!-- .container -->
		</footer><!-- #colophon -->
		<div class="copyright">
			<div class="container">
				<p>&copy;<?php echo date("Y"); ?> Push Button Productions. All Rights Reserved.</p>
			</div>
		</div>
	</div><!-- .site-content-contain -->
</div><!-- #page -->

<?php if ( is_page( 2832 ) || is_page( 2830 ) || is_page( 3438 ) ):
	get_template_part( 'template-parts/page/google', 'maps' );
endif;

wp_footer(); ?>

<!-- YouTube API -->
<script>
	// 2. This code loads the IFrame Player API code asynchronously.
	var tag = document.createElement('script');

	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	// 3. This function creates an <iframe> (and YouTube player)
	//    after the API code downloads.
	var player;
	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			height: '273',
			width: '486',
			playerVars : {
			    //autoplay : 1,
			    autoplay : 0,
			    showinfo: 0,
			    modestbranding: 0,
			    //cc_load_policy: 1,
			    cc_load_policy: 0,
			    rel: 0
			},
			videoId: 'BXaBnytB70o',
			events: {
		      onReady: function(e) {
		        //e.target.mute();
		      }
		  	}
		});
	}
</script>

<div class="hide-scripts">
	<!-- Google Code for Remarketing Tag -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1045185181;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1045185181/?guid=ON&amp;script=0"/>
	</div>
	</noscript>
</div>

</body>
</html>
