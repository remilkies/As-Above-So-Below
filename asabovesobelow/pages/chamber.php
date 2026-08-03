<section class="chamber chamber-bottom">
    <h2 class="chamber-title">The Chamber of Ascension</h2>
    <!-- dynamic card and php logic can live here -->
    <div id="card-spread-container">
        <?php
        for ($i = 0; $i < 15; $i++) {
            include 'TarotCard.php';
        }
        ?>
    </div>

    </div>


    <button id="btn-ascend" class="dashboard-btn">Ascend</button>

    <!-- Reading Stage -->
    <div id="reading-stage" style="display: none;">

        <div class="drawn-cards-display">
            <img id="visual-card-left" class="drawn-card card-left" src="" alt="Card 1">
            <img id="visual-card-right" class="drawn-card card-right" src="" alt="Card 2">
        </div>

        <h2>Your Prophecy</h2>
        <h3 id="reading-subtitle"></h3>

        <div id="reading-text">

        </div>

    </div>
</section>