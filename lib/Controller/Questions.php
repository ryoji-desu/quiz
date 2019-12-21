<?php

namespace MyApp\Controller;

class Questions extends \MyApp\Controller {
    public function run()
    {
        $quizModel = new \MyApp\Model\Quizzes();
        if(!isset($_SESSION['count'])) {
            $_SESSION['count'] = 1;
            $questions = $quizModel->getQuestions([
                'quiz_id' => $_SESSION['quiz_id'],
                'count' => $_SESSION['count'],
            ]);
            $this->setValues('questions',$questions);
        } elseif (isset($_POST['questions']) && $_SESSION['count'] >= $_SESSION['question_number']) {
            $_SESSION['finish'] = 'finish';
            $arr = explode("/", $_POST['questions']);
            try {
                $quizModel->insertAnswer([
                    'quiz_question_id' => $arr[0],
                    'selected_quiz_question_selection_id' => $arr[1],
                ]);
            } catch (\MyApp\Exception\DatabaseError $e) {
                $this->setErrors('error', $e->getMessage());
                $_SESSION['count']--;
                return;
            }
            header('Location: result.php');
            return;
        } elseif (isset($_POST['questions'])){
            $arr = explode("/", $_POST['questions']);
            try {
                $quizModel->insertAnswer([
                    'quiz_question_id' => $arr[0],
                    'selected_quiz_question_selection_id' => $arr[1],
                ]);
            } catch (\MyApp\Exception\DatabaseError $e) {
                $this->setErrors('error', $e->getMessage());
                $_SESSION['count']--;
                return;
            }
            $_SESSION['count']++;
            $questions = $quizModel->getQuestions([
                'quiz_id' => $_SESSION['quiz_id'],
                'count' => $_SESSION['count'],
            ]);
            $this->setValues('questions',$questions);
        }
    }
}


 ?>
