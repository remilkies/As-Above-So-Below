<?php

$displayCardsDir = __DIR__ . "/assets/cards/*.png";
if (!glob($displayCardsDir)) {
    $displayCardsDir = "../assets/cards/*.png";
}

$allDisplayCards = glob($displayCardsDir);


if (!empty($allDisplayCards)) {
    $randomCardPath = $allDisplayCards[array_rand($allDisplayCards)];
} else {
    $randomCardPath = "../assets/cards/1_TheMagician.png";
}


$displayCardBack = "../assets/cardBack.png";


?>


<div class="wheel-card display-card-container" style="--i: <?php echo $index; ?>; --total: <?php echo $totalCards; ?>;">
  <div class="tarot-card-flipper">
    <div class="card-face card-back">
      <img src="<?php echo $displayCardBack; ?>" alt="Card Back" />
    </div>
    <div class="card-face card-front">
      <img src="<?php echo $randomCardPath; ?>" alt="<?php echo $cardDisplayName; ?>" />
    </div>
  </div>
</div>