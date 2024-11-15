<?php

function exceptionHandler(Throwable $exception){

  $message = "Uncaught excption (". get_class($exception) ."): ". $exception->getMessage() . "in file: ". $exception->getFile(). "on line: ". $exception->getLine();
  error_log($message);

  serverError("An unexpected error occured. Please try again later.");
}

function errorHandler(int $errorno, string $errstr, string $errfile, int $errline):bool{
  $message = "Error [$errorno] $errstr on line $errline in file $errfile";

  error_log($message);
  serverError("An expected error occurred. Please try again later.");
  return true;
}