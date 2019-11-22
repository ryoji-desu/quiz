<?php
namespace MyApp\Controller;

class Start_quiz extends \MyApp\Controller {

    public function run()
    {
        $quizModel = new \MyApp\Model\Quizzes();
        if (isset($_SESSION['quiz_answers_id'])) {
            $quizModel->delete();
            header('Location: index.php');
        }
        if (!isset($_SESSION['quiz_id'])) {
            $question_number = $_POST;
            $title = $quizModel->knowTitle([
                "question_number" => $question_number,
            ]);
            foreach ($title as $title) {
                $_SESSION['quiz_id'] = $title->id;
                $_SESSION['title'] = $title->title;
                $_SESSION['question_number'] = $title->question_number;
            }
        }
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $this->firstvalidate($username);
            if ($this->hasError()) {
                return;
            } else {
                try {
                    $_SESSION['quiz_answers_id'] = $quizModel->startQuiz([
                        'username' => $username,
                    ]);
                } catch (\MyApp\Exception\DatabaseError $e) {
                    $this->setErrors('follow', $e->getMessage());
                    return;
                }
                $_SESSION['username'] = $username;
                header('Location: questions.php');
            }
        }
    }
}
?>
