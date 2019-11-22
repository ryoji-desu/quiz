<?php

    namespace MyApp\Model;

    class Quizzes extends \MyApp\Model {
        public function get_outline(){
            $stmt = $this->db->prepare("SELECT quizzes.id,quizzes.title ,COUNT(DISTINCT quiz_questions.id) AS question_number,COUNT(DISTINCT quiz_answers.id) as answers,AVG(quiz_answers.number_of_correct_answers) as score
                                        FROM quizzes
                                        LEFT OUTER JOIN quiz_questions ON quizzes.id = quiz_questions.quiz_id
                                        LEFT OUTER JOIN quiz_answers ON quiz_answers.quiz_id = quizzes.id
                                        GROUP BY quiz_questions.quiz_id,quiz_answers.quiz_id
                                        ORDER BY quizzes.id asc");
            $stmt -> execute();
            $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
            $res = $stmt->fetchAll();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            return $res;
        }
        public function knowTitle($values){
            $question_number = $values['question_number']['start'];
            $stmt = $this->db->prepare("SELECT quizzes.id,quizzes.title,COUNT(quiz_questions.id) AS question_number
                                        FROM quizzes
                                        LEFT OUTER JOIN quiz_questions ON quizzes.id = quiz_questions.quiz_id
                                        WHERE quizzes.id = $question_number
                                        GROUP BY quiz_questions.quiz_id");
            $res = $stmt -> execute();
            $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
            $res = $stmt->fetchAll();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            return $res;
        }
        public function startQuiz($values){
            $username  = '"'.$values['username'].'"';
            $quiz_id = $_SESSION['quiz_id'];
            $stmt = $this->db->prepare("insert into quiz_answers (quiz_id,user_name,created) values ($quiz_id,$username,now())");
            $res = $stmt -> execute();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            return $this->db->lastInsertId();

        }
        public function insertAnswer($values){
            $selected_quiz_question_selection_id  = $values['selected_quiz_question_selection_id'];
            $quiz_answer_id = $_SESSION['quiz_answers_id'];
            $quiz_question_id = $values['quiz_question_id'];
            $stmt = $this->db->prepare("insert into quiz_answer_details (quiz_answer_id,quiz_question_id,selected_quiz_question_selection_id) values ($quiz_answer_id,$quiz_question_id,$selected_quiz_question_selection_id)");
            $res = $stmt -> execute();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }

        }

        public function getQuestions($values) {
            $quiz_id =  $values['quiz_id'];
            $count = $values['count'];
            $stmt = $this->db->prepare("SELECT quiz_questions.id,quiz_questions.sort_order,quiz_questions.content as title_question,quiz_question_selections.content as title_selection,quiz_question_selections.is_correct,quiz_question_selections.sort_order as flag
                                        FROM quiz_questions
                                        LEFT OUTER JOIN quiz_question_selections ON  quiz_questions.id = quiz_question_selections.quiz_question_id
                                        WHERE quiz_questions.quiz_id = $quiz_id and quiz_questions.sort_order = $count");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
        public function getResult() {
            if (isset($_SESSION['quiz_answers_id'])){
                $quiz_answer_id = $_SESSION['quiz_answers_id'];
            } else {
                $quiz_answer_id = $_SESSION['result'];
            }
            $stmt = $this->db->prepare("SELECT quiz_answers.user_name AS username,quiz_questions.content AS title_question,L.content AS your_answer,L.is_correct AS flag1, R.content AS right_answer,quiz_answers.number_of_correct_answers as correct_answer,number_of_correct_answers,title
                                        FROM quiz_answer_details
                                        INNER JOIN quiz_answers ON quiz_answer_details.quiz_answer_id = quiz_answers.id
                                        INNER JOIN quiz_questions ON quiz_questions.quiz_id = quiz_answers.quiz_id AND quiz_answer_details.quiz_question_id = quiz_questions.id
                                        INNER JOIN quiz_question_selections AS L ON quiz_answer_details.selected_quiz_question_selection_id = L.sort_order AND quiz_answer_details.quiz_question_id = L.quiz_question_id
                                        INNER JOIN quiz_question_selections AS R ON R.quiz_question_id = quiz_questions.id AND R.is_correct = 1
                                        INNER JOIN quizzes on quizzes.id = quiz_answers.quiz_id
                                        WHERE quiz_answer_id = $quiz_answer_id");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
            return $stmt->fetchAll();
        }
        public function update_number_of_correct_answers($values){;
            $id = $_SESSION['quiz_answers_id'];
            $number_of_correct_answers = $values['number_of_correct_answers'];
            $stmt = $this->db->prepare("update quiz_answers set number_of_correct_answers = $number_of_correct_answers where id = $id");
            $res = $stmt -> execute();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
        }
        public function get_list_answers($values){
            $quiz_id = $values['quiz_id'];
            $stmt = $this->db->prepare("SELECT quiz_answers.id AS id,quiz_answers.user_name,quiz_answers.created,quizzes.title,quiz_answers.number_of_correct_answers
                                        FROM quiz_answers
                                        LEFT OUTER JOIN quizzes ON quiz_answers.quiz_id = quizzes.id
                                        WHERE quiz_id = $quiz_id
                                        ORDER BY created DESC");
            $stmt -> execute();
            $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
            $res = $stmt->fetchAll();
            if (0 == count($res)) {
                $stmt = $this->db->prepare("SELECT quizzes.title
                                            FROM quizzes
                                            WHERE id = $quiz_id");
                $stmt -> execute();
                $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
                $res = $stmt->fetchAll();
                $_SESSION['nobody'] = 0;
                return $res;
            }
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            return $res;
        }
        public function get_list_questions($values){
            $quiz_id = $values['quiz_id'];
            $stmt = $this->db->prepare("SELECT quiz_questions.content as content,COUNT(is_correct = 1 or NULL) AS right_answer,COUNT(is_correct = 0 OR NULL) AS wrong_answer,title
                                        FROM quiz_answers
                                        LEFT OUTER JOIN quiz_answer_details ON quiz_answer_details.quiz_answer_id = quiz_answers.id
                                        LEFT OUTER JOIN quiz_question_selections ON quiz_answer_details.selected_quiz_question_selection_id = quiz_question_selections.sort_order AND quiz_question_selections.quiz_question_id = quiz_answer_details.quiz_question_id
                                        LEFT OUTER JOIN quiz_questions on quiz_questions.quiz_id = quiz_answers.quiz_id AND quiz_questions.id = quiz_answer_details.quiz_question_id
                                        LEFT OUTER JOIN quizzes on quiz_answers.quiz_id = quizzes.id
                                        WHERE quiz_answers.quiz_id = $quiz_id
                                        GROUP BY quiz_answer_details.quiz_question_id");
            $stmt -> execute();
            $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
            $res = $stmt->fetchAll();
            if (0 == count($res)) {
                $stmt = $this->db->prepare("SELECT  quiz_questions.content as content,quizzes.title
                                            FROM quiz_questions
                                            LEFT OUTER JOIN  quizzes on quizzes.id = quiz_questions.quiz_id
                                            WHERE quiz_questions.quiz_id = $quiz_id");
                $stmt -> execute();
                $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
                $res = $stmt->fetchAll();
                $_SESSION['nobody'] = 0;
                return $res;
            }
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            return $res;
        }
        public function get_number_question($values){
            $quiz_id = $values['quiz_id'];
            $stmt = $this->db->prepare("SELECT COUNT(id) as count
                                        FROM quiz_questions
                                        WHERE quiz_id = $quiz_id");
            $stmt -> execute();
            $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
            $res = $stmt->fetchAll();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            return $res;
        }
        public function delete(){
            $id = $_SESSION['quiz_answers_id'];
            $stmt = $this->db->prepare("DELETE quiz_answers,quiz_answer_details
                                        FROM quiz_answers
                                        LEFT OUTER JOIN quiz_answer_details on quiz_answers.id = quiz_answer_details.quiz_answer_id
                                        WHERE quiz_answers.id = $id;
                                        ");
            $stmt -> execute();
        }
        public function insert_title() {
            $title_quiz = '"'.$_SESSION['title_quiz'].'"';
            $stmt = $this->db->prepare("insert into quizzes (title) values ($title_quiz)");
            $res = $stmt -> execute();
            if($res === false){
                throw new \App\Exception\DatabaseError();
            }
            $_SESSION['id'] = $this->db->lastInsertId();
            // var_dump($_SESSION['id']);
        }
        public function insert_quiz_questions() {
            for ($n = 1; $n <= $_SESSION['number_of_question'];$n++) {
                $question = '"'.$_SESSION["question$n"].'"';
                var_dump($question);
                // $stmt = $this->db->prepare("insert into quiz_questions (quiz_id,content,sort_order) values ($_SESSION['id'],$question,$n)");
                $id = $_SESSION['id'];
                var_dump($id);
                $stmt = $this->db->prepare("insert into quiz_questions (quiz_id,content,sort_order) values ($id,$question,$n)");
                $res = $stmt -> execute();
                if($res === false){
                    throw new \App\Exception\DatabaseError();
                }
                $right_of_selection = $_SESSION["right_of_selection$n"];
                $quiz_question_id = $this->db->lastInsertId();
                for ($a = 1; $a <= $_SESSION["selection$n"];$a++) {
                    $content = '"'.$_SESSION["selection$n-$a"].'"';
                    if ($a == $right_of_selection) {
                        $stmt = $this->db->prepare("insert into quiz_question_selections (quiz_question_id,content,is_correct,sort_order) values ($quiz_question_id,$content,1,$a)");
                        $res = $stmt -> execute();
                        if($res === false){
                            throw new \App\Exception\DatabaseError();
                        }
                    } else {
                        $stmt = $this->db->prepare("insert into quiz_question_selections (quiz_question_id,content,is_correct,sort_order) values ($quiz_question_id,$content,0,$a)");
                        $res = $stmt -> execute();
                        if($res === false){
                            throw new \App\Exception\DatabaseError();
                        }
                    }
                }
            }
        }

    }

?>
