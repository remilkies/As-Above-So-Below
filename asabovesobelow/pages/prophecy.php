<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

// PDO CONNECTION

require_once 'oracle.php';
// NO MORE BUNCHA HARDCODED LEGACY CODE, NOW MYSQL COMES TO THE RESCUE (even though i just had to write everything i already wrote into the code base so i just did double and a half more work BUT YAYYY MYSQL) >:S

function getCardData($pdo, $cardId, $isReversed)
{
    // THIS IS TOO BASIC EVEN FOR DUMMY TEXT, REMBER TO CHANGE THIS LATER CAUASE I'M TOO TIRED NOW
    $defaultMeaning = 'a unique path unfolding, shaped by the energies of the universe but shrouded in mystery.';

    // prepared statementr to keep out the sql-injecting demons
    // WHOOP WHOOP LEFT JOINS >:D becuase Miajor Arcana cards have NULL suites and ranks in the db soooo using a standard INNER JOIN, the Major cards would poof into the shadow realm and evenrything with crash and then i will crash and then i'll cri (can you tell I's a saturday and i'm hungry??)
    $stmt = $pdo->prepare(
        "
    SELECT
        c.id AS cardId,
        c.card_meaning,
        c.card_meaning_reversed,
        c.arcana_id,
        a.name AS arcanaMeaning,
        s.name AS suitName,
        s.element AS suitElement,
        s.meaning AS suitMeaning
    FROM cards c
    LEFT JOIN arcana a ON c.arcana_id = a.id
    LEFT JOIN suits s ON c.suit_id = s.id
    WHERE c.id = :cardId"
    );

    $stmt->execute(['cardId' => $cardId]);
    $cardInfo = $stmt->fetch();

    // cheacking if the card actully exists in the datatbase yet
    if ($cardInfo) {
        if ($isReversed) {
            $uniqueMeaning = $cardInfo['card_meaning_reversed'] ?? 'an inverted energy, suggesting and internal blockage of ' . $cardInfo['card_meaning'] . ' - a softer or shadow version of ' .  $cardInfo['cardId'] . "'s upright meaning";
        } else {
            $uniqueMeaning = $cardInfo['card_meaning'] ?? $defaultMeaning;
        }
    } else {
        $uniqueMeaning = $defaultMeaning;
        $cardInfo = [
            'arcana_id' => 'minor',
            'arcanaName' => 'Minor Arcana',
            'arcanaMeaning' => "the day to day expiriences, challanges and other stuff. rem still needs to code this i guess i dunno mahn i'm tiiiiiiiyerddddddd",
            'suitName' => 'Unknown Suit',
            'suitMeaning' => 'mysterious influences'
        ];
    }

    // splitting the card ID stroings (some things just don't change T-T)
    $parts = explode('_', $cardId);
    $cardNumOrRank = strtolower($parts[0]);
    $rawName = $parts[1] ?? '';

    // major arcana cheakkkkk: bypassing minor logic if we have a suit suffix (shoutout English Teacher)
    // we treat these cards with the respect and ATTENTION like the grand cosmic archetypes they are >:D
    if ($cardInfo['arcana_id'] === 'major' || empty($rawName)) {
        $formattedCardName = !empty($rawName)
            ? ucwords(preg_replace('/(?<!^)[A-Z]/', ' $0', $rawName))
            : ucwords(str_replace('_', ' ', $cardId));

            return [
                'cardId'        => $cardId,
                'cardName'      => $formattedCardName,
                'isReversed'    => $isReversed,
                'cardPosition'  => $isReversed ? 'Reversed' : 'Upright',
                'arcana'        => 'major',
                'arcanaName'    => $cardInfo['arcanaName'],
                'arcanaMeaning' => $cardInfo['arcanaMeaning'],
                'suitName'      => 'The Universe',
                'suitMeaning'   => 'the grand narrative of life and transformative spiritual lessons',
                'numName'    => ucfirst($cardNumOrRank),
                'numMeaning'    => 'a profound cosmic archetype',
                'cardMeaning'   => $uniqueMeaning
            ];
    }

    // ELCOME TO THE MINOR ARCANA
    //but this time, instead of massive arrays, we query the exact numerology or rank table >:D
    $rankOrNumName = ucfirst($cardNumOrRank);
    $rankOrNumMeaning = 'shifting paths, unidentified energies are at play';

    if (is_numeric($cardNumOrRank)) {
        $numStmt = $pdo->prepare("SELECT name, meaning FROM minor_numerology WHERE id = :id"); //capital letters are actully important, ok php
        $numStmt->execute(['id' => (int)$cardNumOrRank]);
        $numData = $numStmt->fetch();
        if ($numData) {
            $rankOrNumName = $numData['name'];
            $rankOrNumMeaning = $numData['meaning'];
        }
    } else {
        $rankStmt = $pdo->prepare("SELECT name, meaning FROM card_ranks WHERE id = :id"); 
        $rankStmt->execute(['id' => $cardNumOrRank]);
        $rankData = $rankStmt->fetch();
        if ($rankData) {
            $rankOrNumName = $rankData['name'];
            $rankOrNumMeaning = $rankData['meaning'];
        }
    }

    return [
        'cardId'        => $cardId,
        'cardName'      => $rankOrNumName . ' of ' . $cardInfo['suitName'],
        'isReversed'    => $isReversed,
        'cardPosition'  => $isReversed ? 'Reversed' : 'Upright',
        'arcana'        => 'minor',
        'arcanaName'    => $cardInfo['arcanaName'],
        'arcanaMeaning' => $cardInfo['arcanaMeaning'],
        'suitName'      => $cardInfo['suitName'],
        'suitMeaning'   => $cardId['suitMeaning'],
        'numName'       => $rankOrNumName,
        'numMeaning'    => $rankOrNumMeaning,
        'cardMeaning'   => $uniqueMeaning
    ];
}

