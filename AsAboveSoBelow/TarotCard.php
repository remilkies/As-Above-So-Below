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
  // $cups_cards = glob("assets/*Cups.png");
  
  
  // $random_index = array_rand($cups_cards);

  // $drawn_card_image = $cups_cards[$random_index];
  
  $allCards = glob("assets/cards/*.png");
  
  
  // $random_index = array_rand($allCards);

  // $drawn_card_image = $allCards[$random_index];
  
  // drawn cards session tracker
  if (!isset($_SESSION['drawn_cards'])) {
    $_SESSION['drawn_cards'] = [];
}

// Filter already  drawn
$remainingCards = array_diff($allCards, $_SESSION['drawn_cards']);


if (empty($remainingCards)) {
    $_SESSION['drawn_cards'] = [];
    $remainingCards = $allCards;
}


$drawn_card = $remainingCards[array_rand($remainingCards)];

// Mark it as drawn so it can't be picked again
$_SESSION['drawn_cards'][] = $drawn_card;
  // universal card back NEVER TOUCH THIS THERE IS GENUINLY NO REASON TO
  $card_back = "assets/cardBack.png";


  ?>

<div class="tarot-card-container spread-card" data-image="<?php echo $drawn_card; ?>">
      <div class="tarot-card-flipper">

      <div class="card-face card-back">
        <img src="<?php echo $card_back; ?>" alt="Card Back" />
      </div>

      <div class="card-face card-front">
        <img src="<?php echo $drawn_card; ?>" alt="Card Front"/>
      </div>

    </div>
    </div>