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
