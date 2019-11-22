<?php

    namespace MyApp;

    class Controller {

        private $_errors;
        private $_values;

        public function __construct() {
            $this->_errors = new \stdClass();
            $this->_values = new \stdClass();
        }

        protected function setValues($key, $value) {
            $this->_values->$key = $value;
        }

        public function getValues() {
            return $this->_values;
        }

        protected function setErrors($key, $error) {
            $this->_errors->$key = $error;
        }

        public function getErrors($key){
            return isset($this->_errors->$key) ? $this->_errors->$key : ' ';
        }

        protected function hasError() {
            return !empty(get_object_vars($this->_errors));
        }

        public function firstvalidate($n = null) {
            if (trim($n) == "" ) {
                $this->setErrors('error','please enter');
                return;
            }
            if (!preg_match('/\A[a-zA-Z0-9 ]+\z/',$n)) {
                $this->setErrors('error','You are using wrong words,only number and alphabet can be accepted');
                return;
            }
            if (mb_strlen($n)>=10 ||mb_strlen($n)<=3) {
                $this->setErrors('error','it should be less than 10 and more than 3');
                return;
            }
        }
    }
