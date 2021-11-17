<?php

// le code qui suit doit étre ajouté à functions.php

function getQuiz(){ 
    $filters = [];
    $filters['post_type'] = 'sfwd-quiz';
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
  

  
  add_action( 'wp_ajax_getQuiz', 'getQuiz' );
  