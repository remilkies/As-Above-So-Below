<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/../backend/oracle.php';

$displayName = $_SESSION['display_name'] ?? 'Seeker';
$userId = $_SESSION['user_id'] ?? null;

if ($userId) {

    $stmt = $pdo->prepare("SELECT * FROM readings WHERE user_id = :user_id ORDER BY id DESC");
    $stmt->execute(['user_id' => $userId]);
    $savedReadings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // incase of ghosts -_-
    $savedReadings = []; 
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
  <title>As Above So Below</title>
</head>

<body>

  <div class="viewport">
    <div class="stage" id="stage">

      <section class="chamber top-chamber">
        
        <div class="chamber-header">
          <div class="corner-wrapper">
            <img src="../assets/chamberCorner.svg" class="corner" id="corner-left" alt="Chamber Corner">
          </div>

          <div class="corner-wrapper">
            <img src="../assets/chamberCorner.svg" class="corner" id="corner-right" alt="Chamber Corner">
          </div>

        </div>

        <div class="chamber-content">
          <div class="moon-container">
            <img src="../assets/moonWindow.png" alt="Moon Window" class="moon-window">
          </div>

          <div class="dashboard-container">

            <div class="dashboard-left window-container">
              <img src="../assets/treeOfLife.png" alt="Stain Glass Window" class="window">
            </div>

            <div class="dashboard-center">

              <div class="dashboard-controls">
                <h2 class="user-title">Welcome, <?php echo htmlspecialchars($displayName); ?></h2>

                <div class="dashboard-buttons">
                  <button class="dashboard-btn" id="descend-btn">
                  <!-- <img src="../assets/your-indicator.svg" alt="" class="hover-indicator"> -->
                    <span>Reading Chamber</span>
                  </button>
                  <button class="dashboard-btn" id="saved-btn">
                  <!-- <img src="../assets/your-indicator.svg" alt="" class="hover-indicator"> -->
                    <span>Inner Sanctum</span>
                </button>
                </div>

                <button class="submit-btn" id="logout-btn">Logout</button>
              </div>



            </div>

            <div class="dashboard-right window-container">
              <img src="../assets/treeOfLife.png" alt="Stain Glass Window" class="window">
            </div>
          </div>
        </div>

        <div id="logout-modal" class="aasb-modal-overlay" style="display: none;">
    <div class="aasb-modal-box">
        <h3> ݁₊ ⊹ . ݁˖Farewell <?php echo htmlspecialchars($displayName); ?> ݁₊ ⊹ . ݁˖</h3>
        <p>Departing us so soon Seeker? Oh well, you're presence is welome back anytime. See you at the next crossroads</p>
        <div class="aasb-modal-actions">
            <button id="modal-cancel-btn" class="dashboard-btn">
            <!-- <img src="../assets/your-indicator.svg" alt="" class="hover-indicator"> -->
              <span>Stay</span>
            </button>
            <button id="modal-confirm-btn" class="dashboard-btn">
            <!-- <img src="../assets/your-indicator.svg" alt="" class="hover-indicator"> -->
              <span>Logout</span>
            </button>
        </div>
    </div>
</div>

      </section>

      <?php include 'sanctum.php'; ?>


      <?php include 'chamber.php'; ?>


    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script type="module" src="../js/script.js?v=<php? echo time(); ?>"></script>
</body>

</html>