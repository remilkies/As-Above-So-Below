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

  <div class="viewport">
    <div class="stage" id="stage">

      <section class="chamber top-chamber">
        <header>

        </header>
        <div class="dashboard-container">
          <div class="dashboard-left">
            <img src="../assets/treeOfLife.png" alt="Stain Glass Window" class="window">
          </div>

          <div class="dashboard-center">
            <h2 class="user-title">Welcome, Seeker</h2>

            <div class="dashboard-buttons">
              <button class="dashboard-btn">Seeker Sanctum</button>
              <button class="dashboard-btn" id="btn-descend">Daily Draw</button>
              <button class="dashboard-btn">Past Prophecies</button>
            </div>


            <button type="submit" class="btn submit-btn">Logout</button>
          </div>

          <div class="dashboard-right">
            <img src="../assets/treeOfLife.png" alt="Stain Glass Window" class="window">
          </div>
        </div>
      </section>
<?php include 'chamber.php'; ?>

    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script type="module" src="script.js"></script>

</html>