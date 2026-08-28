<section class="chamber bottom-chamber">

<button id="ascend-btn" class="aasb-btn">▲ Ascend</button>

    <div class="chamber-container">
        <div class="bottom-chamber-header">
            <img src="/assets/trippleMoon.svg" alt="Maiden Mother Crone" class="header-icon">
<p>These are general interpretations. Always trust your intuition first.<br>
Your intention, energy, and personal experience matter most.</p>
        </div>
        <!-- dynamic card and php logic can live here -->

        <!-- card drawing stage -->
        <div class="card-indicators">
            <div class="indicator-slot" id="slot-1">
                <span class="slot-label">Card 1</span>
                <div class="slot-preview" id="slot-1-preview"></div>
            </div>

            <div class="indicator-slot" id="slot-2">
                <span class="slot-label">Card 2</span>
                <div class="slot-preview" id="slot-2-preview"></div>
            </div>
        </div>

        <h3 id="current-question" class="question-text">Card 1: What should I look foreward to?</h3>

        <!-- active deck spread (my lawd have mercy on my overambitios soul) -->

        <div id="card-spread-container">
           <?php
    $total_cards = 15;
    $start_angle = -56;
    $end_angle = 56;
    $step = ($end_angle - $start_angle) / ($total_cards - 1);

    for ($i = 0; $i < $total_cards; $i++) {
        $angle = $start_angle + ($i * $step);
        $index = $i + 1;

        echo "<div class='tarot-card-wrapper' style='--base-angle: {$angle}deg; --i: {$index}; z-index: {$index};'>";
        include '../components/TarotCard.php';
        echo "</div>";
    }
    ?>
        </div>

        <div class="chamber-controls">
            <button id="shuffle-btn" class="aasb-btn">Shuffle Deck</button>
        </div>
    </div>

    <!-- loading stage -->
    <div id="loading-stage" style="display: none;">
        <div class="bottom-chamber-header">
            <img src="/assets/trippleMoon.svg" alt="Maiden Mother Crone" class="header-icon">
            <p>These are general interpretations. Always trust your intuition first.<br>
Your intention, energy, and personal experience matter most.</p>
        </div>
        <h2 class="loading-title">Synthesising Reading...</h2>

        <!-- here we go, may this work on the first try (deck animation) -->
        <div class="loading-cards-container">
            <div class="tarot-card-container loading-card" id="loading-card-1">
                <div class="tarot-card-flipper">
                    <div class="card-face card-back">
                        <img src="../assets/cardBack.png" alt="Card Back">
                    </div>
                    <div class="card-face card-front">
                        <img id="loading-img-1" src="" alt="Card 1">
                    </div>
                </div>
            </div>

            <div class="tarot-card-container loading-card" id="loading-card-2">
                <div class="tarot-card-flipper">
                    <div class="card-face card-back">
                        <img src="../assets/cardBack.png" alt="Card 2" />
                    </div>

                    <div class="card-face card-front">
                        <img id="loading-img-2" src="" alt="Card 2" />
                    </div>

                </div>
            </div>
        </div>

        <div class="loading-bar-container">
            <div class="loading-bar-fill" id="loading-bar-fill"></div>
        </div>

        <div class="throbber-wrapper">
            <img src="../assets/throbberIcon.png" alt="Loading..." class="throbber-spinner" />
        </div>
    </div>






    <div id="reading-stage" style="display: none;">
        <div class="bottom-chamber-header">
            <img src="/assets/trippleMoon.svg" alt="Maiden Mother Crone" class="header-icon">
            <p>These are general interpretations. Always trust your intuition first.<br>
Your intention, energy, and personal experience matter most.</p>
        </div>
        <!-- YOUU CANT ASCEND ANYMORE T-T -->
        <div class="drawn-cards-display">
            <img id="visual-card-left" class="drawn-card card-left" src="" alt="Card 1">
            <img id="visual-card-right" class="drawn-card card-right" src="" alt="Card 2">
        </div>

        <div class="reading-container">
            <h2>Your Prophecy</h2>
            <h3 id="reading-subtitle"></h3>

            <div id="reading-text"></div>

        </div>

        <div id="save-toast" class="chamber-toast">
            <div class="toast-header">
                <h3> ݁₊ ⊹ . ݁˖ . Ritual Complete ݁₊ ⊹ . ݁˖ . ݁</h3>
                <button class="toast-close" onclick="document.getElementById('save-toast').classList.remove('show')">✕</button>
            </div>
            <p>You are now bound to your reading. Go to the <strong>Inner Sanctum</strong> to view &lt;3</p>
        </div>

    </div>
</section>