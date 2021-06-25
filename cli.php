<?php

define('CLI_SCRIPT', true);

require_once("../../config.php");
require_once("./cli/load.php");

$arguments = $argv;

$command = $arguments[1];
unset($arguments[0]);
unset($arguments[1]);

$commandinstruction = explode(':', $command);
$lib = $commandinstruction[0];
$function = $commandinstruction[1];

$classname = $lib . '_cli';

if (class_exists($classname)) {

    try {
        $params = [];

        foreach ($arguments as $i => $argument) {

            $value = explode('=', $argument);
            $params[$i] =$value[1];
        }

        call_user_func_array([$classname, $function], $params);
    } catch (\Exception $e) {
        throw  $e;
    }
} else {
    throw  new Exception("class $lib not exists");
}