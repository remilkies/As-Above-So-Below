<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="icons/rembyte.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylesheet.css" />
    <title>as-above--so-below</title>
  </head>
  <body>

  <!-- PHP HAPPENS FIRST (Server-side) -->



<!-- HTML -->

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
      <img src="assets/cardBack.png" alt="Card Back">
    </div>
  <?php endfor; ?>
</div>
</div>
<!-- 3. JAVASCRIPT HAPPENS LAST (Browser-side) -->
  <!-- JS waits for the user to click the container -->
    <script type="module" src="script.js"></script>
  </body>
</html>
