<?php
spl_autoload_register(function ($nombre_clase) {
    require_once dirname(dirname(__FILE__)) . '/' . str_replace("\\","/",$nombre_clase) . '.php';
});