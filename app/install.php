<?php

define ('ROOT', realpath(__DIR__ . '/..'));

ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('realpath_cache_ttl', '30');
ini_set('realpath_cache_size', '102400');

require_once (ROOT . '/vendor/autoload.php');

\Helpers\App::init();