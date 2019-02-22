<?php

    class Message{
        /**
         * function __constructeur qui contient 3 variables
         * dont le dernier est facultatif
         * @param string $username
         * @param string $message
         * @param DateTime|null $date
         */
        const  LIMIT_USERNAME = 3;
        const  LIMIT_MESSAGE = 10;
        private  $username;
        private  $message;
        private  $date;

        public  static  function  fromJson(string  $json): Message {

            $data = json_decode($json, true);
            return new  self($data['username'], $data['message'], new  DateTime("@". $data['date']));
        }

        public function  __construct(string $username, string $message, ?DateTime $date = null){
            $this->username = $username;
            $this->message = $message;
            $this->date = $date ?: new  DateTime();
        }

        /**
         * @return bool
         */
        public  function  isValid(): bool {
            return empty($this->getErrors());
        }

        /**
         * @return array
         */
        public  function  getErrors(): array {
            $errors =  [];
            if (strlen($this->username)  < self::LIMIT_USERNAME){
                $errors['username'] = "Votre nom est trop court";
            }
            if (strlen($this->message) < self::LIMIT_MESSAGE){
                $errors['message'] = "Votre message est trop court";
            }
            return $errors;
        }

        /**
         * @return string
         */
        public  function  toHTML(): string  {
            $username = htmlentities($this->username);
            $date = $this->date->format('d/m/y a H:i');
            /** @var TYPE_NAME $message */
            $message = htmlentities($this->message);
            /** @var TYPE_NAME $username */
            return " <div class='card indigo lighten-5'>
                        <div class='card-header'>
                            <h5 class='font-weight-bold'><i class='fa fa-user'></i> {$username}</h5>
                        </div>
                        <div class='card-body  rounded-bottom'>
                            <h5>{$message}</h5>
                        </div>
                        <div class='card-footer text-right'>
                            <em><i class='fa fa-dashcube'></i> le {$date}</em>
                        </div>
                    </div><br>";
        }

        public  function  toJson(): string  {

            return json_encode([
                'username' => $this->username,
                'message' => $this->message,
                'date' => $this->date->getTimestamp()
            ]);

        }

    }
