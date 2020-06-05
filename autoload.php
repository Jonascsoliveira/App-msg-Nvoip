<?php

spl_autoload_register(function ($class){
    $caminho = str_replace('\\','/',$class).'.php';
    require_once($caminho);
});