<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username'])) {
  $_SESSION['username'] = $_POST['username'];
  header('Location: dashboard.php');
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="icons/rembyte.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../stylesheet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>as-above--so-below</title>
</head>

<body>


  <header>
    <!-- MAYBE MAKE THIS A REUSABLE COMPONENET SO WE CAN GLOBALLY ANCHOR IT ON EVERY PAGE?? -->
    <div class="header-container">

      <div class="lamp-wrapper" id="left-lamp">
        <img src="../assets/lamp.png" class="lamp" alt="Left Lamp" />
        <div class="glow"></div>
      </div>


      <div class="lamp-wrapper" id="right-lamp">
        <img src="../assets/lamp.png" class="lamp" alt="Right Lamp" />
        <div class="glow"></div>
      </div>
    </div>
  </header>
  <div class="border-wrapper">
    <div class="login-container">
      <img src="../assets/trippleMoon.svg" alt="Logo" class="moon-logo">

      <div class="login-form">
        <h2 class="login-title">Login</h2>

        <form action="login.php" method="post" class="login-field-container">
          <div class="login-field">
            <label for="username" class="login-label">Username</label>
            <input type="text" class="login-control" id="username" name="username" required>
          </div>

          <div class="login-field">
            <label for="password" class="login-label">Sacred Key</label>
            <div class="password-container">
              <input type="password" class="login-control" style="border: none; background: transparent; outline: none;" id="password" name="password" placeholder="Enter Sacred Key" required>

              <button type="button" class="toggle-password" id="toggle-btn">
                <img src="../assets/eye-icon.svg" alt="See Password" id="eye-icon" class="eye-icon">
              </button>
            </div>


          </div>


          <button type="submit" class="submit-btn">
            <p>Login</p>
          </button>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script type="module" src="../script.js"></script>
</body>

</html>