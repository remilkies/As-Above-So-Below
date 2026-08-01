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
<img src="../assets/lamp.png" class="lamp"alt="Left Lamp" />
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

        <form action="login.php" method="post" class="login-field">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

        <div class="mb-3">
            <label for="password" class="form-label">Sacred Key</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        </form>

        <button type="submit" class="btn submit-btn">Login</button>
    </div>
  </div>
</div>
  </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script type="module" src="script.js"></script>
  </html>