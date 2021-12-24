<?php

function getLastPostId(){
  global $wpdb;

  $lastQuiz = $wpdb->get_results("SELECT ID FROM ".$wpdb->prefix."posts ORDER BY ID DESC LIMIT 1");
 
 return  $lastQuiz[0]->ID;
  
}

function getLastQuestionId(){
  global $wpdb;

  $lastQuestion = $wpdb->get_results("SELECT id FROM ".$wpdb->prefix."learndash_pro_quiz_question ORDER BY id DESC LIMIT 1");
 
 return  $lastQuestion[0]->id;
  
}

function insertQuestion(){

  // wp_send_json_success(['questions' => $_POST['questions']]);

  $postQuizId = getLastPostId();
  global $wpdb;

  foreach ($_POST['questions'] as $question) {

      wp_insert_post(array(
        'post_title' => $question['title'],
        'post_content' => $question['content'],
        'post_status' => 'publish',
        'post_type' => 'sfwd-question'
      
      ));
      $postQuestionId = getLastPostId();

      $answers = [] ;


      foreach ($question['answer_sets'] as $value) {

        $answerType = new WpProQuiz_Model_AnswerTypes();
        $answerType->set_array_to_object($value);

        $answers[] = $answerType;
      
      }
      $answersSerialize = (string) serialize($answers);

      $myQuestion = new  WpProQuiz_Model_Question();
      $myQuestion->setQuizId( (int) $question['quiz']);
      $myQuestion->setTitle( $question['title']);
      $myQuestion->setQuestion( $question['content']);
      $myQuestion->setCorrectMsg($question['correct_message']);
      $myQuestion->setIncorrectMsg($question['incorrect_message']);
      $myQuestion->setAnswerType($question['question_type']);
      $myQuestion->setPoints((int) $question['points']);
      $myQuestion->setMatrixSortAnswerCriteriaWidth(20);

      $myQuestion->setAnswerData($answersSerialize);
      $myQuestionMapper = new WpProQuiz_Model_QuestionMapper();
      $myQuestionMapper->save($myQuestion);

      $lastQuestionId = getLastQuestionId();

  
    $wpdb->update( 
      $wpdb->prefix.'postmeta', 
      array(
        'meta_value' => serialize([$postQuestionId => $lastQuestionId]),
    
      ),
      array(
        'post_id' => $postQuizId,
        'meta_key' => 'ld_quiz_questions',
      )
      );

      $wpdb->insert( 
        $wpdb->prefix.'postmeta', 
        array(
          'post_id' => $postQuestionId,
          'meta_key' => 'question_pro_category',
          'meta_value' => '0'

        )
      );

    $wpdb->insert( 
        $wpdb->prefix.'postmeta', 
        array(
        'post_id' => $postQuestionId,
        'meta_key' => 'question_type',
        'meta_value' => $question['question_type']
      
        )
      );

    $wpdb->insert( 
      $wpdb->prefix.'postmeta', 
      array(
      'post_id' => $postQuestionId,
      'meta_key' => 'question_points',
      'meta_value' => $question['points']

      )
    );

    $wpdb->insert( 
      $wpdb->prefix.'postmeta', 
      array(
      'post_id' => $postQuestionId,
      'meta_key' => 'question_pro_id',
      'meta_value' => $lastQuestionId

      )
    );

    $wpdb->insert( 
      $wpdb->prefix.'postmeta', 
      array(
      'post_id' => $postQuestionId,
      'meta_key' => '_sfwd-question',
      'meta_value' => serialize(['0' => '', 'sfwd-question_quiz' => $postQuizId])

      )
    );

    $wpdb->insert( 
      $wpdb->prefix.'postmeta', 
      array(
      'post_id' => $postQuestionId,
      'meta_key' => '_edit_last',
      'meta_value' => get_current_user_id()

      )
    );
    $date = new DateTime();

    $wpdb->insert( 
      $wpdb->prefix.'postmeta', 
      array(
      'post_id' => $postQuestionId,
      'meta_key' => '_edit_lock',
      'meta_value' => $date->getTimestamp().':'.get_current_user_id()

      )
    );

    $wpdb->insert( 
      $wpdb->prefix.'postmeta', 
      array(
      'post_id' => $postQuestionId,
      'meta_key' => 'quiz_id',
      'meta_value' => $postQuizId

      )
    );
  


  }

  wp_send_json_success(['success' => 'question crée avec succès']);
  
}

add_action( 'wp_ajax_getCurrentUserId', 'getCurrentUserId' );
add_action( 'wp_ajax_getQuiz', 'getQuiz' );
add_action( 'wp_ajax_getLastQuizId', 'getLastQuizId');
add_action( 'wp_ajax_insertQuestion', 'insertQuestion');
// add_action( 'wp_ajax_nopriv_post_getQuiz', 'getQuiz' );

add_action( 'wp_ajax_deletePost', 'deletePost' );