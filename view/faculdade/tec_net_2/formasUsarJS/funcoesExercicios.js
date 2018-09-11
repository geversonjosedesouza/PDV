/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var objOriginal;
var largura, tamanho;
function mudaCor() {
    objOriginal = document.getElementById('primeiroParagrafo');
    objOriginal.style.color = 'green';
}
function ocultar() {
    objOriginal = document.getElementById('segundoParagrafo');
    objOriginal.style.display = 'none';
}
function mostrar() {
    objOriginal = document.getElementById('segundoParagrafo');
    objOriginal.style.display = 'block';
}
function trocarImg() {
    objOriginal = document.getElementById('primeiraImagem');
    objOriginal.setAttribute('src', '../../../../../img/adulto.png');
    console.log('Imagem Trocada com Sucesso!');
}
function pequena() {
    objOriginal = document.getElementById('segundaImagem');
    objOriginal.setAttribute('width', '100');
    objOriginal.setAttribute('height', '100');
    console.log('Imagem Aumentada com Sucesso!');
}
function media() {
    objOriginal = document.getElementById('segundaImagem');
    objOriginal.setAttribute('width', '300');
    objOriginal.setAttribute('height', '300');
    console.log('Imagem Aumentada com Sucesso!');
}
function grande() {
    objOriginal = document.getElementById('segundaImagem');
    objOriginal.setAttribute('width', '500');
    objOriginal.setAttribute('height', '500');
    console.log('Imagem Aumentada com Sucesso!');
}
function tamanhoPadrao(obj) {
    
   console.log(obj.value);
    largura = obj.naturalWidth;
    tamanho = obj.naturalHeight;
    obj.setAttribute('width', largura);
    obj.setAttribute('height', tamanho);
    console.log('Imagem Aumentada com Sucesso! x= '+largura+' y= '+tamanho);
}