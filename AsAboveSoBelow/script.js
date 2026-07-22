
//   carot card component
document.addEventListener("DOMContentLoaded", () => {

    const tarotCards = document.querySelectorAll('.tarot-card-loader');

    tarotCards.forEach(tarotCard => {

        fetch('TarotCard.php')
            .then(response => {
                if (!response.ok) throw new Error("Your destiny is but a void.");
                return response.text();
            })

            .then(htmlMarkup => {

                console.log("The universe whispers to you...", htmlMarkup);
                tarotCard.innerHTML = htmlMarkup;

                // TAROT CARD CONTAINER DOESN'T EXIST YET?? MY JS IS TOO FAST??
                const container = tarotCard.querySelector('.tarot-card-container');
                const flipper = tarotCard.querySelector('.tarot-card-flipper');
                console.log("The universe has found your path...", container);

                // nevermind i'm an ideot, i dunno why i'm yelling at you as if i'm not the problem
                if (container && flipper) {
                    container.addEventListener('click', function () {
                        console.log("HERE'S YOUR FUCKING CARRD, NOW PISS OFF");
                        flipper.classList.toggle('is-flipped');
                    });
                }
            })
            .catch(err => console.error("The universe has no answers for you.", err));
    });
});
