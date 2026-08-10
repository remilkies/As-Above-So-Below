<!-- i hate my life -->

<?php //this is suprisingly important

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$arcana = [
    'major' => [
        'name' => 'Major Arcana',
        'meaning' => "major milestones and the grand narrative of life, it's spiritual lessons, and transformative experiences"
    ],
    'minor' => [
        'name' => 'Minor Arcana',
        'meaning' => 'the day-to-day experiences, challenges, and opportunities that shape our journey'
    ]
];

// ehhhhhhhhh maybe i'll add an array for the different $elements
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

$rank = [
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
    '5_swords' => [
        'suit' => 'swords',
        'rank' => '5',
        'arcana' => 'minor',
        'cardMeaning' => 'a hollow victory won at a high cost, urging you to choose your battles wisely'
    ],
    'tower' => [
        'cardMeaning' => "if it all falls apart,consider that maybe it wasn't that well built to begin with. Let go when the tower finally falls, in the rubble you will find your freedom",
        'cardMeaningReversed' => 'averting disaster at the last moment, or an internal fear of inevitable change.'
    ],
    '1_cups' => [
        'suit' => 'cups',
        'rank' => '1',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '2_cups' => [
        'suit' => 'cups',
        'rank' => '2',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '3_cups' => [
        'suit' => 'cups',
        'rank' => '3',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '4_cups' => [
        'suit' => 'cups',
        'rank' => '4',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '5_cups' => [
        'suit' => 'cups',
        'rank' => '5',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '6_cups' => [
        'suit' => 'cups',
        'rank' => '6',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],
    '7_cups' => [
        'suit' => 'cups',
        'rank' => '7',
        'arcana' => 'minor',
        'cardMeaning' => 'a joyful celebration of community, mutual support, and shared victory'
    ],

];

?>

<?php

// i might need to account for the fact that some cards share the same numerology and stuff and edit the structuring for those cases so it's not this card indicates y while this card indicates y and instead these cards represent y
function getCardData($cardId, $isReversed, $arcana, $suits, $numerology, $rank, $cards)
{
    $cardInfo = $cards[$cardId] ?? null;
    $defaultMeaning = 'a unique path unfolding, shaped by the energies of the universe but shrouded in mystery.';

    if ($cardInfo){
        if ($isReversed){
            $uniqueMeaning = $cardInfo['cardMeaningReversed'] ?? 'an inverted energy, suggesting an internal blockage of ' . $cardInfo['cardMeaning'];
        } else {
            $uniqueMeaning = $cardInfo['cardMeaning'] ?? $defaultMeaning;
        }
    } else {
        $uniqueMeaning = $defaultMeaning;
    }

    //cheack for major arcana
    if (strpos($cardId, '_') === false){
        return [
            'cardId' => $cardId,
            'cardName' => ucfirst($cardId), //dude i have to be soooo careful when nameing my files now T-T
            'isReversed' => $isReversed,
            'cardPosition' => $isReversed ? 'Reversed' : 'Upright',
            'arcana' => 'major',
            'arcanaName' => $arcana['major']['name'],
            'arcanaMeaning' => $arcana['major']['meaning'],
            'suitName' => 'The Universe',
            'suitMeaning' => 'the grand narrative of life and transformative spiritual lessons',
            'numName' => 'The Archetype',
            'numMeaning' => 'universal truth and the collective unconcious',
            'cardMeaning' => $uniqueMeaning
        ];
    }




    // fallback dictoinary incase the card isnt in the db yet
    // if (!isset($cards[$cardId])){
    //     return [
    //         'cardId'        => $cardId,
    //         'arcana'    => 'minor',
    //         'arcanaName'    => 'Minor Arcana',
    //         'arcanaMeaning' => 'the day-to-day experiences, challenges, and opportunities that shape our journey',
    //         'suitName'      => 'Unknown Suit',
    //         'suitMeaning'   => 'mysterious influences',
    //         'numName'    => 'Mystery Card',
    //         'numMeaning'    => 'unwritten potential',
    //         'cardMeaning'   => 'a path shrouded in mystery, awaiting to be coded '
    //     ];
    // }

    // $cardInfo = $cards[$cardId];
    // $cardArcana = $cardInfo['arcana'] ?? 'minor';
    // $cardSuit = $cardInfo['suit'] ?? 'none';
    // $cardRank = $cardInfo['rank'] ?? 'none';

    //handle Major wihtout crashes
    // if ($cardArcana == 'major') {
    //     return [
    //         'cardId' => $cardId,
    //         'arcana' => 'major',
    //         'arcanaName'=> $arcana['major']['name'],
    //         'arcanaMeaning'=> $arcana['major']['meaning'],
    //         'suitName' => 'The Universe',
    //         'suitMeaning' => 'the grand narrative of life, spiritual lessons, and transformative experiences',
    //         'numName' => 'The Archetype',
    //         'numMeaning' => 'the universal truth and the collective unconscious',
    //         'cardMeaning' => $cardInfo['cardMeaning'] ?? 'a profound lesson from the cosmos, urging reflection and growth'
    //     ];
    // }

    //Minor Arcana lookups
        //minofr arcana 
        $parts = explode('_', $cardId);
        $cardRank = $parts[0];
        $cardSuit = $parts[1];
        // wait for this to word properly i think that names need to match the data exactly so i need to write a function that makes it so that it doens't matter what case the words are in as long as the letters are in the same order? I THINK?

    
    $suitData = $suits[$cardSuit] ?? [
        'name'      => 'Unknown Suit',
        'meaning'   => 'mysterious influences'
    ];
    // look in numerology if it's a number or rank if it's a face card
    $rankOrNum = isset($numerology[$cardRank]) ? $numerology[$cardRank] : ($rank[$cardRank] ?? [
        'name'      => 'Unknown Rank', 
        'meaning'   => 'shifting paths, an undefined role in the cosmic play'
    ]);

    return [
        'cardId'        => $cardId,
        'cardName'      => $rankOrNum['name'] . ' of ' . $suitData['name'],
        'isReversed'    => $isReversed,
        'cardPosition'  => $isReversed ? 'Reversed' : 'Upright',
        'arcana'        => 'minor',
        'arcanaName'    => $arcana['minor']['name'],
        'arcanaMeaning' => $arcana['minor']['meaning'],
        'suitName'      => $suitData['name'],
        'suitMeaning'   => $suitData['meaning'],
        'numName'       => $rankOrNum['name'],
        'numMeaning'    => $rankOrNum['meaning'],
        'cardMeaning'   => $uniqueMeaning
    ];
}
function generateSynthesis($cardA, $cardB)
{

    if ($cardA['arcana'] === 'major' && $cardB['arcana'] === 'major') {
        $arcanaParagraph = "This reading is rooted in the " . $cardA['arcanaName'] . ", highlighting " . $cardA['arcanaMeaning'] . ". The Universe is talking about your soul path. Embrance new beginnings and transformation.";
    } elseif ($cardA['arcana'] === 'minor' && $cardB['arcana'] === 'minor'){
        $arcanaParagraph = "This reading is grounded in " . $cardA['arcanaName'] . ", focusing on " . $cardA['arcanaMeaning'] . ".";
    } else {
        $arcanaParagraph = "This reading bridges the spiritual scope of the " . $cardA['arcanaName'] . " which represents, " . $cardA['arcanaMeaning'] . ", with the grounded nature of the " . $cardB['arcanaName'] . ", which looks at" . $cardB['arcanaMeaning'] . ".";
    }

    $suitParagraph = "Your reading is governed by the collision of " . $cardA['suitName'] . " and " . $cardB['suitName'] . ". " .
        "This cosmic alignment forces you into a space of " . $cardA['suitMeaning'] . ", " .
        "which is actively clashing with " . $cardB['suitMeaning'] . ".";

    $numParagraph = "The underlying numerological current pairs the progress of the " . $cardA['numName'] . " " .
        "with the testing energy of the " . $cardB['numName'] . ". " .
        "The universe indicates that " . $cardA['numMeaning'] . " is currently being disrupted by " . $cardB['numMeaning'] . ".";

    $prophecyParagraph = "Ultimately, these energies manifest as a dual truth: you are experiencing the " . $cardA['cardMeaning'] . ", of the " . $cardA['cardName'] . ($cardA['isReversed'] ? "and it's reversal" : '') . "yet you must prepare for the " . $cardB['cardMeaning'] . " brought by the " . ($cardA['isReversed'] ? "reversed " : '') . $cardA['cardName'] . ". The path forward requires the balance of both.";

    return [
        'arcana'   => $arcanaParagraph,
        'suits'    => $suitParagraph,
        'numerology'  => $numParagraph,
        'prophecy' => $prophecyParagraph
    ];


    //AJAJAJAJAJAJAJAX
}

// AUTO PARSING EXECUTION THINGY

if (isset($_POST['cardA']) && isset($_POST['cardB'])) {

    $cardA_id = $_POST['cardA'];
    $cardB_id = $_POST['cardB'];

    //bools for the js formdata thingy
    $cardA_rev = (isset($_POST['cardA_reversed']) && $_POST['cardA_reversed'] === 'true');
    $cardB_rev = (isset($_POST['cardB_reversed']) && $_POST['cardB_reversed'] === 'true');

    // EXTRACT RANK KEY SUIT OUT THE CARD A ID TO MATCH THE DATABNASE

    // function to retrieve card data based on the card ID >:D (please end my suffering)
    // HOLY MOLY THIS SHIT IT SPECIFIC,
    // THE ORDER OF THE PARAMTERS NEEDS TO BE IN THE EXACT ORDER AS THEY ARE IN THE GETCARDDATA FUNCTION ✨PERFECTLY✨, OTHERWISE PHP WILL LOOK FOR SHIT IN THE WRONG PLACE AND YEVFHIWYAFU9IEHWEIFE
    $cardA_data = getCardData($cardA_id, $cardA_rev, $arcana, $suits, $numerology, $rank, $cards);
    $cardB_data = getCardData($cardB_id, $cardB_rev, $arcana, $suits, $numerology, $rank, $cards);


    $reading = generateSynthesis($cardA_data, $cardB_data);

    echo "<p>" . $reading['arcana'] . "</p>";
    echo "<p>" . $reading['suits'] . "</p>";
    echo "<p>" . $reading['numerology'] . "</p>";
    echo "<p>" . $reading['prophecy'] . "</p>";

    exit; //stop script so we don't spill the secrets of the whole universe
}


?>
<!-- generateSynthesis() and echo $_POST['cardA'] and $_POST['cardB'] -->