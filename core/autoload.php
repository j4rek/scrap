<?php
spl_autoload_register(function ($nombre_clase) {
    require_once $_SERVER['DOCUMENT_ROOT'] . str_replace("\\","/",$nombre_clase) . '.php';
});