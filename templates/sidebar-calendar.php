<?php
/**
 * The sidebar containing the main widget area for calendar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuddyBoss_Theme
 */

if ( !is_active_sidebar('calendar') ) {
	return;
}
?>

<div id="secondary" class="widget-area sm-grid-1-1">
	<?php dynamic_sidebar( 'calendar' ); ?>
</div><!-- #secondary -->