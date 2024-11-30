<?php
    spl_autoload_register(function ($class) {
        if(file_exists('./APP/' . $class . '.php')){
            include './APP/' . $class . '.php';
        }
    });
    spl_autoload_register(function ($class) {
        if(file_exists('./APP/race/' . $class . '.php')){
            include './APP/race/' . $class . '.php';
        }
    });
    spl_autoload_register(function ($class) {
        if(file_exists('./APP/role/' . $class . '.php')){
            include './APP/role/' . $class . '.php';
        }
    });
    spl_autoload_register(function ($class) {
        if(file_exists('./APP/arme/' . $class . '.php')){
            include './APP/arme/' . $class . '.php';
        }
    });
