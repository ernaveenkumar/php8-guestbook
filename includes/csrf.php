<?php

declare(strict_types=1);

const CSRF_TOKEN_LENGTH = 32;
const CSRF_TOKEN_LIFETIME = 60 * 30; //30 minutes


function generateCsrfToken(){
  $token = bin2hex(random_bytes(CSRF_TOKEN_LENGTH));
  $_SESSION['csrf_token'] = $token;
  $_SESSION['csrf_token_time'] = time();
  return $token;
}

function getCsrfTokenAndTime(): array{
  return [
    $_SESSION['csrf_token'] ?? null,
    $_SESSION['csrf_token_time'] ?? null
  ];
}

function setCsrfTokenAndTime(?string $token):void{

  if($token ===null){
    unset(
      $_SESSION['csrf_token'],
      $_SESSION['csrf_token_time']
    );
    return;
  }

  //otherwise generate new token
  $_SESSION['csrf_token'] = $token;
  $_SESSION['csrf_token_time'] = time();
}

function isTokenExpired(?int $time): bool{

  return $time === null || (time() - $time) > CSRF_TOKEN_LIFETIME;

}
function getCurrentCsrfToken(): string{

  [$token, $time] = getCsrfTokenAndTime();



  if(!isset($token, $time) || isTokenExpired($time)){
    return generateCsrfToken();
  }
  return $_SESSION['csrf_token'];
}
function validateCsrfToken(?string $csrf_token): bool{


  [$generatedToken, $time] = getCsrfTokenAndTime();

  if(!isset($generatedToken, $time)){
    return false;
  }

  if(isTokenExpired($time)){
    setCsrfTokenAndTime(null);
        return false;
  }

  //Validate the token 

  $valid = hash_equals($generatedToken, $csrf_token ?? '');

  if($valid){
    generateCsrfToken();
  }
  return $valid;
}

