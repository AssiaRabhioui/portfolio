const jsOn = document.documentElement.classList.add('js');

//suivi souri
function initSparkles() {

    const sparkleLayer = document.querySelector('.sparkle-layer');

    window.addEventListener('mousemove', (evt) => {
        const spark = document.createElement('span');
        spark.classList.add('spark');

        spark.style.left = `${evt.clientX}px`;
        spark.style.top = `${evt.clientY}px`;

        sparkleLayer.appendChild(spark);

        setTimeout(() => {
            spark.remove();
        }, 2000);
    });
}

//scrol open accolade

function initIntroduction() {
    const intro = document.querySelector('.intro');
    const enterButton = document.querySelector('.intro__enter');

    if (intro) {
        intro.classList.remove('intro__open');
        intro.classList.add('intro__closed');

        window.addEventListener('click', () => {
            intro.classList.remove('intro__closed');
            intro.classList.add('intro__open');
        });
        enterButton.addEventListener('click', () => {
            intro.classList.remove('intro__open');
            intro.classList.add('intro__hidden');

        });
    }
}

initSparkles();
initIntroduction();