<?php

//AUTOLOADS

// ACESSANDO A PASTA DO BANCO DE DADOS
spl_autoload_register(function($nameClass){
    $dir = "db";
    $file =".." .DIRECTORY_SEPARATOR  . $dir .DIRECTORY_SEPARATOR.$nameClass.".php";
    if (file_exists($file)){
        require_once($file);
    }
});
//ACESSANDO A PASTA DAS CLASSES DE CADASTROS
spl_autoload_register(function($nameClass){
    $dir = "Cadastros";
    $file =".." .DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $nameClass . ".php";
    if (file_exists($file)){
        require_once($file);
    }
});
// ACESSANDO A PASTAS DAS INTERFACES
spl_autoload_register(function($nameClass){
    $dir = "FrontEnd";
    $file = $dir . DIRECTORY_SEPARATOR . $nameClass . ".php";
    if (file_exists($file)){
        require_once($file);
    }
});

//ACESSANDO A PASTA DAS CLASSES DE CADASTROS
spl_autoload_register(function($nameClass){
    $dir = "funcionalidades";
    $file =".." .DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $nameClass . ".php";
    if (file_exists($file)){
        require_once($file);
    }
});


spl_autoload_register(function($nameClass){
    $dir = "funcionalidades";
    $file = $dir . DIRECTORY_SEPARATOR . $nameClass . ".php";
    if (file_exists($file)){
        require_once($file);
    }
});

spl_autoload_register(function($nameClass){
    $dir = "Cadastros";
    $file = $dir . DIRECTORY_SEPARATOR . $nameClass . ".php";
    if (file_exists($file)){
        require_once($file);
    }
});

spl_autoload_register(function($nameClass){
    $dir = "db";
    $file = $dir . DIRECTORY_SEPARATOR . $nameClass . ".php";
    if (file_exists($file)){
        require_once($file);
    }
});

?>