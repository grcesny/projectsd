<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>
<div class="login-box">
  <h2>Login Admin</h2>
  <form action="cek_login.php" method="POST">
    <input
    type="text"
    name="username"
    placeholder="Username"
    required>

    <input
    type="password"
    name="password"
    placeholder="Password"
    required>

    <button type="submit">
      Login
    </button>
  </form>
</div>

</body>
</html>