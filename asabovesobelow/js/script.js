console.log("welcome to anouther episode of ✨overestimating my abilities for a self-inflicted shool-project✨")

// document.getElementById("enter-btn").addEventListener(click, function(){
//     // navigate to login screen
//     window.location.href = "login.php";

// })

document.addEventListener('DOMContentLoaded', () => {
    console.log("🌙 The scrying pool is clear. The DOM has awakend")
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('eye-icon');
    const toggleBtn = document.getElementById('toggle-btn');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.src = '../assets/eye-slash-icon.svg';

                toggleIcon.classList.remove('eye-icon');
                toggleIcon.classList.add('eye-slash-icon');
                console.log("🌕 The veil is lifted. Sacred key revealed")

            } else {
                passwordField.type = 'password';
                toggleIcon.src = '../assets/eye-icon.svg';
                toggleIcon.classList.remove('eye-slash-icon');
                toggleIcon.classList.add('eye-icon');
                console.log("🌑 The veil falls. Shadows conceal the truth")
            }
        });
    }



    const stage = document.getElementById('stage');
    const descendBtn = document.getElementById('descend-btn');
    const ascendBtn = document.getElementById('ascend-btn');
    const savedBtn = document.getElementById('saved-btn');
    const returnDashBtn = document.getElementById('return-dash-btn');

    if (descendBtn && stage) {
        descendBtn.addEventListener('click', () => {
            console.log('..So below')
            stage.classList.add('descended');

            if ('vibrate' in navigator) {
                navigator.vibrate(200); // Vibrate mobile
            }

        });
    }

    if (ascendBtn && stage) {
        ascendBtn.addEventListener('click', () => {
            console.log('As Above... ')
            stage.classList.remove('descended');
        });
    }

    if (savedBtn && stage) {
        savedBtn.addEventListener('click', () => {
            console.log('Entering Inner Sanctum...')
            stage.classList.add('sanctum');
        })
    }

    if (returnDashBtn && stage) {
        returnDashBtn.addEventListener('click', () => {
            console.log('Leaving Inner Sanctum...');
            stage.classList.remove('sanctum');
        })
    }

    initTarotFlow();
});


//   carot card component
// document.addEventListener("DOMContentLoaded", () => {
//     const containers = document.querySelectorAll('.tarot-card-container');

//     containers.forEach(container => {
//         const flipper = container.querySelector('.tarot-card-flipper');

//         if (container && flipper) {
//             container.addEventListener('click', function () {
//                 flipper.classList.toggle('is-flipped');
//             });
//         }
//     });
// });



// let selectedCards = [];

// document.querySelectorAll('.spread-card').forEach(card => {
//     card.addEventListener('click', (e) => {
//         // 2 already pickrd stop or when flipped
//         if (selectedCards.length >= 2 || card.classList.contains('is-flipped')) return;

//         const cardId = card.dataset.id;
//         const cardName = card.dataset.name;

//         const isReversed = Math.random(); 

//         selectedCards.push({
//             id: cardId,
//             name: cardName,
//             reversed: isReversed
//         });

//         card.style.visibility = 'hidden'; //ghost card after selecteion

//         if (selectedCards.length === 2) {
//             revealReading(selectedCards);
//         }
//     });
// });

// ==============================================
// TAROT TRANSITION AND STATE MACHINE LOGIC >:D
// ==============================================

