<section class="chamber bottom-chamber">
    <div class="chamber-container">
        <button id="ascend-btn" class="dashboard-btn">Ascend</button>
        <h2 class="chamber-title">The Chamber of Enlightenment</h2>
        <!-- dynamic card and php logic can live here -->

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

        <!-- active deck spread (my lawd have mercy on my overambitios soul) -->

        <div id="card-spread-container">
            <?php
            for ($i = 0; $i < 15; $i++) {
                include '../components/TarotCard.php';
            }
            ?>
        </div>

        <div class="chamber-controls">
            <button id="shuffle-btn" class="dashboard-btn">Shuffle Deck</button>
            <h3 id="current-question" class="question-text">Card 1: What should I embrace?</h3>
        </div>
    </div>

    <!-- loading stage -->
    <div id="loading-stage" style="display: none;">
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
                        <img src="../assets/cardBack.png" id="loading-img-2" alt="Card 2"/>
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




    <!-- Reading Stage -->
    <!-- maybeeeeee consider adding some options? like there's multiple ways to do a two card tarot spread...althoughhhh you're going to have to make s specialised generateSynthesis() structure food each one soooooo do what you will with this suggestion o7-->
    <div id="reading-stage" style="display: none;">

        <div class="drawn-cards-display">
            <img id="visual-card-left" class="drawn-card card-left" src="" alt="Card 1">
            <img id="visual-card-right" class="drawn-card card-right" src="" alt="Card 2">
        </div>

        <div class="reading-container">
            <h2>Your Prophecy</h2>
            <h3 id="reading-subtitle"></h3>

            <div id="reading-text">

            </div>
        </div>


    </div>
</section>