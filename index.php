<?php
session_start();
// Include functions and connect to the database using PDO MySQL
include 'functions.php';
pdo_create_database();
pdo_create_accounts_table();
pdo_create_products_table();
pdo_insert_products();
$pdo = pdo_connect_mysql();


// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';
?>