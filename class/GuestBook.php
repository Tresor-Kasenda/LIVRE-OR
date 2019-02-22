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
   }
