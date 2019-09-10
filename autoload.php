<?php

function app_autoloader($class){
    include 'controllers/'.$class. '.php';
}

spl_autoload_register('app_autoloader');