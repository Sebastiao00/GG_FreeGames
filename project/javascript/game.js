const mario = document.querySelector('.mario');
const pipe = document.querySelector('.pipe');
const clouds = document.querySelector('.clouds');
const clouds2 = document.querySelector('.clouds2');
const clouds3 = document.querySelector('.clouds3');
const clouds4 = document.querySelector('.clouds4');
let score = 0;
let scored = false;
const scoredisplay = document.getElementById('scoreboard');

const jump = () => {
    mario.classList.add('jump');

    setTimeout(() =>{

        mario.classList.remove('jump');

    },500)
}

const loop = setInterval(() => {


    const pipeposition = pipe.offsetLeft;
    const marioposition = +window.getComputedStyle(mario).bottom.replace('px','');
    const cloudsposition = clouds.offsetLeft;
    const clouds2position = clouds2.offsetLeft;
    const clouds3position = clouds3.offsetLeft;
    const clouds4position = clouds4.offsetLeft;

    if (pipeposition <= 80 && pipeposition > 0 && marioposition >= 90 && !scored) {

        score++;
        console.log(score);
        scoredisplay.textContent = score;
        scored = true;
        
    }

    if (pipeposition <= 0) {
        scored = false;
    }

    if(pipeposition <= 80 && pipeposition > 0 && marioposition < 90) {



        

        pipe.style.animation = 'none'; 
        pipe.style.left =`${pipeposition}px`;

        clouds2.style.animation = 'none'; 
        clouds2.style.left = `${clouds2position}px`;

        clouds3.style.animation = 'none'; 
        clouds3.style.left = `${clouds3position}px`;

        clouds4.style.animation = 'none'; 
        clouds4.style.left = `${clouds4position}px`;

        clouds.style.animation = 'none'; 
        clouds.style.left = `${cloudsposition}px`;

        mario.style.animation = 'none'; 
        mario.style.bottom =`${marioposition}px`;

        mario.src = './../../images/game/gameover.png';
        mario.style.width = '75px';
        mario.style.marginLeft = '20px';

        clearInterval(loop);

        scoredisplay.textContent = score;

        setTimeout(() =>{

            window.location.href = "./menu.php";

        },1000)

    }
}, 10);


document.addEventListener('keydown',jump);
