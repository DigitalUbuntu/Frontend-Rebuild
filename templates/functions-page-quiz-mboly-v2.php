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
  wp_enqueue_style( 'font-awesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', '', '1.0.0' );
  wp_enqueue_style( 'new-style', get_stylesheet_directory_uri().'/assets/css/new-style.css', '', '1.0.0' );
  wp_enqueue_style( 'new-responsive', get_stylesheet_directory_uri().'/assets/css/new-responsive.css', '', '1.0.0' );
  wp_enqueue_style( 'new-responsive', get_stylesheet_directory_uri().'/assets/css/add-course.css', '', '1.0.0' );

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

// by mboly start
function wpb_hook_javascript() {
  ?>
      <script>
         

        menuHandler();
        window.addEventListener('resize', function(){
          menuHandler();
          
        });
       
        function menuHandler(){
          const leftMenu = document.querySelector('.side-panel-menu-container');
          const lefMenuPosition = leftMenu.style.postion;
          const lefMenuZindex = leftMenu.style.zIndex;
          const page = document.querySelector('#page');
          const masthead = document.querySelector('#page #masthead');
          const pageWidth = page.style.width  ;
          const pageMarginLeft = page.style.marginLeft  ;
          const mastheadWidth = masthead.style.width ;

          if (window.matchMedia("(max-width: 800px)").matches) {
            let menuLeft = document.querySelector('.side-panel-menu-container');
            const aside = document.querySelector('aside');
            if(aside !== null){
              let leftMenuClone = menuLeft.cloneNode(true);
              menuLeft.parentElement.removeChild(menuLeft)
             
              leftMenuClone.style.position = 'relative';

              leftMenuClone.style.zIndex = '1000';
              leftMenuClone.id = "menu-bottom-container";
              
              document.body.appendChild(leftMenuClone);
              aside.parentElement.removeChild(aside);
     
              page.style.width = '100%' ;
              page.style.marginLeft = '0' ;
              masthead.style.width = '100%';
            }
            
          }else {
         
            let menuButton = document.querySelector('#menu-bottom-container');
            if(menuButton !== null){
             
              let  menuButtomClone = menuButton.cloneNode(true);
              menuButton.parentElement.removeChild(menuButton);
              const oldAside = document.querySelector('aside');
              if(oldAside !== null){
                oldAside.parentElement.removeChild(oldAside);
              }
              let aside = document.createElement('aside');
              aside.classList.add('buddypanel');
              let header = document.createElement('header');
              header.classList.add('panel-add');
              let aLink = document.createElement('a');
              aLink.classList.add('bb-toggle-panel');
              aLink.href = '#';
              aLink.innerHTML = '<i class="bb-icon-menu-left"></i>';
              header.appendChild(aLink);
              aside.appendChild(header);

              let div = document.createElement('div');
              div.classList.add('side-panel-inner');
              div.appendChild(menuButtomClone);
              aside.appendChild(div);
              document.body.insertBefore(aside, page);
              menuButtomClone.style.position = lefMenuPosition;
              menuButtomClone.style.zIndex = '0';
              page.style.width = pageWidth +'px' ;
              page.style.marginLeft = '220px';
              
              masthead.style.width = mastheadWidth  +'px';
              

            }
          }
        }
       
	
      </script>
  <?php
}
add_action('wp_footer', 'wpb_hook_javascript');



function getQuiz(){ 
  $filters = [];
  $filters['post_type'] = 'sfwd-quiz';
  $filters['post_status'] = 'publish';
  $filters['author'] = 49;
 
  $filters['orderby'] = [];
  if (isset($_POST['order']) and ($_POST['order'] == 'DESC' || $_POST['order'] == 'ASC')) {
    
    $filters['orderby']['post_date'] =  $_POST['order'];
  }
  if (isset($_POST['title']) and ($_POST['title'] == 'DESC' || $_POST['title'] == 'ASC')) {
    
    $filters['orderby']['post_title'] =  $_POST['title'];
  }
  $quizs = new WP_Query($filters);

  if(isset($_POST['type'])){
    
    if ( $quizs->have_posts() ) {
      $posts = [];
      while ( $quizs->have_posts() ) {
          $quizs->the_post();
          $post = [] ;
          $post['id'] = get_the_ID();
          $post['quiz'] = get_the_title();
          $post['post'] = getPostTitle(getPostId(get_the_ID()));
          $post['lesson'] = getLessonTitle(getLessonId(get_the_ID()));
          $post['date'] = get_the_date();
          $posts[] = $post;
      }
  
      wp_send_json_success($posts);
   }
  }else{
    return $quizs;
  }
                    
  
  
}
function getPostId($quizId){
  global $wpdb;

  $quizId = (int) $quizId;

  $course = $wpdb->get_results('SELECT meta_value FROM '.$wpdb->prefix.'postmeta WHERE meta_key = "course_id" and post_id = '.$quizId);
  
  return $course[0]->meta_value;
}

function getPostTitle($postId){
  global $wpdb;

  $course = $wpdb->get_results("SELECT post_title FROM ".$wpdb->prefix."posts WHERE ID = ".$postId);
 
 
  return $course[0]->post_title;
}

function getLessonId($quizId){
  global $wpdb;

  $quizId = (int) $quizId;

  $lesson = $wpdb->get_results('SELECT meta_value FROM '.$wpdb->prefix.'postmeta WHERE meta_key = "lesson_id" and post_id = '.$quizId);
  
  return $lesson[0]->meta_value;
}

function getLessonTitle($lessonId){
  global $wpdb;

  $lesson = $wpdb->get_results("SELECT post_title FROM ".$wpdb->prefix."posts WHERE ID = ".$lessonId);
 
 
  return $lesson[0]->post_title;
}

function deletePost(){
  
  $postId = (int) $_POST['id'];
  wp_update_post([
    'ID' => $postId,
    'post_status' => 'draft'
  ]);

  
  getQuiz();
}
add_action( 'wp_ajax_getQuiz', 'getQuiz' );
// add_action( 'wp_ajax_nopriv_post_getQuiz', 'getQuiz' );

add_action( 'wp_ajax_deletePost', 'deletePost' );
// add_action( 'wp_ajax_nopriv_post_deletePost', 'deletePost' );


// end boly


?>