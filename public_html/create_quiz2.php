<!doctype html>
<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\Create();
$app->run();
?>
<html lang="ja">
  <head>
    <title>create quiz</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <section class="container">
        <h2 class="m-3 text-center">クイズを作ろう</h2>
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">クイズのタイトルを入力してください(最低5文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
            <input type="name" name="title_quiz" class="form-control mt-3"  id = 'title_quiz' placeholder="クイズのタイトルを入力してください">
            <p class="text-warning" id = "title_quiz_error"></p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">問題数を入力してください(最小2つ最大5つ)</label>
            <select id="inputState" name="number_of_question" class="form-control mt-3 number_of_question">
              <option selected value=2>2個</option>
            </select>
          </div>
          <div class="form-group title_questions">
            <label for="exampleInputEmail1">問題の質問内容を入力してください</label>
            <input type="name" name="question1" class="form-control mt-3 questions"  placeholder="問題1の質問内容を入力してください" id="question1">
            <p class="text-warning" id="error_question1"></p>
            <input type="name" name="question2" class="form-control mt-3 questions"  placeholder="問題2の質問内容を入力してください" id="question2">
            <p class="text-warning" id="error_question2"></p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">問題１の選択肢の数を入力してください(最小2つ最大4つ)</label>
            <select id="selection1" class="form-control mt-3 number_of_selection" name="number_of_selection1">
              <option selected value=2>2個</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">問題１の正解の選択肢の番号を入力してください(1つのみ)</label>
            <select  class="form-control mt-3 number_of_selection" name="right_of_selection1">
              <option selected value=2>2個</option>
            </select>
          </div>
          <div class="form-group title_selections1">
            <label for="exampleInputEmail1">問題1の選択肢の内容を入力してください</label>
            <input type="name" name="selection1-1" class="form-control mt-3 selection1"  placeholder="選択肢1の内容を入力してください" id="selection1-1">
            <p class="text-warning"></p>
            <input type="name" name="selection1-2" class="form-control mt-3 selection1"  placeholder="選択肢2の内容を入力してください" id="selection1-2">
            <p class="text-warning"></p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">問題２の選択肢の数を入力してください(最小2つ最大4つ)</label>
            <select id="selection2" class="form-control mt-3 number_of_selection" name="number_of_selection2">
              <option selected value=2>2個</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">問題2の正解の選択肢の番号を入力してください(1つのみ)</label>
            <select  class="form-control mt-3 right_of_selection" name="right_of_selection2">
              <option selected value=2>2個</option>
            </select>
          </div>
          <div class="form-group title_selections2">
            <label for="exampleInputEmail1">問題2の選択肢の内容を入力してください</label>
            <input type="name" name="selection2-1" class="form-control mt-3 selection2"  placeholder="選択肢1の内容を入力してください" id="selection2-1">
            <p class="text-warning"></p>
            <input type="name" name="selection2-2" class="form-control mt-3 selection2"  placeholder="選択肢2の内容を入力してください" id="selection2-2">
            <p class="text-warning"></p>
          </div>
          <div id = "hidden3" style= "display :none">
              <div class="form-group">
                <label for="exampleInputEmail1">問題3の選択肢の数を入力してください(最小2つ最大4つ)</label>
                <select id="selection3" class="form-control mt-3 number_of_selection" name="number_of_selection3">
                  <option selected name="selection3_option" value=2>2個</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題3の正解の選択肢の番号を入力してください(1つのみ)</label>
                <select class="form-control mt-3 right_of_selection" name="right_of_selection3">
                  <option selected value=2>2個</option>
                </select>
              </div>
              <div class="form-group title_selections3">
                <label for="exampleInputEmail1">問題3の選択肢の内容を入力してください</label>
                <input type="name" name="selection3-1" class="form-control mt-3 selection3"  placeholder="選択肢1の内容を入力してください" id="selection3-1">
                <p class="text-warning"></p>
                <input type="name" name="selection3-2" class="form-control mt-3 selection3"  placeholder="選択肢2の内容を入力してください" id="selection3-2">
                <p class="text-warning"></p>
              </div>
          </div>
          <div id = "hidden4" style= "display :none">
              <div class="form-group">
                <label for="exampleInputEmail1">問題4の選択肢の数を入力してください(最小2つ最大4つ)</label>
                <select id="selection4" class="form-control mt-3 number_of_selection" name="number_of_selection4">
                  <option selected name="selection4_option" value=2>2個</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題4の正解の選択肢の番号を入力してください(1つのみ)</label>
                <select class="form-control mt-3 right_of_selection" name="right_of_selection4">
                  <option selected value=2>2個</option>
                </select>
              </div>
              <div class="form-group title_selections4">
                <label for="exampleInputEmail1">問題4の選択肢の内容を入力してください</label>
                <input type="name" name="selection4-1" class="form-control mt-3 selection4"  placeholder="選択肢1の内容を入力してください" id="selection4-1">
                <p class="text-warning"></p>
                <input type="name" name="selection4-2" class="form-control mt-3 selection4"  placeholder="選択肢2の内容を入力してください" id="selection4-2">
                <p class="text-warning"></p>
              </div>
          </div>
          <div id = "hidden5" style= "display :none">
              <div class="form-group">
                <label for="exampleInputEmail1">問題5の選択肢の数を入力してください(最小2つ最大4つ)</label>
                <select id="selection5" class="form-control mt-3 number_of_selection" name="number_of_selection5">
                  <option selected  value=2>2個</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題5の正解の選択肢の番号を入力してください(1つのみ)</label>
                <select class="form-control mt-3 right_of_selection" name="right_of_selection5">
                  <option selected value=2>2個</option>
                </select>
              </div>
              <div class="form-group title_selections5">
                <label for="exampleInputEmail1">問題5の選択肢の内容を入力してください</label>
                <input type="name" name="selection5-1" class="form-control mt-3 selection5"  placeholder="選択肢1の内容を入力してください" id="selection5-1">
                <p class="text-warning"></p>
                <input type="name" name="selection5-2" class="form-control mt-3 selection5"  placeholder="選択肢2の内容を入力してください" id="selection5-2">
                <p class="text-warning"></p>
              </div>
          </div>
          <button class="btn btn-primary m-5" id="button">確認</button>
      </form>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
    $(function(){
        let mr = 0;

        for ($i = 3;$i <= 5; $i++) {
            $('.number_of_question').append($('<option>').html($i + '個').val($i));
        }
        for ($k = 3;$k <= 4; $k++) {
            $('.number_of_selection').append($('<option>').html($k + '個').val($k));
        }
        $('.number_of_question').change(function() {
          var val = $(this).val();
          mr = val;
          console.log(mr);
          if (val == 3 ) {
              $('#hidden3').show();
              $('#hidden4').hide();
              $('#hidden5').hide();
          } else if (val == 4 ) {
              $('#hidden3').show();
              $('#hidden4').show();
              $('#hidden5').hide();
          } else if (val == 5 ) {
              $('#hidden3').show();
              $('#hidden4').show();
              $('#hidden5').show();
          } else {
              $('#hidden3').hide();
              $('#hidden4').hide();
              $('#hidden5').hide();
          }

          var question_number = $('.questions').length;
          var n = question_number;
          //選択したvalue値をp要素に出力
          if (val > question_number)  {
                  for (var m = 1;m <= val-question_number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            name: 'question' + s,
                            class: 'form-control mt-3 questions',
                            placeholder: "問題"+s+"の質問内容を入力してください",
                            id: 'question' + s
                      }).appendTo('.title_questions');
                      var ptag = $('<p>',{
                          id: 'error_querstion' + s,
                          class: 'text-warning'
                      });
                      $('.title_questions').append(ptag);
                      n++;
                };
          };
          if (val < question_number) {
                  for (var m = 1;m <= question_number-val ;m++) {
                      $("#question" + n).remove();
                      $("#error_question"+n);
                      n--;
                  }
          }
        });
        $('#selection1').change(function() {

          //選択したvalue値を変数に格納
          var val = $(this).val();
          var number = $('.selection1').length;

          var n = number;
          if (val > number)  {
                  for (var m = 1;m <= val-number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            class: 'form-control mt-3 selection1',
                            placeholder: "選択肢"+s+"の内容を入力してください",
                            name: 'selection1-' + s,
                            id: 'selection1-' + s
                      }).appendTo('.title_selections1');
                      var ptag = $('<p>',{
                          id: 'error_querstion' + s,
                          class: 'text-warning'
                      });
                      $('.title_selections1').append(ptag);
                      n++;
                };
          };
          if (val < number) {
                  for (var m = 1;m <= number-val ;m++) {
                      $("#selection1-" + n).remove();
                      n--;
                  }
          }
        });
        $('#selection2').change(function() {

          //選択したvalue値を変数に格納
          var val = $(this).val();
          var number = $('.selection2').length;

          var n = number;
          if (val > number)  {
                  for (var m = 1;m <= val-number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            class: 'form-control mt-3 selection2',
                            placeholder: "選択肢"+s+"の内容を入力してください",
                            name: 'selection2-' + s,
                            id: 'selection2-' + s,
                      }).appendTo('.title_selections2');
                      var ptag = $('<p>',{
                          id: 'error_querstion' + s,
                          class: 'text-warning'
                      });
                      $('.title_selections2').append(ptag);
                      n++;
                };
          };
          if (val < number) {
                  for (var m = 1;m <= number-val ;m++) {
                      $("#selection2-" + n).remove();
                      n--;
                  }
          }
        });
        $('#selection3').change(function() {

          //選択したvalue値を変数に格納
          var val = $(this).val();
          var number = $('.selection3').length;

          var n = number;
          if (val > number)  {
                  for (var m = 1;m <= val-number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            class: 'form-control mt-3 selection3',
                            placeholder: "選択肢"+s+"の内容を入力してください",
                            id: 'selection3-' + s,
                            name: 'selection3-' + s
                      }).appendTo('.title_selections3');
                      var ptag = $('<p>',{
                          id: 'error_querstion' + s,
                          class: 'text-warning'
                      });
                      $('.title_selections3').append(ptag);
                      n++;
                };
          };
          if (val < number) {
                  for (var m = 1;m <= number-val ;m++) {
                      $("#selection3-" + n).remove();
                      n--;
                  }
          }
        });
        $('#selection4').change(function() {

          //選択したvalue値を変数に格納
          var val = $(this).val();
          var number = $('.selection4').length;
          var n = number;
          if (val > number)  {
                  for (var m = 1;m <= val-number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            class: 'form-control mt-3 selection4',
                            placeholder: "選択肢"+s+"の内容を入力してください",
                            id: 'selection4-' + s,
                            name: 'selection4-' + s
                      }).appendTo('.title_selections4');
                      var ptag = $('<p>',{
                          id: 'error_querstion' + s,
                          class: 'text-warning'
                      });
                      $('.title_selections4').append(ptag);
                      n++;
                };
          };
          if (val < number) {
                  for (var m = 1;m <= number-val ;m++) {
                      $("#selection4-" + n).remove();
                      n--;
                  }
          }
        });
        $('#selection5').change(function() {

          //選択したvalue値を変数に格納
          var val = $(this).val();
          var number = $('.selection5').length;

          var n = number;
          if (val > number)  {
                  for (var m = 1;m <= val-number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            class: 'form-control mt-3 selection5',
                            placeholder: "選択肢"+s+"の内容を入力してください",
                            id: 'selection5-' + s,
                            name: 'selection5-' + s
                      }).appendTo('.title_selections5');
                      var ptag = $('<p>',{
                          id: 'error_querstion' + s,
                          class: 'text-warning'
                      });
                      $('.title_selections5').append(ptag);
                      n++;
                };
          };
          if (val < number) {
                  for (var m = 1;m <= number-val ;m++) {
                      $("#selection5-" + n).remove();
                      n--;
                  }
          }
        });


    });
    </script>
  </body>
</html>
