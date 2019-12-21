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
            <label for="exampleInputEmail1">クイズのタイトルを入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                <input type="name" name="title_quiz" class="form-control mt-3"  id = 'title_quiz' placeholder="クイズのタイトルを入力してください">
                <p class="text-warning" id = "title_quiz_error"></p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題数を入力してください(最小2つ最大5つ)</label>
                <select id="inputState" name ="number_of_question" class="form-control mt-3 number_of_question">
                  <option selected value=2>2個</option>
                </select>
              </div>
              <div class="form-group title_questions">
                <label for="exampleInputEmail1">問題の質問内容を入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                <input type="name" name="question1" class="form-control mt-3 questions"  placeholder="問題1の質問内容を入力してください" id="question1">
                <p class="text-warning" id="error_question1"></p>
                <input type="name" name="question2" class="form-control mt-3 questions"  placeholder="問題2の質問内容を入力してください" id="question2">
                <p class="text-warning" id="error_question2"></p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題１の選択肢の数を入力してください(最小2つ最大4つ)</label>
                <select id="selection1" name="selection1" class="form-control mt-3 number_of_selection">
                  <option selected value=2>2個</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題１の正解の選択肢の番号を入力してください(1つのみ)</label>
                <select  class="form-control mt-3 right_of_selection1" name="right_of_selection1">
                  <option selected value=1>選択肢1</option>
                  <option value=2>選択肢2</option>
                </select>
              </div>
              <div class="form-group title_selection1">
                <label for="exampleInputEmail1">問題1の選択肢の内容を入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                <input type="name" name="selection1-1" class="form-control mt-3 selection1"  placeholder="選択肢1の内容を入力してください" id="selection1-1">
                <p class="text-warning"></p>
                <input type="name" name="selection1-2" class="form-control mt-3 selection1"  placeholder="選択肢2の内容を入力してください" id="selection1-2">
                <p class="text-warning"></p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題２の選択肢の数を入力してください(最小2つ最大4つ)</label>
                <select id="selection2" name="selection2" class="form-control mt-3 number_of_selection">
                  <option selected value=2>2個</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">問題2の正解の選択肢の番号を入力してください(1つのみ)</label>
                <select  class="form-control mt-3 right_of_selection2" name="right_of_selection2">
                  <option selected value=1>選択肢1</option>
                      <option value=2>選択肢2</option>
                </select>
              </div>
              <div class="form-group title_selection2">
                <label for="exampleInputEmail1">問題2の選択肢の内容を入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                <input type="name" name="selection2-1" class="form-control mt-3 selection2"  placeholder="選択肢1の内容を入力してください" id="selection2-1">
                <p class="text-warning"></p>
                <input type="name" name="selection2-2" class="form-control mt-3 selection2"  placeholder="選択肢2の内容を入力してください" id="selection2-2">
                <p class="text-warning"></p>
              </div>
              <div id = "hidden3" style= "display :none">
                  <div class="form-group">
                    <label for="exampleInputEmail1">問題3の選択肢の数を入力してください(最小2つ最大4つ)</label>
                    <select id="selection3" name="selection3" class="form-control mt-3 number_of_selection">
                      <option selected value=2>2個</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">問題3の正解の選択肢の番号を入力してください(1つのみ)</label>
                    <select class="form-control mt-3 right_of_selection3" name="right_of_selection3">
                      <option selected value=1>選択肢1</option>
                      <option value=2>選択肢2</option>
                    </select>
                  </div>
                  <div class="form-group title_selection3">
                    <label for="exampleInputEmail1">問題3の選択肢の内容を入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                    <input type="name" name="selection3-1" class="form-control mt-3 selection3"  placeholder="選択肢1の内容を入力してください" id="selection3-1">
                    <p class="text-warning"></p>
                    <input type="name" name="selection3-2" class="form-control mt-3 selection3"  placeholder="選択肢2の内容を入力してください" id="selection3-2">
                    <p class="text-warning"></p>
                  </div>
              </div>
              <div id = "hidden4" style= "display :none">
                  <div class="form-group">
                    <label for="exampleInputEmail1">問題4の選択肢の数を入力してください(最小2つ最大4つ)</label>
                    <select id="selection4" name="selection4"class="form-control mt-3 number_of_selection">
                      <option selected value=2>2個</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">問題4の正解の選択肢の番号を入力してください(1つのみ)</label>
                    <select class="form-control mt-3 right_of_selection4" name="right_of_selection4">
                      <option selected value=1>選択肢1</option>
                      <option value=2>選択肢2</option>
                    </select>
                  </div>
                  <div class="form-group title_selection4">
                    <label for="exampleInputEmail1">問題4の選択肢の内容を入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                    <input type="name" name="selection4-1" class="form-control mt-3 selection4"  placeholder="選択肢1の内容を入力してください" id="selection4-1">
                    <p class="text-warning"></p>
                    <input type="name" name="selection4-2" class="form-control mt-3 selection4"  placeholder="選択肢2の内容を入力してください" id="selection4-2">
                    <p class="text-warning"></p>
                  </div>
              </div>
              <div id = "hidden5" style= "display :none">
                  <div class="form-group">
                    <label for="exampleInputEmail1">問題5の選択肢の数を入力してください(最小2つ最大4つ)</label>
                    <select id="selection5" name="selection5" class="form-control mt-3 number_of_selection">
                      <option selected value=2>2個</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">問題5の正解の選択肢の番号を入力してください(1つのみ)</label>
                    <select class="form-control mt-3 right_of_selection5" name="right_of_selection5">
                      <option selected value=1>選択肢1</option>
                      <option value=2>選択肢2</option>
                    </select>
                  </div>
                  <div class="form-group title_selection5">
                    <label for="exampleInputEmail1">問題5の選択肢の内容を入力してください(最低2文字最大30文字,半角英数字記号、カタカナ、平仮名、漢字のみ)</label>
                    <input type="name" name="selection5-1" class="form-control mt-3 selection5"  placeholder="選択肢1の内容を入力してください" id="selection5-1">
                    <p class="text-warning"></p>
                    <input type="name" name="selection5-2" class="form-control mt-3 selection5"  placeholder="選択肢2の内容を入力してください" id="selection5-2">
                    <p class="text-warning"></p>
                  </div>
              </div>
          <div class="form-group">
              <a href="index.php">一覧へ戻る</a>
              <button class="btn btn-primary m-5" type="button" id="button1">確認</button>
              <button class="btn btn-primary m-5" id="button2" disabled='disabled'>提出</button>
          </div>
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

        $('#title_quiz,#question1,#question2,#selection1-1,#selection1-2,#selection2-1,#selection2-2').bind('keydown keyup keypress change',function(){
            $("#button2").prop("disabled", true);
            var title_quiz_count = $(this).val().replace(/\s+/g,'').length;
            var bool = ( $(this).val().match(/^[\u30a0-\u30ff\u3040-\u309f\u3005-\u3006\u30e0-\u9fcf\u0020-\u007e]+$/) )? true : false
            if (bool == false && title_quiz_count > 30 || title_quiz_count <2 ) {
                 $(this).next('p').text( '指定数文字内でご記入ください。また、文字の正規表現をご確認ください。');
            } else if (bool == true && title_quiz_count > 30 || title_quiz_count <2 ) {
                 $(this).next('p').text( '指定数文字内でご記入ください');
            } else if (bool == false && title_quiz_count <= 30 && title_quiz_count >= 2 ) {
                 $(this).next('p').text( '文字の正規表現をご確認ください。');
            } else {
                $(this).next('p').text('');
            }
        });
        $(document).on('keydown keyup keypress change','#question3,#question4,#question5,#selection1-3,#selection1-4,#selection1-5,#selection2-1,#selection2-2,#selection2-3,#selection2-4,#selection2-5,#selection3-1,#selection3-2,#selection3-3,#selection3-4,#selection3-5,#selection4-1,#selection4-2,#selection4-3,#selection4-4,#selection4-5,#selection5-1,#selection5-2,#selection5-3,#selection5-4,#selection5-5',function(){
            $("#button2").prop("disabled", true);
            var title_quiz_count = $(this).val().replace(/\s+/g,'').length;
            var bool = ( $(this).val().match(/^[\u30a0-\u30ff\u3040-\u309f\u3005-\u3006\u30e0-\u9fcf\u0020-\u007e]+$/) )? true : false
            if (bool == false && title_quiz_count > 30 || title_quiz_count <2 ) {
                 $(this).next('p').text( '指定数文字内でご記入ください。また、文字の正規表現をご確認ください。');
            } else if (bool == true && title_quiz_count > 30 || title_quiz_count <2 ) {
                 $(this).next('p').text( '指定数文字内でご記入ください');
            } else if (bool == false && title_quiz_count <= 30 && title_quiz_count >= 2 ) {
                 $(this).next('p').text( '文字の正規表現をご確認ください。');
            } else {
                $(this).next('p').text('');
            }
        });
        $('#button1').on('click', function() {
            $(window).off('beforeunload');
            var count = $('.number_of_question').val();

            check();
            var error = check2(count);
            console.log(error);
            if (error !== undefined) {
                if(!confirm('エラーをご確認ください')){
                     return false;
                 }else{
                     return false;
                 }
            }
            else  {
                $("#button2").prop("disabled", false);
            }
        })

        $('.number_of_question').change(function() {
          $("#button2").prop("disabled", true);
          var val = $(this).val();
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
                            class: 'form-control mt-3 questions',
                            placeholder: "問題"+s+"の質問内容を入力してください",
                            id: 'question' + s,
                            name:'question' + s
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
        $('#selection1,#selection2,#selection3,#selection4,#selection5').change(function() {
            $("#button2").prop("disabled", true);
          //選択したvalue値を変数に格納
          var val = $(this).val();
          var id = $(this).attr('id');
          var number = $('.'+id).length;

          var n = number;
          if (val > number)  {
                  for (var m = 1;m <= val-number ;m++) {
                      var s = n + 1;
                      $("<input>", {
                            type: 'name',
                            class: 'form-control mt-3 '+id,
                            placeholder: "選択肢"+s+"の内容を入力してください",
                            id: id+'-' + s,
                            name:id +'-'+s
                      }).appendTo('.title_'+id);
                      var ptag = $('<p>',{
                          id: 'error_'+id+'-' + s,
                          class: 'text-warning'
                      });
                      $('.title_'+id).append(ptag);
                      var name = 'right_of_' + id;
                      console.log(name);
                      $('.'+ name).append($('<option>').html('選択肢'+s).val(s));
                      n++;
                };
          };
          if (val < number) {
                  for (var m = 1;m <= number-val ;m++) {
                      $("#"+id+"-" + n).remove();
                      $('#'+'error_'+id+'-' + n).remove();
                      var name = 'right_of_' + id;
                      $('.'+ name).children(`[value=${n}]`).remove();
                      n--;
                  }
          }
        });
        function check2(count = undefined) {
            for (var i = 0;i <= count;i++) {

                if (i == 0) {
                    var confirm = $('.title_questions').find('p').text();
                    console.log(confirm);
                    if (confirm !== "") {
                        return 'error';
                    }
                }else {
                    var confirm = $('.title_selection'+i).find('p').text();
                    if (confirm !== "") {
                        return 'error';
                    }
                }
            }

        }
        function check() {
            var array1 = ['#title_quiz','#question1','#question2','#question3','#question4','#question5','#selection1-1','#selection1-2','#selection1-3','#selection1-4','#selection1-5','#selection2-1','#selection2-2','#selection2-3','#selection2-4','#selection2-5',
                         '#selection3-1','#selection3-2','#selection3-3','#selection3-4','#selection3-5','#selection3-5','#selection4-1','#selection4-2','#selection4-3','#selection4-4','#selection4-5','#selection5-1','#selection5-2','#selection5-3','#selection5-4','#selection5-5'];
            for (var q = 0;q <= 31 ;q++){
                var tmp = $(array1[q]).val();
                if (tmp == undefined) {
                    continue;
                }
                var title_quiz_count = $(array1[q]).val().replace(/\s+/g,'').length;
                var bool = ( $(array1[q]).val().match(/^[\u30a0-\u30ff\u3040-\u309f\u3005-\u3006\u30e0-\u9fcf\u0020-\u007e]+$/) )? true : false
                if (bool == false && title_quiz_count > 30 || title_quiz_count <2 ) {
                     $(array1[q]).next('p').text( '指定数文字内でご記入ください。また、文字の正規表現をご確認ください。');
                } else if (bool == true && title_quiz_count > 30 || title_quiz_count <2 ) {
                     $(array1[q]).next('p').text( '指定数文字内でご記入ください');
                } else if (bool == false && title_quiz_count <= 30 && title_quiz_count >= 2 ) {
                     $(array1[q]).next('p').text( '文字の正規表現をご確認ください。');
                } else {
                    $(array1[q]).next('p').text('');
                }
            }
        }
    });
    $(window).on('beforeunload', function(e){
      var message = '本当に更新してよろしいですか？';
      e.returnValue = message;
      return message;
    });
    </script>
  </body>
</html>
