<?php
global $config;
$config = require_once 'config.php';

function basePath()
{
    return __DIR__;
}

function appPath()
{
    return __DIR__.'/app';
}

function styleUrl($filename)
{
    return $GLOBALS['config']['url'].'/styles/'.$filename;
}

function  scriptUrl($filename)
{
    return $GLOBALS['config']['url'].'/scripts/'.$filename;
}