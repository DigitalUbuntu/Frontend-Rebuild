<?php
/**
 * @package BuddyBoss Child
 * The parent theme functions are located at /buddyboss-theme/inc/theme/functions.php
 * Add your own functions at the bottom of this file.
 */


/****************************** THEME SETUP ******************************/

/**
 * Sets up theme for translation
 *
 * @since BuddyBoss Child 1.0.0
 */
function buddyboss_theme_child_languages()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'buddyboss-theme', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'buddyboss-theme' instances in all child theme files to 'buddyboss-theme-child'.
  // load_theme_textdomain( 'buddyboss-theme-child', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'buddyboss_theme_child_languages' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Boss Child Theme  1.0.0
 */
function buddyboss_theme_child_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // Styles
  wp_enqueue_style( 'buddyboss-child-css', get_stylesheet_directory_uri().'/assets/css/custom.css', '', '1.0.0' );

  wp_enqueue_style( 'student-dashboard-css', get_stylesheet_directory_uri().'/assets/css/student-dashboard.css');

  wp_enqueue_style( 'instructor-dashboard-css', get_stylesheet_directory_uri().'/assets/css/instructor-dashboard.css');

  wp_enqueue_style( 'favicon-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

  // Javascript
  wp_enqueue_script( 'buddyboss-child-js', get_stylesheet_directory_uri().'/assets/js/custom.js', '', '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'buddyboss_theme_child_scripts_styles', 9999 );


/****************************** CUSTOM FUNCTIONS ******************************/

// Add your own custom functions here
function wpb_hidetitle_class($classes) {
if ( is_single() || is_page() ) : 
$classes[] = 'hidetitle';
return $classes;
endif; 
return $classes;
}
add_filter('post_class', 'wpb_hidetitle_class');
// To remove the thank you text
add_filter('admin_footer_text', '__return_empty_string', 11);

// To remove the WP version info
add_filter('update_footer', '__return_empty_string', 11);

?>
<?php
/**
* Change dashboard label for Learndash LMS menu.
*/
add_action('admin_menu', 'irUpdateLearndashLabel');
function irUpdateLearndashLabel()
{
	global $menu;

	foreach ($menu as $key => $menu_item ) {
		// Compare menu item slug with learndash slug
		if ('learndash-lms' === $menu_item[2]) {
			// Update label to whatever required.
			$menu[$key][0] = 'UCAO LMS';
		}
	}
}
//add_filter( 'admin_title', 'custom_admin_title' );
/*
////Redirect after login
function redirect_to_page( $redirect_to_calculated, $redirect_url_specified, $user ) {
	return home_url() ."/orientation/" ;
}
add_filter( 'login_redirect', 'redirect_to_page', 100, 3 );*/


/**
 * Redirect instructors to home page ( or some other page ) on login
 *
 * @param string $redirect_to   Redirect URL
 * @param object $user          WP_User object of the logged in user.
 *
 * @return string               Updated redirect URL.
 *
 * @author Kumar Rajpurohit <kumar.rajpurohit@wisdmlabs.com>
 */
function ir_custom_redirect_instructors_on_login( $redirect_to, $user ) {
    // Redirect to home url ( Change to some other url as necessary )
    $redirect_to = home_url () ."/orientation/";

    return $redirect_to;
}
add_filter( 'ir_login_redirect_filter', 'ir_custom_redirect_instructors_on_login', 10, 2 );
/**
 * Restrict access to dashboard page for instructors
 *
 * @param object $current_screen
 * @author Kumar Rajpurohit <kumar.rajpurohit@wisdmlabs.com>
 */
function ir_custom_instructor_redirect( $current_screen ) {
    if ( ! function_exists('wdm_is_instructor') || ! wdm_is_instructor() ) {
        return;
    }

    if ( is_admin() && ! wp_doing_ajax() ) {
        if ( $current_screen->id == "dashboard" ) {
            $redirect_to = add_query_arg('page', 'ir_instructor_overview', admin_url('admin.php'));
            wp_redirect( $redirect_to );
            die();
        }
    }
}
add_action( 'current_screen', 'ir_custom_instructor_redirect', 10, 1 );
if (! function_exists( 'ir_custom_hide_products_tile' ) ) { /** * Hide products tile on instructor dashboard * * @author Kumar Rajpurohit <kumar.rajpurohit@wisdmlabs.com> */ function ir_custom_hide_products_tile() { if ( ! function_exists( 'wdm_is_instructor' ) || ! wdm_is_instructor() ) { return; } ?> <style> .ir-addon-info-tile { display: none; } </style> <?php } add_action( 'admin_head', 'ir_custom_hide_products_tile' );}

//Register Widget Areas 
function bbchild_widgets_init() {
    register_sidebar([
        'name'          => esc_html__( 'Calendar Sidebar', 'wphierarchy' ),
        'id'            => 'calendar-sidebar',
        'description'   => esc_html__( 'Add Widgets for calendar sidebar here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class=d"widget-title">',
        'after_title'   => '</h2>'
    ]);
}
add_action( 'widgets_init', 'bbchild_widgets_init' );

function my_custom_ids( $field_name, $field_value) {
  
    if ( empty( $field_name ) )
      return '';
    
    global $wpdb;
    
    $field_id = xprofile_get_field_id_from_name( $field_name ); 
   
    if ( !empty( $field_id ) ) 
      $query = "SELECT user_id FROM " . $wpdb->prefix . "bp_xprofile_data WHERE field_id = " . $field_id;
    else
     return '';
    
    if ( $field_value != '' ) 
      $query .= " AND value = '" . $field_value . "'";
        /* 
        LIKE is slow. If you're sure the value has not been serialized, you can do this:
        $query .= " AND value = '" . $field_value . "'";
        */
    
    $custom_ids = $wpdb->get_col( $query );
    
    if ( !empty( $custom_ids ) ) {
      // convert the array to a csv string
      $custom_ids_str = 'include=' . implode(",", $custom_ids);
      return $custom_ids_str;
    }
    else
     return '';
}

function get_completed_courses_for_user( $user_id )
{
    global $wpdb;
    
    if( empty( $user_id ) ) return [];
                                    
    $results = $wpdb->get_results( "select count(`course_id`) as count_course
                                    from `".$wpdb->prefix."learndash_user_activity`"
                                    ."where `activity_type` = 'course'"
                                    ."and `activity_completed` = 1" );
                                    
    //return $results;

    foreach ($results as $key=>$obj){
        $expected_result[] = $obj->count_course;
    }
    return implode(',',$expected_result);
}

function get_last_opened_course($user_id) {
  global $wpdb;
    
    if( empty( $user_id ) ) return [];
                                    
    $results = $wpdb->get_results( "SELECT course_id
                                    FROM ". $wpdb->prefix ."learndash_user_activity u_activity "
                                    ."INNER JOIN " 
                                    ."(SELECT MAX(activity_updated) as max_updated "
                                    ."FROM wp_learndash_user_activity "
                                    ."WHERE user_id=". $user_id .") a "
                                    ."ON a.max_updated = u_activity.activity_updated "
                                    ."LIMIT 1");
                                    
    //return $results;

    foreach ($results as $key=>$obj){
        $expected_result[] = $obj->course_id;
    }
    return implode(',',$expected_result);
}



?>