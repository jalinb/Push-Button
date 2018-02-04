<?php

// Theme JS & CSS
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // Custom JS file
    wp_enqueue_script( 'pushbutton-script', get_stylesheet_directory_uri() . '/assets/js/pushbutton.js', array( 'jquery' ) );
    // FontAwesome
    wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css' );
    // Google Web Fonts
    wp_enqueue_style( 'opensans-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' );
    wp_enqueue_style( 'fontdiner-swanky-font', 'https://fonts.googleapis.com/css?family=Fontdiner+Swanky' );
    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
    // Bootstrap JS
    wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



// Add Responsive Style Sheet Last (999 meaing load 999th in position)
function responsive_styles() {
    wp_enqueue_style( 'responsive-styles', get_stylesheet_directory_uri() . '/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'responsive_styles', 999 );


// Widget Areas
function new_widgets() {

    register_sidebar( array(
        'name' => 'Form Widget',
        'id' => 'form_widget',
        'before_widget' => '<div id="form-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="hide">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'new_widgets' );


// // TwentySeventeen Excerpt
// function pushbutton_excerpt_more( $link ) {
//     if ( is_admin() ) {
//         return $link;
//     }

//     $link = sprintf( '<a href="%1$s" class="learn-more">%2$s</a>',
//         esc_url( get_permalink( get_the_ID() ) ),
//         /* translators: %s: Name of current post */
//         sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
//     );
//     return '&hellip; ' . $link;
// }
// add_filter( 'excerpt_more', 'pushbutton_excerpt_more', 999 );


// // Change Excerpt Length
// function custom_excerpt_length( $length ) {
//     return 170;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Remove Auto Paragraphs
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Remove WP Version Number
remove_action('wp_head', 'wp_generator');




// Custom Excerpt Function
function wpse_allowedtags() {
// Add custom tags to this string
    return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<code>,<pre>,<blockquote>'; 
}

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    global $post;
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 100;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_word_count && preg_match('/[\?\.\!]\s*$/uS', $token)) { 
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                
                $excerpt_end = '<a class="learn-more" ' . 'href="'. esc_url( get_permalink() ) . '">' . sprintf(__( 'Read More' ), get_the_title()) . '</a>'; 
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                
                $wpse_excerpt .= $excerpt_end; /*Add read more in new paragraph */

            return $wpse_excerpt;   

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 


?>