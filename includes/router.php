<?php
declare(strict_types=1);
const ALLOWED_METHODS = ['GET', 'POST'];
const INDEX_URI = '';
const INDEX_ROUTE = 'index';


function normalizeUri(string $uri):string{

  $uri = strtok($uri, '?');
  $uri = strtolower(trim($uri, '/'));
  return $uri === INDEX_URI ? INDEX_ROUTE : $uri;
}

function getFilePath(string $uri, string $method):string {
  return ROUTES_DIR. '/'. normalizeUri($uri) . '_'. strtolower($method). '.php';

}

function notFound(){
  http_response_code(404);
  echo "404 Not found";
  exit;
}

function badRequest(string $message = 'Bad request'):void{
  http_response_code(400);
  echo $message;
  exit;
}

function serverError(string $message = 'Server error') : void{
  http_response_code(500);
  echo $message;
  exit;
}

function redirect(string $uri){
  header("Location: $uri");
  exit();
}
function dispatch(string $uri, string $method):void{
  // 1. normalize uri: GET/guestbook ->route/guestbook_get.php
  $uri = normalizeUri($uri);
  $method = strtoupper($method);

   // 2. GET|POST - return 404
  if(!in_array($method, ALLOWED_METHODS)){
    notFound();
  }
 
   //3. file path - PHP file path
   $filepath = getFilePath($uri, $method);


   //var_dump($filepath); die;

   if(file_exists($filepath)){
    include($filepath);
    return; // to stop at this point
   }else{
    notFound();
   }
  //4. If this file exists, if not 404
  //5. Handle th route by including the PHP file
}