<?php
//CSRF protection
//var_dump(generateCsrfToken()); die();
if(!validateCsrfToken($_POST['csrf_token'] ?? null)){
  addFlashMessage('error', "Sorry, please send the form again.");
  redirect('/contact');
}
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';


if(empty($name) || empty($email) || empty($message)){
  badRequest("All fields are required");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  badRequest("Email field is invalid");
}



$inserted = insertMessage(connectionDb(), name:$name, email:$email, message:$message);

if($inserted){
  $safename = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  addFlashMessage('success', "Thank you, $safename, for your message. It was stored.");
  redirect('/guestbook');
}

addFlashMessage('error', "Could not store the message, sorry");
redirect('/guestbook');
