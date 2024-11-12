<?php 

$entries = getMessage(connectionDb());

renderView('guestbook_get', data:['messages' => $entries]); //; //data:compact($message)