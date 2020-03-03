<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?= $page_title; ?></title>

  <link rel="stylesheet" href="css/main.css">
</head>
<body>

<header>
<ul>
  <li><a href="/">home</a></li>
  <?php if ($loggedin) : ?>
    <li><a href="/dashboard.php">dashboard</a></li>
    <li><a href="/logout.php">logout</a></li>
  <?php else: ?>
    <li><a href="/login.php">login</a></li>
    <li><a href="/register.php">register</a></li>
  <?php endif; ?>
</ul>
</header>
