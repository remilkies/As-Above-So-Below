<!-- i hate my life -->

<?php //this is suprisingly important

$suits = [
    'cups' => [
        'name' => 'Cups',
        'meaning' => 'navigating the deep waters of emotion, relationships, and intuitive connections'
    ],
    'swords' => [
        'name' => 'Swords',
        'meaning' => 'the sharp edge of intellect, communication, and mental conflict'
    ],
    'wands' => [
        'name' => 'Wands',
        'meaning' => 'lalalalA'
    ],
    'pentacles' => [
        'name' => 'Pentacles',
        'meaning' => 'lalalalA'
    ]
];
// i understand why people use ai...this is the worst most tedious thing i've ever lived through 
$ranks = [
    '3' => [
        'name' => 'Three',
        'meaning' => 'a time of collaborative energy, creative growth, and outward expression'
    ],
    '5' => [
        'name' => 'Five',
        'meaning' => 'a period of instability, chaotic change, and challenging transitions'
    ]
];

$numbers = [
    'knight' => [
        'name' => 'Knight',
        'meaning' => 'action, momentum, and the pursuit of a specific vision or goal'
    ]
];

$cards = [
    $card = [
    '3_cups' => [
        'suit' => 'cups',
        'rank' => '3',
        'card_meaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '5_swords' => [
        'suit' => 'swords',
        'rank' => '5',
        'card_meaning' => 'a hollow victory won at a high cost, urging you to choose your battles wisely'
    ]
]
    ];

    ?>

    <?php
function generateSynthesis($cardA, $cardB) {

    $suitParagraph = "Your reading is governed by the collision of **".$cardA['suit_name']." and ".$cardB['suit_name']. "**. " .
                    "This cosmic alignment forces you into a space of ".$cardA['suit_meaning'].", " .
                    "which is actively clashing with " . $cardB['suit_meaning'] . ".";

    $numParagraph = "The underlying numerological current pairs the progress of the **" . $cardA['number_name'] . "** " .
                    "with the testing energy of the **" . $cardB['number_name'] . "**. " .
                    "The universe indicates that " . $cardA['num_meaning'] . " is currently being disrupted by " . $cardB['num_meaning'] . ".";


    $prophecyParagraph = "Ultimately, these energies manifest as a dual truth: you are experiencing " . $cardA['card_meaning'] . ", " .
                         "yet you must prepare for " . $cardB['card_meaning'] . ". **The path forward requires balancing both.**";

    return [
        'suits' => $suitParagraph,
        'numbers' => $numParagraph,
        'prophecy' => $prophecyParagraph
    ];
}
?>

<!-- now all you need to do is add a question mark >:D -->
<!-- <php
$synthesis = generateSynthesis($cardA, $cardB);
echo $synthesis['suits'];
echo $synthesis['numbers'];
echo $synthesis['prophecy'];
?>-->

<!-- // or echo individually but we'll se what happens ig -->
<!-- // $reading = generateSynthesis($cards['3_cups'], $cards['5_swords']); -->



<?php foreach ($cards as $id => $cardData): ?>

    <a href="index.php?cardA=<?php echo $id; ?>">
        <div class="tarot-card">
        <img src="/cardImg" alt="<?php echo $cardData['name']; ?>"> 
        <?php echo $cardData['name']; ?> 
            </div>
    </a>
    
<?php endforeach; ?>

<?php

$cardA = null;


if (isset($_GET['cardA'])) {
    // Grabbing card ID's from the URL buuuuut it refreshes the page after every click soooo maybeee figure somthing else out O_O
    $cardA = $_GET['cardA'];
    echo "You selected: " . $cardA; 
}
?>

<?php
$cardA = $_GET['cardA'] ?? null; 
$cardB = $_GET['cardB'] ?? null;


if ($cardA && $cardB) {
    $reading = generateSynthesis($cardA, $cardB);
    // echo $reading; echo only used for strings AND NOTHING ELSE
}
?>

<?php foreach ($cards as $id => $cardData): ?>

    <?php 
    
    if (!$cardA) {
        $link = "?cardA=" . $id;
    } 
    
    else {
        $link = "?cardA=" . $cardA . "&cardB=" . $id;
    }
    ?>

    <a href="<?php echo $link; ?>">
        <div class="tarot-card">
            <?php echo $cardData['name']; ?>
        </div>
    </a>

<?php endforeach; ?>