function generateSynthesis($cardA, $cardB)
{

// i might need to account for the fact that some cards share the same numerology and stuff and edit the structuring for those cases so it's not this card indicates y while this card indicates y and instead says the duality of these cards emphasises y

    if ($cardA['arcana'] === 'major' && $cardB['arcana'] === 'major') {
        $arcanaParagraph = "This reading is rooted in the " . $cardA['arcanaName'] . ", highlighting " . $cardA['arcanaMeaning'] . ". The Universe is talking about your soul path. Embrace new beginnings and transformation.";
    } elseif ($cardA['arcana'] === 'minor' && $cardB['arcana'] === 'minor') {
        $arcanaParagraph = "This reading is grounded in " . $cardA['arcanaName'] . ", focusing on " . $cardA['arcanaMeaning'] . ".";
    } else {
        $arcanaParagraph = "This reading bridges the spiritual scope of the " . $cardA['arcanaName'] . " which represents, " . $cardA['arcanaMeaning'] . ", with the grounded nature of the " . $cardB['arcanaName'] . ", which looks at " . $cardB['arcanaMeaning'] . ".";
    }

    $suitParagraph = "Your reading is governed by the collision of " . $cardA['suitName'] . " and " . $cardB['suitName'] . ". " .
        "This cosmic alignment forces you into a space of " . $cardA['suitMeaning'] . ", " .
        "which is actively clashing with " . $cardB['suitMeaning'] . ".";



    $numParagraph = "The underlying numerological current pairs the progress of the " . $cardA['numName'] . " " .
        "with the testing energy of the " . $cardB['numName'] . ". " .
        "The universe indicates that " . $cardA['numMeaning'] . " is currently being disrupted by " . $cardB['numMeaning'] . ".";

    $prophecyParagraph = "Ultimately, these energies manifest as a dual truth: you are experiencing the " . $cardA['cardMeaning'] . ", of the " . $cardA['cardName'] . ($cardA['isReversed'] ? " and its reversal" : '') . " yet you must prepare for the " . $cardB['cardMeaning'] . " brought by the " . ($cardB['isReversed'] ? "reversed " : '') . $cardB['cardName'] . ". The path forward requires the balance of both.";

    return [
        'arcana'   => $arcanaParagraph,
        'suits'    => $suitParagraph,
        'numerology'  => $numParagraph,
        'prophecy' => $prophecyParagraph
    ];


    //AJAJAJAJAJAJAJAX
}

if (isset($_POST['cardA']) && isset($_POST['cardB'])) {
    $cardA_id = $_POST['cardA'];
    $cardB_id = $_POST['cardB'];

    $cardA_rev = (isset($_POST['cardA_reversed']) && $_POST['cardA_reversed'] === 'true');
    $cardB_rev = (isset($_POST['cardB_reversed']) && $_POST['cardB_reversed'] === 'true');

    //FETCH DATA USING CLEAN SQL PDO FUCNTION INSTEAD OF MASSIVE ARRAYS
    $cardA_data = getCardData($pdo, $cardA_id, $cardA_rev);
    $cardB_data = getCardData($pdo, $cardB_id, $cardB_rev);

    $reading = generateSynthesis($cardA_data, $cardB_data);

    echo "<p>" . $reading['arcana'] . "</p>";
    echo "<p>" . $reading['suits'] . "</p>";
    echo "<p>" . $reading['numerology'] . "</p>";
    echo "<p>" . $reading['prophecy'] . "</p>";

    exit;
}