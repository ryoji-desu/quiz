<?php

namespace MyApp\Controller;

class Create extends \MyApp\Controller {

  public function run() {
      if (isset($_POST['title_quiz'])) {
          $_SESSION["title_quiz"] = $_POST['title_quiz'];
          $_SESSION['number_of_question'] = $_POST['number_of_question'];
          for ($n = 1; $n <= $_SESSION['number_of_question'];$n++) {
              $title_question = 'question'.$n;
              $_SESSION[$title_question] = $_POST[$title_question];
              $title_selection = 'selection'.$n;
              $_SESSION[$title_selection] = $_POST[$title_selection];
              $_SESSION["right_of_$title_selection"] = $_POST["right_of_$title_selection"];
              for ($a = 1; $a <= $_SESSION[$title_selection];$a++) {
                  $title_selection_number = $title_selection.'-'.$a;
                  $_SESSION[$title_selection_number] = $_POST[$title_selection_number];
              }
          }
          $quizModel = new \MyApp\Model\Quizzes();
          $quizModel->insert_title();
          $quizModel->insert_quiz_questions();
          $_SESSION['done'] = "done";
          header('Location: index.php');


      }
  }
}
