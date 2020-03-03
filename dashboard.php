<?php
require 'config.php';
require 'functions.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'User.php';
require 'VPS.php';

session_start();
if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'][0];
        $loggedin = True;
}

$conn = new Connection();
$db = $conn->make($config['database']);
$qb = new QueryBuilder($db, $config['salt']);

if (isset($_POST['new'])) {
    // create new vps database entry for id
    $vpsid = $qb->createVPS($user->id);

    if (!$vpsid) {
        dd('something went wrong!');
    }

    // create real VPS
    $ipv4 = [];
    //TODO STEFFAN
    exec('/opt/vps/test.sh '.$vpsid, $ipv4);

    // insert assigned ip(s)
    $qb->fillipv4VPS($vpsid, $ipv4);

    $vps_created = True;
    //print_r($ipv4);
}
$vpss = $qb->getVPSs($user->id);
//print_r($vpss);

// GUI
$page_title = 'VPSI - Very Personal Space Invaders';
require 'views/header.view.php';
require 'views/dashboard.view.php';
require 'views/footer.view.php';
