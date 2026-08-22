<?php
session_start();
$displayName = $_SESSION['username'] ?? 'Seeker';
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
                    <span>Seeker Sanctum</span>
                  </button>
                  <button class="dashboard-btn" id="saved-btn"><span>Prophecies</span></button>
                </div>

                <button class="submit-btn" id="logout-btn">Logout</button>
              </div>



            </div>

            <div class="dashboard-right window-container">
              <img src="../assets/treeOfLife.png" alt="Stain Glass Window" class="window">
            </div>
          </div>
        </div>


      </section>

      <?php include 'savedReadings.php'; ?>


      <?php include 'chamber.php'; ?>


    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script type="module" src="../js/script.js?v=<php? echo time(); ?>"></script>
</body>

</html>