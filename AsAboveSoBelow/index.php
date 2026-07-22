<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="icons/rembyte.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>as-above--so-below</title>
  </head>
  <body>

  <!-- PHP HAPPENS FIRST (Server-side) -->
<header>
  <!-- MAYBE MAKE THIS A REUSABLE COMPONENET SO WE CAN GLOBALLY ANCHOR IT ON EVERY PAGE?? -->
  <div class="header-container">
<img src="assets/lamp.png" class="lamp" id="left-lamp"alt="Left Lamp" />

<div class="title-container">
  <img src="assets/trippleMoon.svg" alt="Logo" />
      <h1 class="title">As Above <br> So Below</h1>
    </div>

    <img src="assets/lamp.png" class="lamp" id="right-lamp" alt="Right Lamp" />
    </div>
</header>


<!-- HTML -->
<div class="conatiner-fluid">
  <div class="row">
    <div class="col-12">


    <div class="tarot-wheel-container">

  <div class="wheel-center-content">
    <p class="wheel-title">The right match changes everything</p>
    <button class="meet-fate-btn">
      <h3>Meet Your Fate</h3>
    </button>
  </div>

<div class="cards-ring">
  <?php 
    $total_cards = 16;
    for ($i = 0; $i < $total_cards; $i++): 
  ?>

    <div class="wheel-card" style="--i: <?php echo $i; ?>; --total: <?php echo $total_cards; ?>;">
      <div class="tarot-card-loader"></div>
    </div>

  <?php endfor; ?>
</div>
</div>

    </div>
  </div>
</div>

<!-- 3. JAVASCRIPT HAPPENS LAST (Browser-side) -->
  <!-- JS waits for the user to click the container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script type="module" src="script.js"></script>
  </body>
</html>
