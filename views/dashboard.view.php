<h1>Welcome <?= $user->username ?></h1>

<?php if ($vps_created): ?>
<p>new VPS created.</p>
<?php endif; ?>

<form action="/dashboard.php" method="post">
<input type="submit" name="new" value="create new VPS">
</form>

<ul>
  <?php foreach ($vpss as $vps) : ?>
    <li>
        <?= $vps->id; ?> - 
        <?php echo $vps->ipv4 ? $vps-ipv4 : "no ip..."; ?>
    </li>
  <?php endforeach; ?>
</ul>
