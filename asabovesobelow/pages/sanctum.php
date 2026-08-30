
<section class="chamber sanctum-chamber">

    <div class="sanctum-header">
        <button id="return-dash-btn" class="aasb-btn">
            ← Return to Dashboard
        </button>
        <div class="header-text">
        <img src="/assets/trippleMoon.svg" alt="Maiden Mother Crone" class="header-icon">
            <h1 class="sanctum-title"><?php echo htmlspecialchars($displayName) . "'s"; ?> Inner Sanctum</h1>
<!-- prophecies obtained coven initiation -->
            <p>The tripple monn is a reminder that we are all three. <br> You are the dreamer, the nurtuer, and the wise one. <br> honor every phase of yourself, as the moon honours every phase of life &lt;3</p>
            
            
        </div>
    </div>

    <div class="sanctum-layout desktop-carousel">
        <div class="sanctum-feed" id="reading-carousel">
        <?php if (!empty($savedReadings)): ?>
    <?php foreach ($savedReadings as $index => $reading):

        $isActive = ($index === 0) ? 'active' : '';


        $cardAId = htmlspecialchars($reading['card_a_id'] ?? '');
        $cardBId = htmlspecialchars($reading['card_b_id'] ?? '');

        $cardAReversed = !empty($reading['card_a_reversed']) ? 'reversed' : '';
        $cardBReversed = !empty($reading['card_b_reversed']) ? 'reversed' : '';

        $createdDate = !empty($reading['created_at']) ? date('j F', strtotime($reading['created_at'])) : date('j F');


$rawA = preg_replace('/^\d+_/', '', $cardAId); 
$spacedA = preg_replace('/(?<!^)[A-Z]/', ' $0', $rawA);
$cleanA = trim(preg_replace('/\s+/', ' ', str_replace('_', ' ', $spacedA))); 
$titleA = $cleanA . ($cardAReversed ? ' (reversed)' : '');

$rawB = preg_replace('/^\d+_/', '', $cardBId); 
$spacedB = preg_replace('/(?<!^)[A-Z]/', ' $0', $rawB); 
$cleanB = trim(preg_replace('/\s+/', ' ', str_replace('_', ' ', $spacedB))); 
$titleB = $cleanB . ($cardBReversed ? ' (reversed)' : '');
        $cardsSummary = $titleA . ' | ' . $titleB;



                    $prophecyText = $reading['reading_text'] ?? $reading['prophecy'] ?? $reading['reading'] ?? '';
                ?>
                <div class="sanctum-entry-container <?php echo $isActive; ?>" data-id="<?php echo htmlspecialchars($reading['id']); ?>">
                    <div class="sanctum-entry">
                        
                    <div class="bin-icon">
                        <img src="../assets/bin-icon.svg" alt="Delete Icon" class="bin-default">
                        <img src="../assets/bin-icon-active.svg" alt="Delete Icon Active" class="bin-hover">
                        </div>

                        <div class="entry-left-col">
                            <div class="drawn-cards-display">
                                <div class="drawn-card card-left <?php echo $cardAReversed; ?>">
                                    <img src="../assets/cards/<?php echo htmlspecialchars($reading['card_a_id']); ?>.png" alt="<?php echo $titleA; ?>">
                                </div>
                                <div class="drawn-card card-right <?php echo $cardBReversed; ?>">
                                    <img src="../assets/cards/<?php echo htmlspecialchars($reading['card_b_id']); ?>.png" alt="<?php echo $titleB; ?>">
                                </div>
                            </div>

                            <h3 class="sanctum-date"><?php echo $createdDate; ?></h3>
                            <p class="sanctum-cards-title"><?php echo $cardsSummary; ?></p>
                        </div>

                        <div class="entry-right-col reading-text">

                            <p class="reading-preview"><?php echo nl2br(htmlspecialchars($prophecyText)); ?></p>
                            <button class="view-reading-btn aasb-btn">View Full Reading</button>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
        <div class="sanctum-entry active empty-entry">
            <div class="sanctum-empty-state">
                <img src="../assets/trippleMoon.svg" alt="Triple Moon Logo" class="sanctum-empty-logo">
                <p class="sanctum-empty-text">
                    The scrying pool is still. No past prophecies have been recorded...
                </p>
                <button type="button" id="seek-fate-btn" class="aasb-btn">
                    Consult the Oracle
                </button>
            </div>
        </div>
    <?php endif; ?>
        </div>
    </div>
</section>