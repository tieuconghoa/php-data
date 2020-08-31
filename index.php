<?php
session_start();
if (!isset($_SESSION['username'])) {
    $controller = 'account';
    $action = 'login';
} else {
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }
    } else {
        $controller = 'students';
        $action = 'list';
    }
}

require_once('routes.php');
