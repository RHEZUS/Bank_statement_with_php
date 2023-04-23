<?php

$root = dirname(__DIR__).DIRECTORY_SEPARATOR;

define('APP_PATH', $root.'app'.DIRECTORY_SEPARATOR);
define('FILE_PATH',$root.'transaction_files'.DIRECTORY_SEPARATOR);
define('VIEW_PATH', $root.'views'.DIRECTORY_SEPARATOR);

require APP_PATH."app.php";

require APP_PATH.'helper.php';

$transactions = get_scanFile(FILE_PATH);

$result = calculate($transactions);


require VIEW_PATH.'view.php';


