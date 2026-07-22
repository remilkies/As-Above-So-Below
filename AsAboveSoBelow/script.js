

//   carot card component
document.addEventListener("DOMContentLoaded", () => {

    const tarotCard = document.getElementById('tarot-card-loader');

    if (tarotCard) {
        fetch('TarotCard.php')
            .then(response => {
                if (!response.ok) throw new Error("Your destiny is but a void.");
                return response.text();
            })

            .then(htmlMarkup => {

                console.log("The universe whispers to you...", htmlMarkup);
                tarotCard.innerHTML = htmlMarkup;

                // TAROT CARD CONTAINER DOESN'T EXIST YET?? MY JS IS TOO FAST??
                const container = document.getElementById('tarot-card-container');
                console.log("The universe has found your path...", container);

                // nevermind i'm an ideot, i dunno why i'm yelling at you as if i'm not the problem
                if (container) {
                    container.addEventListener('click', function () {
                        const flipper = document.getElementById('tarot-card-flipper');
                        flipper.classList.toggle('is-flipped');

                    });
                }
            })
            .catch(err => console.error("The universe has no answers for you.", err));
    }
});
