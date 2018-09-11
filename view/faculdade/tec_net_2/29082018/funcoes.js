const listaImgs = [
        'img/corinthians.png',
        'img/real_madrid.png',
        'img/bayern_munchen.png',
        'img/manchester_united.png'
    ];
    
const trocaIGM = (i) => {
    let img = document.querySelectorAll('img, img.clubes')[i];
    img.setAttribute('src', listaImgs[i]);
    console.log('Mouse sobre: ' + img);
};
const imgSelect = (i, n) => {
    let img = document.querySelectorAll('img, img.clubes')[i];
    img.setAttribute('src', listaImgs[i]);
    if (n === i) {
        alert('Você acertou!')
    }else{
        alert('Você errou!')
    }
    console.log('Mouse sobre: ' + img);
};

const principal = (i) => {
    let img = document.querySelectorAll('img, img.clubes')[i];
    img.setAttribute('src', 'img/principal.png');
    console.log('Mouse saiu: ' + img);
};
const sorteiaIMG = () => {
    let num = Math.random();
    num = Math.floor(num * 4);
    let img = document.querySelectorAll('img, img.sorteio')[0];
    img.setAttribute('src', listaImgs[num]);
    return num;
};