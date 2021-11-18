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
$childs_ids = get_id_child_parent($current_user_id);

?>

<div id="primary" class="content-area bb-grid-cell">
    <main id="main" class="site-main">

        <div class="parent-profile-wrapper">

            <div class="parent-profile-card js-profile-card">

                <div class="parent-profile-card__img">
                    <?php echo get_avatar($current_user_id); ?>
                </div>

                <div class="parent-profile-card-info">
                    <div class="parent-profile-card__name">
                        <h2> <?php echo "$current_user->first_name" . ' ' . "$current_user->last_name"; ?> </h2>
                    </div>
                    <div class="parent-profile-card-role">
                        <p class="profile-card__item-p">
                        </p>
                    </div>
                </div>

            </div>

        </div>


        <div>
        <div class="ld-link-accout-wrapper">

                    <?php 
                    $user_id = get_current_user_id();
                    if ( isset( $_POST['ld-submit-links-button'] ) ) {
		                ldpa_submit_link_post( $_POST, $user_id );
		            }; ?>

			    <form id="ld-submit-links" name="ld-submit-links" class="" method="POST"  >
			        <h3>Add additional children</h3>
			        <p>
			            <input type="email" name="link_child_email" required class="input link_child_email" placeholder="Enter email address of child" />
			            <?php wp_nonce_field( 'ld-submit-links' ); ?>
			            <input type="submit" name="ld-submit-links-button" class="ld-button ld-submit-links-button" value="Add Child" />
			        </p>
			    </form>
			</div>
        </div>




        <div class="profile-card-footer-widgets">
            <div class="text-3">Students</div>
            <div class="profile-card-footer-main">

                <ul class="cards">
                <?php  //var_dump($childs_ids);   ?>
              
                    <?php foreach ($childs_ids as $child_id) {
                        $current_child = get_userdata($child_id);
                        
                      
                    ?>
                        <div class="parent-profile-card js-profile-card-ul">
                            <?php 
                                    $user_id = $current_user->ID;
                                	if ( isset( $_POST['ld-delete-links-button'] ) ) {
                                        ldpa_delete_link_post( $_POST, $user_id );
                                    }
                            
                            ?>
                            <li class="cards_item">

                                <a href="">

                                    <div class="card_content" hre >
                                        <?php echo get_avatar($child_id); ?>
                                        <h2 class="card_title"> <?php echo $current_child->first_name; ?> </h2>
                                        <h5 class="card_title"> <?php echo $current_child->user_email; ?> </h5>
                            
                                        <form id="" name="ld-remove-links" class="ld-remove-links" method="POST">
                                            <input type="hidden" name="linked_child_id" value="<?php echo $child_id; ?>" />
                                            <?php wp_nonce_field('ld-remove-links'); ?>
                                            <input type="submit" name="ld-delete-links-button" class="ldap-button ld-delete-links-button" value="Unlink" action="#">
                                        </form>

                                    
                                    </div>

                                </a>
                            </li>
                        </div>
                    <?php } ?>
                </ul>
            </div>

        </div>

        </div>



    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
