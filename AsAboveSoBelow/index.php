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
  <?php
    // $tarot_cards = ["The Fool", "The Magician", "The High Priestess"];
    
    // Pick a random card from the array
    // $my_card = $tarot_cards[array_rand($tarot_cards)];

    // $drawn_card_image = "assets/AceCups.png";
    // $card_back_image = "assets/cardBack.png";

// =====================
// RANDOM CUPS >:D
// =====================

  // PHP to find any png that ends with 'Cups'
  $cups_cards = glob("assets/*Cups.png");
  
  
  $random_index = array_rand($cups_cards);

  $drawn_card_image = $cups_cards[$random_index];
  

  // universal card back NEVER TOUCH THIS THERE IS GENUINLY NO REASON TO
  $card_back_image = "assets/cardBack.png";


  ?>


<!-- HTML -->
    <div id="tarot-card-container">
      <div id="tarot-card-flipper">

      <div class="card-face" id="card-back">
        <img src="<?php echo $card_back_image; ?>" alt="Card Back" />
      </div>

      <div class="card-face" id="card-front">
        <img src="<?php echo $drawn_card_image; ?>" alt="Card Front"/>
      </div>

    </div>
    </div>

<!-- 3. JAVASCRIPT HAPPENS LAST (Browser-side) -->
  <!-- JS waits for the user to click the container -->
  <script>
    document.getElementById('tarot-card-container').addEventListener('click', function() {
      const flipper = document.getElementById('tarot-card-flipper');
      flipper.classList.toggle('is-flipped');
    });
  </script>
    <script type="module" src="/src/main.js"></script>
  </body>
</html>
