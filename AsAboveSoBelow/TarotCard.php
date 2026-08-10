<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
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
//__DIR__ is a magic sonstant that makes this work from any file >:D
$allCards = glob(__DIR__ . "/assets/cards/*.png");

if (empty($allCards)) {
  $allCards = glob("../assets/cards/*.png");
}
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

//no more fatal error safty cheack :P
if (!empty($remainingCards)) {

  $drawn_card_path = $remainingCards[array_rand($remainingCards)];

  $_SESSION['drawn_cards'][] = $drawn_card_path;
} else {
  // ULTIMATE FALL BACK INCASE I ACCIDENTLY DELETE THE WHOLE ASSET FOLDER
  $drawn_card_path = "../assets/cardBack.png";
}

// to get the filename for the js attribute stuff
$filename = pathinfo($drawn_card_path, PATHINFO_FILENAME);

// ace = 1, just in case
if (strpos($filename, 'ace') === 0) {
  $filename = str_ireplace('ace', '1', $filename);
}

// Mark it as drawn so it can't be picked again
// $_SESSION['drawn_cards'][] = $drawn_card; cheak line 56
// universal card back NEVER TOUCH THIS THERE IS GENUINLY NO REASON TO
$card_back = "../assets/cardBack.png";


?>

<div class="tarot-card-container spread-card" data-image="<?php echo $drawn_card_path; ?>" data-id="<?php echo $filename; ?>" data-name="<?php echo $filename; ?>">
  <div class="tarot-card-flipper">

    <div class="card-face card-back">
      <img src="<?php echo $card_back; ?>" alt="Card Back" />
    </div>

    <div class="card-face card-front">
      <img src="<?php echo $drawn_card_path; ?>" alt="Card Front" />
    </div>

  </div>
</div>