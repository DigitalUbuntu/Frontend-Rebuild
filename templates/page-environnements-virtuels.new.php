<?php
/**
 * The template for displaying all pages
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

    $user = wp_get_current_user();

?>

    <div id="primary" class="content-area bb-grid-cell">
        <main id="main" class="site-main">
    <div class="page-container flex">
        <aside class="bg-main-color">
            <img src="" alt="" class="display-block">
            <div class="menu-setting-container">

            </div>
        </aside>
        <section class="flex flex-column">
            <header>
                <menu></menu>
                <div class="notifications"></div>
                <div class="profile"></div>
                
            </header>
            <div class="content flex flex-column">
                <h2 class="title">
                    <?php esc_html_e('Choose Your Enviroments','buddyboss-theme-child'); ?>
                </h2>
                <div class="item-container flex">
                    <?php 
                        if (current_user_can( 'edit_courses') && (is_user_logged_in)) : 
                    ?>
                    <div class="item">
                        <img src="images/example.jpg" alt="" class="display-block">
                        <div class="flex button-container">
                            <h4>Libray</h4>
                            <button class="button bg-main-color">Access</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php get_template_directory_uri() . '/assets/images/example.jpg';?>" alt="" class="display-block">
                        <div class="flex button-container">
                            <h4>Libray</h4>
                            <button class="button bg-main-color">Access</button>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="item">
                        <img src="images/example.jpg" alt="" class="display-block">
                        <div class="flex button-container">
                            <h4>Libray</h4>
                            <button class="button bg-main-color">Access</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/example.jpg" alt="" class="display-block">
                        <div class="flex button-container">
                            <h4>Libray</h4>
                            <button class="button bg-main-color">Access</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
    </main><!-- #main -->
    </div><!-- #primary -->
    <?php
if ( is_search() ) {
	get_sidebar( 'search' );
} else {
	get_sidebar( 'page' );
}
?>

<?php
get_footer();