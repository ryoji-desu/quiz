<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller {

  public function run() {
      $quizModel = new \MyApp\Model\Quizzes();
      if (isset($_SESSION['cancel'])) {
          $quizModel->delete();
          $this->setErrors('error','your data has been deleted');
      }
      if (isset($_SESSION['done'])) {
          $this->setErrors('error','lets solve your quiz');
      }
      session_destroy();
    //get data
    $this->setValues('data',$quizModel->get_outline());
  }

}
