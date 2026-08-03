// document.getElementById("enter-btn").addEventListener(click, function(){
//     // navigate to login screen
//     window.location.href = "login.php";

// })

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

const stage = document.getElementById('stage');
const descendBtn = document.getElementById('btn-descend');
const ascendBtn = document.getElementById('btn-ascend');

descendBtn.addEventListener('click', () => {
  stage.classList.add('descended');
});

ascendBtn.addEventListener('click', () => {
  stage.classList.remove('descended');
});

let selectedCards = [];

document.querySelectorAll('.spread-card').forEach(card => {
    card.addEventListener('click', (e) => {
        // 2 already pickrd stop or when flipped
        if (selectedCards.length >= 2 || this.classList.contains('flipped')) return;

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

function revealReading(cards){
    const cardA = cards[0];
    const cardB = cards[1];

    document.getElementById('card-spread-container').style.display = 'none';
    document.getElementById('reading-stage').style.display = 'block';

    const imgLeft = document.getElementById('visual-card-left');
    const imgRight = document.getElementById('visual-card-right');


    imgLeft.src = `/cards/${cardA.name}.png`;
    imgRight.src = `/cards/${cardB.name}.png`;

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