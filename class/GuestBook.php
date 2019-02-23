<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 22/02/2019
 * Time: 22:58
 */

   class  GuestBook{

       private $files;

       public  function __construct(string $files){

            $directory = dirname($files);
            if (!is_dir($directory)){
                mkdir($directory, 0777, true);
            }
            if (!file_exists($files)){
                touch($files);
            }
            $this->files = $files;
       }

       public  function  addMessage(Message $message) {

           file_put_contents($this->files, $message->toJson() . PHP_EOL, FILE_APPEND);

       }

       public  function  getMessages(): array  {

           $content = trim(file_get_contents($this->files));
           $lines = explode(PHP_EOL, $content);
           $messages = [];
           foreach ($lines as $line){
               $messages[] = Message::fromJson($line);
           }

           return array_reverse($messages);
       }
   }
