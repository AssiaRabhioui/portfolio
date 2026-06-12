console.log('Test');

const jsOn = document.documentElement.classList.add('js');

//suivi souri
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

//scrol open accolade

const intro = document.querySelector('.intro');
const enterButton = document.querySelector('.intro__enter');
//const nameShow = document.querySelector('.intro__rest');


if (intro) {
    intro.classList.remove('intro__open');
    // nameShow.classList.remove('intro__rest__open');
    intro.classList.add('intro__closed');
    //nameShow.classList.add('intro__rest__close');
    // nameShow.classList.add('sro');


    window.addEventListener('click', () => {
        intro.classList.remove('intro__closed');
        intro.classList.add('intro__open');
        // nameShow.classList.add('intro__rest__open');
        //nameShow.classList.remove('sro');
    });
    enterButton.addEventListener('click', () => {
        intro.classList.remove('intro__open');
        intro.classList.add('intro__hidden');

    });
}



/*
function lancerConfettis() {
    const canvas = document.createElement('canvas');
    canvas.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:9999;';
    document.body.appendChild(canvas);

    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const confettis = Array.from({length: 150}, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * -canvas.height,
        w: Math.random() * 10 + 5,
        h: Math.random() * 5 + 3,
        color: ['#ff6b6b','#ffd93d','#6bcb77','#4d96ff','#ff922b'][Math.floor(Math.random() * 5)],
        vitesse: Math.random() * 3 + 2,
        angle: Math.random() * 360,
        rotation: Math.random() * 6 - 3,
    }));

    let frame;
    let duree = 0;

    function animer() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        confettis.forEach(c => {
            c.y += c.vitesse;
            c.angle += c.rotation;

            ctx.save();
            ctx.translate(c.x, c.y);
            ctx.rotate(c.angle * Math.PI / 180);
            ctx.fillStyle = c.color;
            ctx.fillRect(-c.w / 2, -c.h / 2, c.w, c.h);
            ctx.restore();
        });

        duree++;
        if (duree < 200) {
            frame = requestAnimationFrame(animer);
        } else {
            canvas.remove();
        }
    }

    animer();
}

lancerConfettis();
*/