<!-- i hate my life -->

<?php //this is suprisingly important

$arcana = [
    'major' => [
        'name' => 'Major Arcana',
        'meaning' => 'the grand narrative of life, spiritual lessons, and transformative experiences'
    ],
    'minor' => [
        'name' => 'Minor Arcana',
        'meaning' => 'the day-to-day experiences, challenges, and opportunities that shape our journey'
    ]
];

$suits = [
    'cups' => [
        'name' => 'Cups',
        'element' => 'Water',
        'meaning' => 'navigating the deep waters of emotion, relationships, and intuitive connections'
    ],
    'swords' => [
        'name' => 'Swords',
        'element' => 'Air',
        'meaning' => 'the sharp edge of intellect, communication, and mental conflict'
    ],
    'wands' => [
        'name' => 'Wands',
        'element' => 'Fire',
        'meaning' => 'the blazing fires of passion, creative inspiration, and bold willpower'
    ],
    'pentacles' => [
        'name' => 'Pentacles',
        'element' => 'Earth',
        'meaning' => 'the grounded roots of material abundance, practical foundations, and physical reality'
    ]
];
// i understand why people use ai...this is the worst most tedious thing i've ever lived through 
$numerology = [
    '1' => [
        'name' => 'Ace (One)',
        'meaning' => 'new beginnings, pure potential, raw energy, and fresh opportunities'
    ],
    '2' => [
        'name' => 'Two',
        'meaning' => 'balance, duality, partnerships, and making choices'
    ],
    '3' => [
        'name' => 'Three',
        'meaning' => 'a time of collaborative energy, creative growth, and outward expression'
    ],
    '4' => [
        'name' => 'Four',
        'meaning' => 'stability, solid foundations, structure, and resting before the next step'
    ],
    '5' => [
        'name' => 'Five',
        'meaning' => 'a period of instability, chaotic change, and challenging transitions'
    ],
    '6' => [
        'name' => 'Six',
        'meaning' => 'harmony, restoration, healing, and finding balance after a struggle'
    ],
    '7' => [
        'name' => 'Seven',
        'meaning' => 'spiritual growth, introspection, assessment, and seeking deeper truths'
    ],
    '8' => [
        'name' => 'Eight',
        'meaning' => 'mastery, action, momentum, and achieving material or practical success'
    ],
    '9' => [
        'name' => 'Nine',
        'meaning' => 'fruition, nearing completion, inner wisdom, and culminating energy'
    ],
    '10' => [
        'name' => 'Ten',
        'meaning' => 'completion, the end of a cycle, absolute fulfillment, and making way for the new'
    ]
];

$ranks = [
    'page' => [
        'name' => 'Page',
        'meaning' => 'curiosity, new messages, exploration, and the fresh spark of learning'
    ],
    'knight' => [
        'name' => 'Knight',
        'meaning' => 'action, momentum, and the pursuit of a specific vision or goal'
    ],
    'queen' => [
        'name' => 'Queen',
        'meaning' => 'internal mastery, emotional wisdom, nurturing presence, and deep self-assurance'
    ],
    'king' => [
        'name' => 'King',
        'meaning' => 'external mastery, authority, strategic vision, and command over their realm'
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
        ],
        'tower' => [
            'arcana' => 'major',
            'card_meaning' => "If it all falls apart,consider that maybe it wasn't that well built to begin with."
        ]
    ]
];

?>

<?php

function getCardData($key, $suit, $customMeanings, $numerology, $ranks, $suits, $arcana, $type = 'minor') {
    $rankOrNum = isset($numerology[$key]) ? $numerology[$key] : $ranks[$key];

    return [
        'card_id'        => "{$key}_{$suit}",
        'arcana_type'    => $type,
        'arcana_name'    => $arcana[$type]['name'],
        'arcana_meaning' => $arcana[$type]['meaning'],
        'suit_name'      => $suits[$suit]['name'],
        'suit_meaning'   => $suits[$suit]['meaning'],
        'number_name'    => $rankOrNum['name'],
        'num_meaning'    => $rankOrNum['meaning'],
        'card_meaning'   => getCardMeaning($key, $suit, $customMeanings, $numerology, $ranks, $suits)
    ];
}
function generateSynthesis($cardA, $cardB) {
    
    if ($cardA['arcana_type'] === $cardB['arcana_type']) {
        $arcanaParagraph = "This reading is rooted in the **" . $cardA['arcana_name'] . "**, highlighting " . $cardA['arcana_meaning'] . ".";
    } else {
        $arcanaParagraph = "This reading bridges the spiritual scope of the **" . $cardA['arcana_name'] . "** (" . $cardA['arcana_meaning'] . ") with the grounded nature of the **" . $cardB['arcana_name'] . "** (" . $cardB['arcana_meaning'] . ").";
    }

    $suitParagraph = "Your reading is governed by the collision of **" . $cardA['suit_name'] . " and " . $cardB['suit_name'] . "**. " .
        "This cosmic alignment forces you into a space of " . $cardA['suit_meaning'] . ", " .
        "which is actively clashing with " . $cardB['suit_meaning'] . ".";

    $numParagraph = "The underlying numerological current pairs the progress of the **" . $cardA['number_name'] . "** " .
        "with the testing energy of the **" . $cardB['number_name'] . "**. " .
        "The universe indicates that " . $cardA['num_meaning'] . " is currently being disrupted by " . $cardB['num_meaning'] . ".";

    $prophecyParagraph = "Ultimately, these energies manifest as a dual truth: you are experiencing " . $cardA['card_meaning'] . ", " .
        "yet you must prepare for " . $cardB['card_meaning'] . ". **The path forward requires balancing both.**";

    return [
        'arcana'   => $arcanaParagraph,
        'suits'    => $suitParagraph,
        'numbers'  => $numParagraph,
        'prophecy' => $prophecyParagraph
    ];


    //AJAJAJAJAJAJAJAX
}if (isset($_POST['cardA']) && isset($_POST['cardB'])) {
    $cardA_id = $_POST['cardA'];
    $cardB_id = $_POST['cardB'];

    // function to retrieve card data based on the card ID >:D (please end my suffering)
    $cardA_data = getCardData($cardA['key'], $cardA['suit'], $customMeanings, $numerology, $ranks, $suits, $arcana, $cardA['type']);
    $cardB_data = getCardData($cardB['key'], $cardB['suit'], $customMeanings, $numerology, $ranks, $suits, $arcana, $cardB['type']);


    $reading = generateSynthesis($cardA_data, $cardB_data);

    echo "<p>" . $reading['arcana'] . "</p>";
    echo "<p>" . $reading['suits'] . "</p>";
    echo "<p>" . $reading['numbers'] . "</p>";
    echo "<p>" .$reading['prophecy'] . "</p>";

    exit; //stop script so we don't spill the secrets of the whole universe
} 


?>
<!-- generateSynthesis() and echo $_POST['cardA'] and $_POST['cardB'] -->