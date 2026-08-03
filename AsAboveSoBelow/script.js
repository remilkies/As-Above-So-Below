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
    const card1 = cards[0];
    const card2 = cards[1];

    document.getElementById('card-spread-container').style.display = 'none';
    document.getElementById('reading-stage').style.display = 'block';

    const imgLeft = document.getElementById('visual-card-left');
    const imgRight = document.getElementById('visual-card-right');


    imgLeft.src = `/cards/${card1.name}.png`;
    imgRight.src = `/cards/${card2.name}.png`;

    if (card1.reversed) imgLeft.classList.add('reversed');
    if (card2.reversed) imgRight.classList.add('reversed');

    const name1 = card1.reversed ? `${card1.name} (Reversed)` : card1.name;
    const name2 = card2.reversed ? `${card2.name} (Reversed)` : card2.name;
    document.getElementById('reading-subtitle').innerText = `${name1} | ${name2}`;

    const formData = new FormData();
    formData.append('card1', card1.id);
    formData.append('card2', card2.id);

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