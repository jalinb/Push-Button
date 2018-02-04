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
	</div>
	
	<div class="row">
		<div class="container">
		  	<div class="col-xs-12 col-md-6">
		  		<h2>Pages</h2>
		  			<ul>
		  				<?php wp_list_pages('exclude=4181,4261,2714,2597,3550&depth=2&title_li='); ?>
		  			</ul>
		  	</div>
		  	<div class="col-xs-12 col-md-6">
		  		<h2>Posts</h2>
		  		 <?php // get all the categories from the database
					$cats = get_categories();
					// loop through the categries
					foreach ($cats as $cat) {
					// setup the cateogory ID
					$cat_id = $cat->term_id;
					// Make a header for the cateogry
					echo "<ul><li><a href='".esc_url(get_category_link($cat_id))."'>".$cat->name."</a>";
					// create a custom wordpress query
					query_posts("cat=$cat_id&post_per_page=100");

					if (have_posts()) : ?>
					<ul>
					<?php while (have_posts()) : the_post(); ?>

					<?php // create our link now that the post is setup ?>

					<li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>

					<?php endwhile; ?>
					</ul>
					<?php endif;
					// done our wordpress loop. Will start again for each category ?>

					</li></ul>
					<?php } // done the foreach statement ?>
					<?php wp_reset_query(); ?>
		  	</div>
		</div>
	</div>
</article><!-- #post-## -->
