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

            <div class="wrapper">

                <div class="profile-card js-profile-card">

                    <div class="profile-card__img">
                        <?php echo get_avatar( $current_user_id); ?>
                    </div>

                    <div class="profile-card__cnt js-profile-cnt">

                        <div class="profile-card-info">
                            <div class="profile-card__name"> <?php echo "$current_user->first_name" . ' ' . "$current_user->last_name"  ; ?> </div>
                            <div class="profile-card-items">
                                <div class="profile-card__item"> <?php esc_html_e( 'Courses : ', 'buddyboss-theme-child' ); ?> <p class="profile-card__item-p"> <?php echo count($courses).' '; ?> courses </p>  </div>
                                <div class="profile-card__item"> <?php esc_html_e( 'Points : ', 'buddyboss-theme-child' ); ?> <p class="profile-card__item-p"> <?php echo $points.' ' ; ?> points </div>
                                <div class="profile-card__item"> <?php esc_html_e( 'Completed : ', 'buddyboss-theme-child' ); ?> <p class="profile-card__item-p"> <?php echo $completed_courses.' ';//print_r($completed_courses) ?> completed </div>
                                <div class="profile-card__item"> <?php esc_html_e( 'Certificates : ', 'buddyboss-theme-child' ); ?> <p class="profile-card__item-p"> 0 certificates </p> </div>
                            </div>  
                        </div>

                        <div class="profile-card-bio-container">
                            <h3 class="profile-card__name"> <?php esc_html_e( 'About Me : ', 'buddyboss-theme-child' ); ?> </h3>
                            <p class="profile-card__item-p">
                                <?php 
                                    if($current_user->description != ''):
                                        echo "$current_user->description"; 
                                    else:
                                        echo "vous n'avez pas renseigné votre bio";
                                    endif;                                    
                                ?>
                            </p>
                        </div>

                    </div>    

                </div>

            </div>

            <div class="profile-card_courses_wrapper">
                <div class="profile-card_courses">
                    <?php echo do_shortcode( '[ld_profile per_page="3"]'); ?>
                </div>
            </div>      

            <div class="profile-card-resume-courses-wrapper">

                <div class="profile-card-resume-courses">

                    <div class="profile-card-resume-header flex">
                        <h2> <?php esc_html_e( 'Pick up where you left', 'buddyboss-theme-child'); ?> </h2>
                        <div class="profile-card-resume-button">
                            <a href="<?php echo get_site_url(); ?>/mes-cours"> <?php esc_html_e( 'View my courses', 'buddyboss-theme-child' ); ?></a>
                        </div>
                    </div>

                    <div class="course-container">

                        <?php if($last_course==null): ?>

                                <div class="nocourse-icon">

                                    <img src="<?php echo get_template_directory_uri().'/assets/icons/nocourse.png'; ?>" alt="">

                                </div>

                                <div class="product-details">
                                        
                                    <div class="nocourse-control">
                                        
                                        <a href="/mes-cours"> <?php esc_html_e( 'Explore courses', 'buddyboss-theme-child' ); ?> </a>
                                        
                                    </div>
                                        
                                </div>
                            
                        <?php else: ?>	
                                <?php if(get_the_post_thumbnail_url($last_course)!=false): ?>
                                    <div class="product-image">
                                        
                                        <?php echo get_the_post_thumbnail($last_course); ?>
                                        
                                    </div>
                                <?php endif; ?>
            
                                <div class="product-details">
                                    
                                    <h1> <? echo get_the_title($last_course); ?> </h1>
                                        
                                    <p class="information"> <?php get_the_content( $last_course ) ?> </p>

                                        
                                    <div class="course-control">
                                        
                                        <a href="<?php echo get_permalink($last_course); ?>"> <?php esc_html_e( 'Resume course', 'buddyboss-theme-child' ); ?> </a>
                                        
                                    </div>
                                        
                                </div>

                        <?php endif; ?>

                    </div>
                
                </div>

            </div>

            <div class="profile-card-resume-courses-wrapper">

                <div class="profile-card-libraries-widgets">

                    <div class="profile-card-libraries-header flex">
                        <h2> <?php esc_html_e( 'Access Digital Libraries', 'buddyboss-theme-child'); ?> </h2>
                    </div>

                    <div class="profile-card-libraries-main">

                        <ul class="cards">

                            <li class="cards_item">
                                <div class="card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/network.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">YouScribe</h2>
                                        <p class="card_text"> <?php esc_html_e( 'Unlimited access to several hundred thousand resources', 'buddyboss-theme-child' ); ?> </p>
                                        <button class="btn card_btn"> <a href="https://youscribe.com"> <?php esc_html_e( 'Access', 'buddyboss-theme-child' ); ?>  </a> </button>
                                    </div>
                                </div>
                            </li>

                            <li class="cards_item">
                                <div class="card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/study.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">ScholarVox</h2>
                                        <p class="card_text">  <?php esc_html_e( 'First digital library in Africa put online by Cyberlibris', 'buddyboss-theme-child' ); ?> </p>
                                        <button class="btn card_btn"> <a href="https://scholarvox.com"> <?php esc_html_e( 'Access', 'buddyboss-theme-child' ); ?>  </a> </button>
                                    </div>
                                </div>
                            </li>

                            <li class="cards_item">
                                <div class="card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/research.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">Cairn Info</h2>
                                        <p class="card_text">   <?php esc_html_e( 'A library that offers research books, etc', 'buddyboss-theme-child' ); ?> </p>
                                        <button class="btn card_btn"> <a href="https://cairn.info"> <?php esc_html_e( 'Access', 'buddyboss-theme-child' ); ?>  </a> </button>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>

                    </div>

                </div>

            </div>

            <div class="profile-card-resume-courses-wrapper">

                <div class="profile-card-footer-widgets">

                    <div class="profile-card-footer-main">

                        <ul class="cards">

                            <li class="cards_item">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/modules.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title"> <?php esc_html_e( 'Courses', 'buddyboss-theme-child' ); ?> </h2>
                                    </div>
                                </div>
                            </li>

                            <li class="cards_item">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/forums.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">Forums</h2>
                                    </div>
                                </div>
                            </li>

                            <li class="cards_item">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/classes.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title">Classes</h2>
                                    </div>
                                </div>
                            </li>

                            <li class="cards_item">
                                <div class="card-footer card">
                                    <div class="card_image"><img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/news.png'; ?>"></div>
                                    <div class="card_content">
                                        <h2 class="card_title"> <?php _e( 'News Feed', 'buddyboss-theme-child' ); ?> </h2>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>

            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
