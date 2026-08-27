<?php

$displayCardsDir = __DIR__ . "/assets/cards/*.png";
if (!glob($displayCardsDir)) {
    $displayCardsDir = "../assets/cards/*.png";
}

$allDisplayCards = glob($displayCardsDir);


if (!empty($allDisplayCards)) {
    $randomCardPath = $allDisplayCards[array_rand($allDisplayCards)];
} else {
    $randomCardPath = "../assets/cardBack.png";
}

$displayFilename = pathinfo($randomCardPath, PATHINFO_FILENAME);
$displayCardBack = "../assets/cardBack.png";


if (!function_exists('splitCamelCase')) {
  function splitCamelCase($string) {
    return preg_replace('/(?<!^)[A-Z]/', ' $0', $string);
  }
}

$displayParts = explode('_', $displayFilename);
if (count($displayParts) === 2) {
  $prefix = strtolower($displayParts[0]);
  $suffix = strtolower($displayParts[1]);
  $knownSuits = ['cups', 'swords', 'wands', 'pentacles'];

  if (in_array($suffix, $knownSuits)) {
    $rankDisplay = ($prefix === '1') ? 'Ace' : ucfirst($displayParts[0]);
    $cardDisplayName = $rankDisplay . ' of ' . ucfirst($displayParts[1]);
  } else {
    $cardDisplayName = splitCamelCase($displayParts[1]);
  }
} else {
  $cardDisplayName = splitCamelCase($displayFilename);
}
?>


<div class="wheel-card display-card-container" style="--i: <?php echo $index; ?>; --total: <?php echo $totalCards; ?>;" data-name="<?php echo $cardDisplayName; ?>">
  <div class="tarot-card-flipper">
    <div class="card-face card-back">
      <img src="<?php echo $displayCardBack; ?>" alt="Card Back" />
    </div>
    <div class="card-face card-front">
      <img src="<?php echo $randomCardPath; ?>" alt="<?php echo $cardDisplayName; ?>" />
    </div>
  </div>
</div>