function initTarotFlow() {
    console.log("Deck manifesting. Awaiting the seeker's touch...")
    let selectedCards = [];
    let isAnimating = false; //NO FURIOUSLY CLICKING EVERY CARD AT ONECE 

    const questionEl = document.getElementById('current-question');
    const questions = [
        "Card 1: What should I embrace?",
        "Card 2: What should I let go out?" //like this project bc i'm doing to much but anyywayyyy
    ];

    const cards = document.querySelectorAll('.spread-card');
    const shuffleBtn = document.getElementById('shuffle-btn');
    const spreadContainer = document.getElementById('card-spread-container');

    // CARD CLICK AND 5 SECOND "STARE AT YOUR FATE" SEQUENCE

    cards.forEach(card => {
        card.addEventListener('click', () => {
            // wtf cheak: animemation is running or already have 2 card OR this specific card is slready piucked DO NOTHING ABORT ABORT ABORT
            if (isAnimating) {
                console.log("🌙 Transition in progress...Pacience Mortal");
                return;
            }
            if (selectedCards.length >= 2) {
                console.log("🌙 Your fate has been drawn. No more cards can be chosen");
                return;
            }
            if (card.classList.contains('picked')) {
                console.log("🌙 Energies cannot be invoked twice");
                return;
                //lowkey shoutout react for teeaching me how to work with states
            }

            isAnimating = true; //LOCK THE DOOR, NO MORE CLICKING
            console.log("🌙  A rift opens! Drawing a card from the void...");

            const flipper = card.querySelector('.tarot-card-flipper');
            const cardId = card.dataset.id;
            const cardName = card.dataset.name;
            const cardImg = card.dataset.image;

            const isReversed = Math.random() > 0.5; //let the fates decide (or 50 50? yeah it needds to be cuase it's a bool T-T)
            console.log(`🌙 The fates decree: ${cardName} (Reversed? ${isReversed})`);

            flipper.classList.add('is-flipped');
            card.classList.add('picked');

            selectedCards.push({
                id: cardId,
                name: cardName,
                image: cardImg,
                reversed: isReversed
            });

            // card 1 or card 2 cheak
            const currentSlotIndex = selectedCards.length;

            setTimeout(() => {
                card.style.visibility = 'hidden';

                const slotPreview = document.getElementById(`slot-${currentSlotIndex}-preview`);
                const slotContainer = document.getElementById(`slot-${currentSlotIndex}`);

                // SHOVE that card into the indicator and make it ✨GLOW✨
                if (slotPreview && slotContainer) {
                    slotPreview.innerHTML = `<img src="${cardImg}">`;
                    slotContainer.classList.add('marked');
                    console.log(`🌙 Card bound successfully (Slot ${currentSlotIndex})`);
                }

                if (currentSlotIndex === 1) {
                    if (questionEl) questionEl.innerText = questions[1];
                    console.log("🌙 Awaiting the second pull")
                    isAnimating = false;
                } else if (currentSlotIndex === 2) {
                    console.log('🌙 The circle is closed. Your fate is sealed');
                    triggerGrandExitSequence(selectedCards);
                }
            }, 800);
        });
    });
    //i feel like i'm missing something here...BUT ANYWAY

    // DON'T DUPLICATE CARDS MATH/ SHUFFLE DECK

    if (shuffleBtn) {
        shuffleBtn.addEventListener('click', () => {
            if (isAnimating) {
                console.log("🌙 Do not disrupt the current ritual >:(")
                return;
            }
            isAnimating = true;
            console.log("🌙 Deck cleanse in progress...shuffling remaining threads of fate.")


            spreadContainer.classList.add('is-collapsed');

            setTimeout(() => {
                spreadContainer.classList.add('is-shuffling');

                setTimeout(() => {
                    // array fo id's already picked
                    const pickedIds = selectedCards.map(c => c.id);

                    // GIMME ALL THE CARDS EXCPET THE ONEC WITH ID'S IN MY PICKEDIDS LIST
                    const unpickedCards = Array.from(document.querySelectorAll('.spread-card'))
                        .filter(c => !pickedIds.includes(c.dataset.id));

                    // loops though reamining unpicked cards and blidnly spwaps the abount
                    unpickedCards.forEach(cardEl => {
                        const randomTarget = unpickedCards[Math.floor(Math.random() * unpickedCards.length)];

                        //card a data temp storage
                        const tempId = cardEl.dataset.id;
                        const tempName = cardEl.dataset.name;
                        const tempImg = cardEl.dataset.image;

                        //overwite card a with card b data >:D
                        cardEl.dataset.id = randomTarget.dataset.id;
                        cardEl.dataset.name = randomTarget.dataset.name;
                        cardEl.dataset.image = randomTarget.dataset.image;
                        cardEl.querySelector('.card-front img').src = randomTarget.dataset.image;

                        // carb with cad A's temperory data
                        randomTarget.dataset.id = tempId;
                        randomTarget.dataset.name = tempName;
                        randomTarget.dataset.image = tempImg;
                        randomTarget.querySelector('.card-front img').src = tempImg;
                    });

                    //stop spinn, unlock clickity clickity
                    spreadContainer.classList.remove('is-shuffling');
                    spreadContainer.classList.remove('is-collapsed');

                    setTimeout(() => {
                        isAnimating = false;
                        console.log("🌙 The energies have settled. The deck is renewed.")
                    }, 400);

                }, 800); //shuffles
            }, 400) //wait to collapse
        });
    }

    // GRAND EXIT AND LOADING......................
    function triggerGrandExitSequence(cardsData) {
        console.log("🌙Initiating Grand Banishment ritual...")
        const chamberContainer = document.querySelector('.chamber-container');

        if (chamberContainer) chamberContainer.classList.add('spin-out-exit');

        setTimeout(() => {
            if (chamberContainer) chamberContainer.style.display = 'none';

            const loadingStage = document.getElementById('loading-stage');
            const loadingImg1 = document.getElementById('loading-img-1');
            const loadingImg2 = document.getElementById('loading-img-2');
            const fillBar = document.getElementById('loading-bar-fill');

            if (loadingImg1) loadingImg1.src = cardsData[0].image;
            if (loadingImg2) loadingImg2.src = cardsData[1].image;

            //synthesising reading...
            if (loadingStage) loadingStage.style.display = 'flex';
            console.log("🌙 Synthesising your prophecy..")

            setTimeout(() => {
                if (fillBar) fillBar.style.width = '100%';
            }, 100);

            setTimeout(() => {
                document.querySelectorAll('.loading-card .tarot-card-flipper')
                    .forEach(f => f.classList.add('is-flipped'));
                console.log("🌙 ...channeling the unseen forces..")
            }, 1000);

            setTimeout(() => {
                if (loadingStage) loadingStage.style.display = 'none';
                console.log("🌙 Synthesis conplete. Unveiling the final reading stage.")
                revealReading(cardsData);
            }, 3800); //progress bar duration
        }, 1200);
    }
};

