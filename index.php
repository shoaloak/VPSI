<?php
session_start();
if (isset($_SESSION['user'])) {
    $loggedin = True;
}

$page_title = 'VPSI - Very Personal Space Invaders';

require 'config.php';
require 'functions.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';

require 'views/header.view.php';
require 'views/homepage.view.php';
echo "<p>10/10 service, much secure, wow</p>";
require 'views/footer.view.php';
