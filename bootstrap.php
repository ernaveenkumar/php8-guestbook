<?php

require_once __DIR__ . '/error_handling.php';
error_reporting(E_ALL);
set_exception_handler('exceptionHandler');
//set_error_handler();
//const SITE_ROOT = 'C:'.DS.'xampp'.DS.'htdocs'.DS.'PHP2024'.DS.'Jura'. DS. 'Php8'.DS.'Projects'.DS.'guestbook';
const INCLUDES_DIR = __DIR__ .'/includes';
const ROUTES_DIR =  __DIR__ . '/routes';
const TEMPLATES_DIR = __DIR__ .'/templates';
const DB_DIR = __DIR__ .'/db';

require_once INCLUDES_DIR. '/router.php';
require_once INCLUDES_DIR. '/view.php';
require_once INCLUDES_DIR. '/db.php';
require_once INCLUDES_DIR. '/flash.php';
require_once INCLUDES_DIR. '/csrf.php';

//enable error. In modern PHP this is disabled by default

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
