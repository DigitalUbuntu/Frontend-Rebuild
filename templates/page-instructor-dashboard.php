<?php
/**
 * The template for displaying a student's teachers directory
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
?>
<?php 
    $current_user_id = get_current_user_id();
    $current_user = get_userdata($current_user_id);
    $courses = learndash_user_get_enrolled_courses($current_user_id);
    $points = learndash_get_user_course_points($current_user_id);
    $completed_courses = get_completed_courses_for_user($current_user_id);
    $last_course = get_last_opened_course($current_user_id);
?>

<div id="primary" class="content-area bb-grid-cell">
    <main id="main" class="site-main">

        <div class="instructor-profile-wrapper">

            <div class="instructor-profile-card js-profile-card">

                <div class="instructor-profile-card__img">
                    <?php echo get_avatar( $current_user_id); ?>
                </div>

                <div class="instructor-profile-card-info">
                    <div class="instructor-profile-card__name"> <h2> <?php echo "$current_user->first_name" . ' ' . "$current_user->last_name"  ; ?> </h2> </div>
                    <div class="instructor-profile-card-role">
                        <p class="profile-card__item-p">
                            Associate professor
                        </p>
                    </div>  
                </div>

            </div>

        </div>

        <div class="profile-card-resume-courses-wrapper">

            <div class="profile-card-footer-widgets">

                <div class="profile-card-footer-main">

                    <ul class="cards">

                        <li class="cards_item">
                            <a href="<?php echo get_site_url(); ?>/my-courses">    
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/modules.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title"> <?php esc_html_e( 'Courses', 'buddyboss-theme-child' ); ?> </h2>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="cards_item">
                            <a href="<?php echo get_site_url(); ?>/forums">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/forums.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">Forums</h2>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="cards_item">
                            <a href="<?php echo get_site_url(); ?>/classes">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/classes.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">Classes</h2>
                                    </div>
                                </div>
                            </a>    
                        </li>

                        <li class="cards_item">
                            <a href="<?php echo get_site_url(); ?>/news-feed">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/news.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title"> <?php _e( 'News Feed', 'buddyboss-theme-child' ); ?> </h2>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>

        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
