<?php

    class Message{
        /**
         * function __constructeur qui contient 3 variables
         * dont le dernier est facultatif
         * @param string $username
         * @param string $message
         * @param DateTime|null $date
         */

        private  $username;
        private  $message;

        public function  __construct(string $username, string $message, ?DateTime $date = null){

            $this->username = $username;
            $this->message = $message;
        }

        /**
         * @return bool
         */
        public  function  isValid(): bool {
            return strlen($this->username) >=3 && strlen($this->message) >=15 ;
        }

        public  function  getErrors(): array {
            $errors =  [];
            if (strlen($this->username)  < 3){
                $errors['username'] = "Votre nom est trop court";
            }
            if (strlen($this->message) < 10){
                $errors['message'] = "Votre message est trop court";
            }
        }



    }