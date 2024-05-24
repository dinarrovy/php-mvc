<?php
require_once'../../model/auth_model/register_model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="../../style.css">
</head>
<body>
  <div class="container">
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <h2>Register</h2>
      <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
      <?php } elseif (isset($success)) { ?>
        <p class="success"><?php echo $success; ?></p>
      <?php } ?>
      <input type="text" name="nama" placeholder="Nama" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>

      <p>Sudah punya akun? <a href="../../view/auth_page/login.php">Login disini</a></p>
    </form>
  </div>
</body>
</html>

