<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Exercicios</h1>
<script>
    function copiar() {
        var textCopy = document.getElementById("primeiroParagrafo");
        document.getElementById("segundoParagrafo").innerHTML = textCopy.innerHTML;
        textCopy.innerHTML = 'O conteúdo foi copiado';
    }
    function livro() {
        alert('Não cocluída');
        var obj = document.getElementsByTagName('td');
        if (obj.length % 2 === 0) {
            obj.style.background = 'blue';
            alert(obj.length);
        }
        obj.style.background = 'blue';
        alert(obj.length);
    }
    function adiciona() {
        alert('Não cocluída');
        var newTag = document.createElement('li');
        var descricao = document.getElementById('novaDescricao');
        var tagOl = document.getElementsByTagName('ol');
        newTag.setAttribute('id', 'myLi');

        if (descricao.value != "") {
            newTag.innerText = descricao.value;
            tagOl[0].appendChild(newTag);
        }


    }
</script>
<p id="primeiroParagrafo" >De que são feitos os dias?- De pequenos desejos,vagarosas saudades,silenciosas lembranças. </p><br>
<p id="segundoParagrafo" >Entre mágoas sombrias,momentâneos lampejos:vagas felicidades,inatuais esperanças.  </p>
<button onclick="copiar()">Clique no botão para ver o que acontece</button> </br></br>
<hr>
<table border="1">
    <tr>
        <th id="nomeLivro" onclick="livro()">Nome do Livro</th> <th id="quantPag" onclick="pag()">Quantidade de Páginas</th>
    </tr>
    <tr>
        <td>Tec. para Internet 2</td> <td>500</td>
    </tr>
    <tr>
        <td>Como Aprender Programar</td><td>1500</td>
    </tr>
    <tr>
        <td>HTML 5</td><td>300</td>
    </tr>
    <tr>
        <td>CSS3</td><td>600</td>
    </tr>
</table>
<hr>
<ol id="idol">

</ol>
<form>
    <input type=”text” id="novaDescricao">Descrição do Item</input></br>
    <input type="submit" onclick="adiciona();" value="adiciona" />
    <input type="reset" value="limpa" />
</form>
