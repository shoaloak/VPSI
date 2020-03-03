<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
}

$page_title = 'VPSI - Very Personal Space Invaders';

require 'config.php';
require 'functions.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';

if (isset($_POST['name']) && isset($_POST['password']) &&
    !empty($_POST['name']) && !empty($_POST['password'])) {

    $conn = new Connection();
    $db = $conn->make($config['database']);
    $qb = new QueryBuilder($db, $config['salt']);

    $created = $qb->createUser($_POST['name'], $_POST['password']);
}

require 'views/header.view.php';
require 'views/register.view.php';
require 'views/footer.view.php';
