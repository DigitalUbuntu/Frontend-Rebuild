<?php
header('Content-type: application/json');
// echo json_encode(['course' => $_POST['course_title']]);
// return;
if(isset($_POST['course_title'])){
    $dsn = "mysql:host=localhost;dbname=ucao;charset=UTF8";

    try {
	    $pdo = new PDO($dsn, 'root', '');

	    if ($pdo) {
            $sql = 'INSERT INTO courses(course_title) VALUES(:course_title)';

            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':course_title' => $_POST['course_title']
            ]);

            $courseId = $pdo->lastInsertId();
            $sql = 'INSERT INTO chapter(title, course_id) VALUES(:title, :course_id)';
            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':title' => $_POST['chapter_title'],
                ':course_id' => $courseId
            ]);

            $chapterId = $pdo->lastInsertId();
           
            $totalSummited = count($_POST) - 2 + count($_FILES);
           
            for($i = 0; $i < $totalSummited; $i++){
                $content = 'content_'.$i;
                $file = 'file_'.$i;
                $sql = 'INSERT INTO chapter_content(content, chapter_id) VALUES(:content, :chapter_id)';

                $statement = $pdo->prepare($sql);
                
                if(isset($_POST[$content]) ){
                   
                    $statement->execute([
                        ':content' => $_POST[$content],
                        ':chapter_id' => $chapterId
                    ]);
                    
                  
                   
                }elseif (isset($_FILES[$file])){
                    $filename = $_FILES[$file]['name'];
                    $tmp = $_FILES[$file]['tmp_name'];
                    $dir = __DIR__ . '/uploads/'.$filename;
                    move_uploaded_file($tmp, $dir);
                    $statement->execute([
                        ':content' => $filename,
                        ':chapter_id' => $chapterId
                    ]);
                    // echo json_encode(['name' => $tmp]);

                    // return;
                }
                
                
            }
            

            echo json_encode(['success' => 'insertion réussi !']);
            return;
	    }
    } 
    catch (PDOException $e) {
	    echo $e->getMessage();
    }
    
}else{

  echo json_encode(['out' => 'out nnnnn']);
}
