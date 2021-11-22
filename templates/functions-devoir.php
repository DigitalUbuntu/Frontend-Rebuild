<?php
function getAssignment()
{
    $filters = [];
    $filters['post_type'] = 'sfwd-assignment';
    $filters['author'] = 'user_id';

    $filters['orderby'] = [];
    if (isset($_POST['order']) and ($_POST['order'] == 'DESC' || $_POST['order'] == 'ASC')) {

        $filters['orderby']['post_date'] = $_POST['order'];
    }
    if (isset($_POST['title']) and ($_POST['title'] == 'DESC' || $_POST['title'] == 'ASC')) {

        $filters['orderby']['post_title'] = $_POST['title'];
    }
    $assignments = new WP_Query($filters);

    if (isset($_POST['type'])) {

        if ($assignments->have_posts()) {
            $posts = [];
            while ($assignments->have_posts()) {
                $assignments->the_post();
                $post = [];
                $post['assignment'] = get_the_title();
                $post['post'] = getPostTitle(getPostId(get_the_ID()));
                $post['lesson'] = getLessonTitle(getLessonId(get_the_ID()));
                $post['date'] = get_the_date();
                $posts[] = $post;
            }

            wp_send_json_success($posts);
        }
    } else {
        return $assignments;
    }


}

function getPostId($assignmentId)
{
    global $wpdb;

    $assignmentId = (int)$assignmentId;

    $course = $wpdb->get_results('SELECT meta_value FROM ' . $wpdb->prefix . 'postmeta WHERE meta_key = "course_id" and post_id = ' . $assignmentId);

    return $course[0]->meta_value;
}

function getPostTitle($postId)
{
    global $wpdb;

    $course = $wpdb->get_results("SELECT meta_value FROM " . $wpdb->prefix . "meta_key WHERE ID = " . $postId);


    return $course[0]->post_title;
}




function getAuthor($postId){
    global $wpdb;

    $point = $wpdb->get_results("SELECT meta_value FROM " . $wpdb->prefix . "postmeta WHERE meta_key = 'disp_name' AND post_id = ". $postId);
    //var_dump($point);
    //die();

    return $point[0]->meta_value;
}

function getPoints($postId){
    global $wpdb;
    $postId = (int) $postId;

    $point = $wpdb->get_results("SELECT meta_value FROM " . $wpdb->prefix . "postmeta WHERE meta_key = 'points' AND post_id = ". $postId);
    //var_dump($point);
    //die();

    return $point[0]->meta_value;
}
function getAssignedCourse($postId){
    global $wpdb;

    $assCourse = $wpdb->get_results("SELECT meta_value FROM " . $wpdb->prefix . "postmeta WHERE meta_key = 'course_id' AND post_id = ". $postId);
    //var_dump($point);
    //die();

    return $assCourse[0]->meta_value;

}

function getAssignedLesson($postId){
    global $wpdb;

    $assLesson = $wpdb->get_results("SELECT meta_value FROM " . $wpdb->prefix . "postmeta WHERE meta_key = 'lesson_title' AND post_id = ". $postId);
    //var_dump($point);
    //die();

    return $assLesson[0]->meta_value;
}



add_action('wp_ajax_getAssignment', 'getAssigment');


?>

