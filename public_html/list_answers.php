<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\List_answers();
$app->run();
$lists = $app->getValues()->lists;
?>
<html lang="ja">
  <head>
    <title>lets quiz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
      <section class="container">
          <h2 class="m-3">「<?= h($app->getValues()->title_question) ;?>」の回答者一覧（<?php if(isset($_SESSION['nobody'])) :?>0<?php else :?><?= h($app->getValues()->count) ;?><?php endif ;?>人）</h2>
          <table class="table table-bordered">
              <thead class="thead-light">
                  <tr>
                    <th>回答者名</th>
                    <th>スコア</th>
                    <th>回答日時</th>
                    <th></th>
                  </tr>
                </thead>
                <?php foreach($lists as $list) :?>
                    <?php if(isset($_SESSION['nobody'])) :?><tbody><td>回答者はいません。</td></tbody><?php else :?>
                    <tbody>
                       <td><?= h($list->user_name) ?></td>
                       <td><?= h($list->number_of_correct_answers) ?></td>
                       <td><?= h($list->created) ?></td>
                       <td><form action = "" method="post"><button name ="result" type="submit" value="<?= h($list->id) ?>" class="btn btn-primary m-5 text-center">回答詳細</button></form></td>
                    </tbody>
                <?php endif ;?>
                <?php endforeach ;?>

          </table>
          <a href="index.php">一覧へ戻る</a>
      </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
