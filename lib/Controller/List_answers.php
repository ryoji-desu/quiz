<?php
namespace MyApp\Controller;

class List_answers extends \MyApp\Controller {

  public function run()
    {
        $quiz_id = $_GET['answers'];
        $quizModel = new \MyApp\Model\Quizzes();
        $lists = $quizModel->get_list_answers([
            'quiz_id' => $quiz_id,
        ]);
        foreach ($lists as $list) {
            $title_question = $list->title;
        }
        $count = count($lists);
        $this->setValues('lists',$lists);
        if (!isset($title_question)) {
            header('Location: index.php');
            return;
        }
        $this->setValues('title_question',$title_question);
        $this->setValues('count',$count);
        if (isset($_POST['result'])) {
            $_SESSION['result'] = $_POST['result'];
            header('Location: result.php');
        }

    }

}
