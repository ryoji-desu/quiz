<?php
namespace MyApp\Controller;

class List_questions extends \MyApp\Controller {

  public function run()
    {
        $quiz_id = $_GET['questions'];
        $quizModel = new \MyApp\Model\Quizzes();
        $lists = $quizModel->get_list_questions([
            'quiz_id' => $quiz_id,
        ]);
        if (count($lists) == 0) {
            header('Location: index.php');
        }
        $this->setValues('lists',$lists);
    }

}
