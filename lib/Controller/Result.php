<?php
namespace MyApp\Controller;

class Result extends \MyApp\Controller {

  public function run()
  {

      $quizModel = new \MyApp\Model\Quizzes();
        if (isset($_SESSION['result'])) {
            $results = $quizModel->getResult();
            foreach ($results as $result) {
                $_SESSION['title'] = $result->title;
                $_SESSION['number_of_correct_answers'] = $result->correct_answer;
            }
            $_SESSION['question_number'] = count($results);
            $this->setValues('results',$results);
            unset($_SESSION['result']);
        } else {
            if (isset($_POST['back'])) {
                session_destroy();
                header('Location: index.php');
            }
            $results = $quizModel->getResult();
            $this->update_number_of_correct_answers($results);
            $this->setValues('results',$results);
        }
  }
  public function update_number_of_correct_answers($results)
  {
      $number_of_correct_answers = 0;
      foreach ($results as $result){
          if($result->flag1 == 1){
              $number_of_correct_answers++;
          }
      }
      $quizModel = new \MyApp\Model\Quizzes();
      $quizModel->update_number_of_correct_answers([
              "number_of_correct_answers" => $number_of_correct_answers,
      ]);
      $_SESSION['number_of_correct_answers'] = $number_of_correct_answers;
  }
}


 ?>
