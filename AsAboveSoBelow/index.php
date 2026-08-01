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



    <img src="assets/lamp.png" class="lamp" id="right-lamp" alt="Right Lamp" />
    </div>
</header>


<!-- HTML -->
<div class="conatiner-fluid">
  <div class="row">
    <div class="col-12">


    <div class="tarot-wheel-container">

  <div class="wheel-center-content">
  <div class="title-container">
  <img src="assets/trippleMoon.svg" alt="Logo" />
      <h1 class="title">As Above <br> So Below</h1>
    </div>
    <p class="wheel-title">The right match changes everything</p>
    <button class="meet-fate-btn" onclick="window.location.href='pages/login.php';">
      <h3>Meet Your Fate</h3>
    </button>
  </div>

<div class="cards-ring">
<?php 
    $allCards = glob("assets/cards/*.png");
    shuffle($allCards); 

    $total_cards = 16;
    $drawnCards = array_slice($allCards, 0, $total_cards); 
    $card_back = "assets/cardBack.png";

    for ($i = 0; $i < $total_cards; $i++): 
      $drawn_card = $drawnCards[$i];
  ?>

    <div class="wheel-card" style="--i: <?php echo $i; ?>; --total: <?php echo $total_cards; ?>;">
      <div class="tarot-card-loader">

        <?php include 'TarotCard.php'; ?>
      </div>
    </div>

  <?php endfor; ?>
</div>
</div>

<section class="app-info-container">

<div class="info-container">
  <div class="container-fluid">


  <div class="info-content">
    <div class="info-text">
      <h2>The Hands of the Universe</h2>
      <p>The admin is not seen for no moderation is required, the movement of the cosmos is your only hope</p>
    </div>
<div class="row">
  <div class="col-md-6">
    <div class="info-text">
      <h2>The Right Match
      Changes Everything</h2>
      <p>There are no mistakes and no coincidences, each choice has a meaning but can be turned upsidedonwn when paired with  anouther</p>
    </div>

    <div class="info-text">
      <h2>But Fate is not Certain</h2>
      <p>The universe is forever moving for times arrow only marches foreward. Fates drawn will expire wintin 7 days of drawing,</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="info-img">
      <img src="assets/twoCards.png" alt="Two Cards">
    </div>
  </div>
</div>
</div>  
</div>
</div>
</section>
    </div>
  </div>
</div>
<footer>
  <div id="footer-container">
    <div id="footer">
    <img src="assets/rembyte.svg"alt="REMByte Logo" />
    <h1>Brought to you by REMByte</h1>
  </div>
  </div>
</footer>

<!-- 3. JAVASCRIPT HAPPENS LAST (Browser-side) -->
  <!-- JS waits for the user to click the container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script type="module" src="script.js"></script>
  </body>
</html>
