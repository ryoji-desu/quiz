<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
if (isset($_SESSION['quiz_answers_id'])) {
    $_SESSION['cancel'] = 'cancel';
    header('Location: index.php');
}
$app = new MyApp\Controller\Start_quiz();
$app->run();
?>
<html lang="ja">
  <head>
    <title>start quiz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <section class="container text-center">
        <h2 class="m-3"><?= h($_SESSION['title']) ;?></h2>
        <h3 class="m-3">(全<?=h($_SESSION['question_number']) ;?>問)</h3>
        <form method="post">
          <div class="form-group">
            <input type="name" name="username" class="form-control m-5"  placeholder="回答者名を入力してください">
          </div>
          <button type="submit" class="btn btn-primary m-5">テスト開始</button>
        </form>
        <?php if ($app->getErrors('error') !== " ") :?>
            <div class="alert alert-primary" role="alert"><p><?php echo ($app->getErrors('error')) ;?></p></div>
        <?php endif ;?>
        <a href="index.php">一覧へ戻る</a>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
