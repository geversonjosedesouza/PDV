const porId = () => {
    let obj = document.getElementById('p1').innerHTML = "Alterada o conteúdo por ID!";;
    console.log('Mouse sobre: ' + obj);
}
const porNome = () => {
    let obj = document.getElementsByClassName('nome1')[0].innerHTML = "Alterada o conteúdo por NOME DA CLASSE!";
    console.log('Resultado: ' + obj);
}
const porNomeTag = () => {
    let obj = document.getElementsByTagName('p')[9].innerHTML = "Alterada o conteúdo por TAG!";
    console.log('Resultado: ' + obj);
}
const porTudo = () => {
    let obj = document.getElementsByName('nome1');
    console.log('Resultado: ' + obj);
}