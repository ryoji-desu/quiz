<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\Questions();
$app->run();
if (!isset($app->getValues()->questions) && !isset($_SESSION['finish'])) {
    $_SESSION['cancel'] = 'cancel';
    header('Location: index.php');
} else {
    $questions = $app->getValues()->questions;
}
foreach ($questions as $question) {
    $title_question = $question['title_question'];
    $question_id = $question['id'];
}
$selection_count = 1;
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
    <section class="container">
        <h2 class="m-3 text-center"><?= h($_SESSION['title']) ;?></h2>
        <h3 class="m-3 text-center">(全<?=h($_SESSION['question_number']) ;?>問)</h3>
        <h3>問題<?php echo h($_SESSION['count']) ;?></h3>
        <h3><?php echo h($title_question) ;?></h3>
        <form name="form1" method="post">
            <div class="form-group">
                <?php foreach ($questions as $question) :?>
                    <div class="radio">
                      <label>
                        <input type="radio" name="questions"  value="<?php echo h($question['id']) ;?>/<?php echo h($question['flag']) ?>">
                        <?php echo h($selection_count) ;?>. <?php echo h($question['title_selection']) ;?>
                      </label>
                    </div>
                    <?php $selection_count++ ;?>
                <?php endforeach ;?>
            </div>
            <?php if($_SESSION['count'] < $_SESSION['question_number']) :?>
                <button type="submit" id = "check" class="btn btn-primary m-5 text-center">次へ</button>
            <?php else :?>
                <button type="submit" id ="check" class="btn btn-primary m-5 text-center">採点へ</button>
            <?php endif ;?>
        </form>
        <p><?php echo ($app->getErrors('error')) ;?></p>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
    $(window).on('beforeunload', function(e){
      var message = '本当に更新してよろしいですか？';
      e.returnValue = message;
      return message;
    });
    $("#check").click(function() {
        $(window).off('beforeunload');

    });
    $(function() {

           $("#check").click(function() {
               if (!$("input:radio[name='questions']:checked").val()) {
                   if(!confirm('回答してください')){
                        /* キャンセルの時の処理 */
                        return false;
                    }else{
                        return false;
                    }
               }
           });

       });
    </script>
  </body>
</html>
