<?php
session_start();

include('core/autoload.php');
$path = getcwd().'/';
$path = str_replace('\\', '/', $path);
$path = preg_replace('/^.+\/htdocs\//', '/', $path);
$path = preg_replace('/\/+/', '/', $path);
define('BASE', $path);

require("core/phpqrcode/qrlib.php");