function revealReading(cards) {
    console.log("🌙 Constructing final reading...")
    const cardA = cards[0];
    const cardB = cards[1];

    const readingStage = document.getElementById('reading-stage');
    if (readingStage) readingStage.style.display = 'flex';

    const imgLeft = document.getElementById('visual-card-left');
    const imgRight = document.getElementById('visual-card-right');

    // using filename aka id for the images
    imgLeft.src = `../assets/cards/${cardA.id}.png`;
    imgRight.src = `../assets/cards/${cardB.id}.png`;

    if (cardA.reversed) imgLeft.classList.add('reversed');
    if (cardB.reversed) imgRight.classList.add('reversed');

    // aaaand name for the html display side
    const nameA = cardA.reversed ? `${cardA.name} (Reversed)` : cardA.name;
    const nameB = cardB.reversed ? `${cardB.name} (Reversed)` : cardB.name;
    document.getElementById('reading-subtitle').innerText = `${nameA} | ${nameB}`;

    const formData = new FormData();
    formData.append('cardA', cardA.id);
    formData.append('cardA_reversed', cardA.reversed);
    formData.append('cardB', cardB.id);
    formData.append('cardB_reversed', cardB.reversed);

    console.log("🌙 Sending a whisper to the backend Oracle...")

    // AJAX SO MY TRANSITIONS STAY INTACT MUTHAFAQUAAAA
    fetch('../backend/prophecy.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {

            if (!response.ok) {
                throw new Error(`Oracle error status: ${response.status}`); //i swear 90% of my time coding is spent wrinting error logs to debug T-T
            }
            console.log("🔮 The Oracle has responded <3");
            return response.text();
        })
        .then(html => {
            document.getElementById('reading-text').innerHTML = html;
            console.log("🌙 The ritual is complete. The prophecy is rendered.")
        })
        .catch(err => {
            console.log("🔮 Fetch ritual interrupted. Oracle unreachable", err);
            document.getElementById('reading-text').innerHTML = "<p class='oracle-error'>The universe is silent. Cheak database connection</p>";
        })

}


