<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Db;

class CommentController extends Controller {

    public function addCommentAction() {
        $res = $this->model->getComment();
        if ( !empty($_POST) ) {
            $this->model->setComment($_POST);
        }
        
        $this->view->render('Форум анонимных алкашей', $res);
    }



}

?>