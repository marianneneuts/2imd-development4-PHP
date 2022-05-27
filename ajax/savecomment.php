<?php
    include_once(__DIR__ . '/../classes/Comment.php');
    session_start();
    $userId = $_SESSION['userId'];


    if(!empty($_POST)){
        // new comment
        $c = new Comment();
        $c->setProjectId($_POST['projectId']);
        $c->setText($_POST['text']);
        $c->setUserId($userId);

        // save
        if($c->saveComment()) {
            $response = [
                'status' => 'success',
                'body' => htmlspecialchars($c->getText()),
                'message' => 'Comment saved'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'wrong'
            ];
        }

        //succes teruggeven
        

        //header('Content-Type: application/json');
        echo json_encode($response);
    }

?>