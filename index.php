<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Login page stock obat">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <!-- Data Tables -->
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Login</title>
</head>

<body>

  <div class="login-card mt-5">
    <h2>Login</h2>
    <h3></h3>
    <form action="config/login.php" method="POST" class="login-form">
      <input type="text" name="username" placeholder="Username" required autocomplete="off" />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit" name="login">LOGIN</button>
    </form>
  </div>

</body>

</html>