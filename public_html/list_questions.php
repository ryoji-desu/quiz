<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\List_questions();
$app->run();
$lists = $app->getValues()->lists;
foreach ($lists as $list) {
    $title = $list->title;
    break;
}
?>
<html lang="ja">
  <head>
    <title>list questions</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
      <section class="container">
          <h2 class="m-3">「<?= h($title) ;?>」の選択肢別回答</h2>
          <table class="table table-bordered">
              <thead class="thead-light">
                  <tr>
                    <th>問題質問内容</th>
                    <th>正解数</th>
                    <th>誤答数</th>
                    <th>正解率</th>
                  </tr>
                </thead>
                <?php foreach($lists as $list) :?>
                    <tbody>
                       <td><?= h($list->content) ?></td>
                       <td><?php if(isset($_SESSION['nobody'])) :?>未回答<?php else :?><?= h($list->right_answer) ?><?php endif;?></td>
                       <td><?php if(isset($_SESSION['nobody'])) :?>未回答<?php else :?><?= h($list->wrong_answer) ?><?php endif;?></td>
                       <td><?php if(isset($_SESSION['nobody'])) :?>未回答<?php else :?><?php $total = $list->wrong_answer+$list->right_answer ;?><?= h(round($list->right_answer/$total*100,2)) ?>%<?php endif;?></td>
                    </tbody>
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
