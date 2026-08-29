<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="icons/moon-icon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>As Above So Below</title>
  </head>
  <body>

  <!-- PHP HAPPENS FIRST (Server-side) -->
<header>
  <!-- MAYBE MAKE THIS A REUSABLE COMPONENET SO WE CAN GLOBALLY ANCHOR IT ON EVERY PAGE?? -->
  <div class="header-container">

  <div class="lamp-wrapper" id="left-lamp">
    <img src="assets/lamp.png" class="lamp" alt="Left Lamp" />
    <div class="glow"></div>
  </div>



<div class="lamp-wrapper" id="right-lamp">
    <img src="assets/lamp.png" class="lamp" alt="Right Lamp" />
    <div class="glow"></div>
    </div>
</header>


<!-- HTML -->
 <section id="hero-section">
  <div class="border-wrapper">
<div class="conatiner-fluid">
  <div class="row">
    <div class="col-12">


    <div class="tarot-wheel-container">

  <div class="wheel-center-content">
  <div class="title-container">
  <img src="assets/trippleMoon.svg" alt="Logo" />
      <h1 class="title">As Above, So Below</h1>
    </div>
    <p class="wheel-title">
      <span>The right match changes <br></span>
      <span>everything</span></p>
    <button class="meet-fate-btn" onclick="window.location.href='pages/login.php';">
      <h3>Meet Your Fate</h3>
    </button>
  </div>

<div class="cards-ring">
  <!-- OK SO IDEA, WHEN YOU CLICK ON A CARD ON THE HOME PAGE IT FLIPS OVER AND COVERS THE SCREEN (KINDA LIKE A TOAST) AND IT HAS THE LOGIN FORM ON IT (OR JUST A TOAST TELLING YOU TO LOG IN ) >:D -->
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

        <?php include 'components/displayCard.php'; ?>
      </div>
    </div>

  <?php endfor; ?>
</div>
</div>
</div>

</div>
</div>
</div>
</section>

<section id="about-section">


<div class="about-container">
  <div class="container">


  <div class="about-content">
    <div class="about-text">
      <!-- this is the 0nly way i can get the gradient on without it being shared across the whole container  -->
      <h2><span>The </span><span>Hands</span> <span>of</span> <span>the</span> <span>Universe</span></h2>
      <p>The admin is not seen for no moderation is required, <br> the movement of the cosmos is your only hope</p>
    </div>

<div class="row about-row">
  <div class="col-md-6 text-container">

    <div class="about-text">
      <h2><span>The</span> <span>Right</span> <span>Match</span>
      <span>Changes</span> <span>Everything</span></h2>
      <p>There are no mistakes and no coincidences, each choice has a meaning but can be turned on it's head when paired with anouther.</p>
    </div>

    <div class="about-text">
      <h2><span>Time's</span> <span>Arrow</span> <span>Only</span> <span>Marches</span> <span>Forward</span></h2>
      <p>The universe is forever moving, fates conatantly changing. <br>Readings will expire wintin 7 days of drawing.</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="about-img">
      <img src="assets/twoCards.png" alt="Two Cards">
    </div>

  </div>

</div>


</div> 

</div>
</div>
</section>


<footer>
  <div id="footer-container">
    <div id="footer">
    <!-- <img src="assets/rembyte.svg"alt="REMByte Logo" /> -->
    <!-- <h1>Brought to you by REMByte</h1> -->
  </div>
  </div>
</footer>

<!-- 3. JAVASCRIPT HAPPENS LAST (Browser-side) -->
  <!-- JS waits for the user to click the container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script type="module" src="js/script.js"></script>
  </body>
</html>
