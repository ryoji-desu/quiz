<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\Index();
$app->run();
$data = $app->getValues()->data;
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
    <?php if ($app->getErrors('error') !== " ") :?>
        <div class="alert alert-primary" role="alert"><p><?php echo ($app->getErrors('error')) ;?></p></div>
    <?php endif ;?>
    <section class="container">
        <div class="row">
            <h2 class="m-3 col">問題一覧</h2>
            <h2 class="mt-3 mb-3 ml-5  col"><a href="create_quiz.php">問題を作る</a></h2>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                  <th>問題</th>
                  <th>問題数</th>
                  <th>回答者数</th>
                  <th>平均点</th>
                  <th>統計</th>
                  <th></th>
                </tr>
              </thead>
              <?php foreach($data as $data) :?>
                  <tbody>
                     <td><?= h($data->title) ?></td>
                     <td><?= h($data->question_number) ?>個</td>
                     <td><?= h($data->answers) ?>人</td>
                     <td><?= h(round($data->score,2)) ?>点</td>
                     <td><div class="btn-toolbar">
                            <div class="btn-group">
                                 <form action = "list_answers.php" method="get"><button name ="answers" type="submit" value="<?= h($data->id) ?>" class="btn btn-primary m-5 text-center">回答者一覧</button></form>
                                 <form action = "list_questions.php" method="get"><button name ="questions" type="submit" value="<?= h($data->id) ?>" class="btn btn-primary m-5 text-center">選択肢別回答</button></form>
                            </div>
                         </div>
                    </td>
                     <td><form action = "quiz_start.php" method="post"><button name ="start" type="submit" value="<?= h($data->id) ?>" class="btn btn-primary m-5 text-center">テスト開始</button></form></td>
                  </tbody>
              <?php endforeach ;?>

        </table>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </body>
</html>
