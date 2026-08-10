console.log("I'M AWAKE. I'M ALIVE");

// document.getElementById("enter-btn").addEventListener(click, function(){
//     // navigate to login screen
//     window.location.href = "login.php";

// })

document.addEventListener('DOMContentLoaded', () => {
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

            } else {
                passwordField.type = 'password';
                toggleIcon.src = '../assets/eye-icon.svg';
                toggleIcon.classList.remove('eye-slash-icon');
                toggleIcon.classList.add('eye-icon');
            }
        });
    }
});


    const stage = document.getElementById('stage');
    const descendBtn = document.getElementById('descend-btn');
    const ascendBtn = document.getElementById('ascend-btn');

    if (descendBtn && stage) {
        descendBtn.addEventListener('click', () => {
            console.log('...So Below')
            stage.classList.add('descended');

            if ('vibrate' in navigator) {
                navigator.vibrate(200); // Vibrate mobile
            }

        });
    }

    if (ascendBtn && stage) {
        ascendBtn.addEventListener('click', () => {
            console.log('As Above...')
            stage.classList.remove('descended');
        });
    }


//   carot card component
document.addEventListener("DOMContentLoaded", () => {
    const containers = document.querySelectorAll('.tarot-card-container');

    containers.forEach(container => {
        const flipper = container.querySelector('.tarot-card-flipper');

        if (container && flipper) {
            container.addEventListener('click', function () {
                flipper.classList.toggle('is-flipped');
            });
        }
    });
});



let selectedCards = [];

document.querySelectorAll('.spread-card').forEach(card => {
    card.addEventListener('click', (e) => {
        // 2 already pickrd stop or when flipped
        if (selectedCards.length >= 2 || card.classList.contains('is-flipped')) return;

        const cardId = card.dataset.id;
        const cardName = card.dataset.name;

        const isReversed = Math.random() < 0.5; //maybe make it random instead of 50 50 i dunno

        selectedCards.push({
            id: cardId,
            name: cardName,
            reversed: isReversed
        });

        card.style.visibility = 'hidden'; //ghost card after selecteion

        if (selectedCards.length === 2) {
            revealReading(selectedCards);
        }
    });
});

function revealReading(cards) {
    const cardA = cards[0];
    const cardB = cards[1];

    document.getElementById('card-spread-container').style.display = 'none';
    document.getElementById('reading-stage').style.display = 'block';

    const imgLeft = document.getElementById('visual-card-left');
    const imgRight = document.getElementById('visual-card-right');


    imgLeft.src = `assets/cards/${cardA.name}.png`;
    imgRight.src = `assets/cards/${cardB.name}.png`;

    if (cardA.reversed) imgLeft.classList.add('reversed');
    if (cardB.reversed) imgRight.classList.add('reversed');

    const nameA = cardA.reversed ? `${cardA.name} (Reversed)` : cardA.name;
    const nameB = cardB.reversed ? `${cardB.name} (Reversed)` : cardB.name;
    document.getElementById('reading-subtitle').innerText = `${nameA} | ${nameB}`;

    const formData = new FormData();
    formData.append('cardA', cardA.id);
    formData.append('cardB', cardB.id);

    // AJAX SO MY TRANSITIONS STAY INTACT MUTHAFAQUAAAA
    fetch('prophecy.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(html => {
            document.getElementById('reading-text').innerHTML = html;
        })

}


