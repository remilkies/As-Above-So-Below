<?php
session_start();

require_once __DIR__ . '/../backend/oracle.php';

$error_message = '';
$active_tab = 'login';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? 'login';

  try {

    if ($action === 'login' && !empty($_POST['username']) && !empty($_POST['password'])) {
      $active_tab = 'login';
      $username = trim($_POST['username']);
      $password = $_POST['password'];

      $stmt = $pdo->prepare("SELECT id, username, display_name, password_hash FROM users WHERE username = :username");
      $stmt->execute(['username' => $username]);
      $user = $stmt->fetch();

      if ($user && password_verify($password, $user['password_hash'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['display_name'] = $user['display_name'];

        header('Location: dashboard.php');
        exit;
      } else {
        $error_message = "The Oracle does not recognise the uninitiated.";
      }
    }


    // ================================
    // REGISTRATION RITUAL 
    // ================================

    if ($action === 'register' && !empty($_POST['username']) && !empty($_POST['display_name']) && !empty($_POST['password'])) {
      $active_tab = 'register';
      $username = trim($_POST['username']);
      $displayName = trim($_POST['display_name']);
      $password = $_POST['password'];


      $cheakStmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
      $cheakStmt->execute(['username' => $username]);

      if ($cheakStmt->rowCount() > 0) {
        $error_message = "That username is already bound to anouther seeker...";
      } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertStmt = $pdo->prepare("
          INSERT INTO users (username, display_name, password_hash)
          VALUES (:username, :display_name, :password)
          ");

        $insertStmt->execute([
          'username' => $username,
          'display_name' => $displayName,
          'password' => $hashedPassword
        ]);

        // AUTO LOGIN BECUASE WE CARE ABOUT USER JOURNEY AND MAKING LIFE EASY FOR THEM TO USE >:D
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        $_SESSION['display_name'] = $displayName;


        header('Location: dashboard.php');
        exit;
      }
    }
  } catch (\PDOException $e) {
    error_log("🔮 Initiation failed: " . $e->getMessage());
    $error_message = "You seek the Oracle but the Oracle doesn't seek you. Try again.";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="../icons/moon-icon.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/stylesheet.css" />
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

      <!-- register.login tab -->
       <div class="auth-tabs">
        <button type="button" class="tab-btn <?php echo $active_tab === 'login' ? 'active' : ''; ?>" id="tab-login">Login</button>
        <!-- bottomboarder be gradieint like inderline the thing and maybe add a littler indicator when you hover over it...think about that -->
         <button type="button" class="tab-btn <?php echo $active_tab === 'register' ? 'active' : ''; ?>" id="tab-rigister">Register</button>
       </div>
        <h2 class="login-title">Login</h2>
        <?php echo $error_message ?>
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
  <script type="module" src="../js/script.js"></script>
</body>

</html>