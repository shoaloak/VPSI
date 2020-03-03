<?php if (!$created): ?>
  <h1> Register an account</h1>
  
  <form action="/register.php" method="post">
  Name: <input type="text" name="name"><br>
  password: <input type="password" name="password"><br>
  <input type="submit" value="register">
  </form>
<?php else : ?>
  <h1>Successfully created account!</h1>
<?php endif; ?>
