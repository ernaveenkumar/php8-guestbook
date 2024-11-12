<?php

declare(strict_types=1);

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT',  'C:'.DS.'xampp'.DS.'htdocs'.DS.'PHP2024'.DS.'Jura'. DS. 'Php8'.DS.'Projects'.DS.'guestbook');

require_once SITE_ROOT. DS .'bootstrap.php';


loadSchema(
  connectionDb(),
  DB_DIR . '/schema.sql'
);


