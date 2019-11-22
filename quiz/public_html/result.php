<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\Result();
$app->run();
$results = $app->getValues()->results;
foreach($results as $result) {
    $username = $result->username;
    break;
}
$count = 1;
?>
<html lang="ja">
  <head>
    <title>result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <section class="container">
        <h2 class="m-3 text-center"><?= h($_SESSION['title']) ;?></h2>
        <h3 class="m-3 text-center">(全<?=h($_SESSION['question_number']) ;?>問)</h3>
        <h3 class="m-5 text-center"><?= h($username) ;?>さんの点数は<?= h($_SESSION['number_of_correct_answers']) ;?>点です！！</h3>
        <?php foreach ($results as $result)  :?>
            <h4>問題<?= h($count) ;?></h4>
            <h4><?= h($result->title_question) ;?></h4>
            <h4><?php if($result->flag1 == 0) :?>
                    <?php echo '×' ;?>　　　　回答「<?= h($result->your_answer) ;?>」　　　　正解は「<?= h($result->right_answer) ;?>」
                <?php else :?>
                    <?php echo '〇' ;?>　　　　回答「<?= h($result->your_answer) ;?>」
                <?php endif ;?>
            </h4>
            <?php $count++ ;?>
        <?php endforeach ;?>
        <form method="post">
          <button type="submit" name="back" class="btn btn-primary m-5">一覧へ戻る</button>
        </form>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
