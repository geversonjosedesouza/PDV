/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function carregarProdutos() {
    var obj = document.getElementById('listaProduto');
    listProdutos().map((i) => {
        var item = document.createElement('option');
        item.value = i.cod;
        item.text = i.nome;
        item.setAttribute('data-valor', i.preco);
        obj.appendChild(item);
    });
}

function listProdutos() {
    var produtos = [
        {cod: 1, nome: "Café", preco: 0.50},
        {cod: 2, nome: "Computador", preco: 1999.99},
        {cod: 3, nome: "Livro", preco: 249.99},
        {cod: 4, nome: "Mesa", preco: 135.00}
    ];
    return produtos;
}

function add() {
    var qtdItens
    var qtdTotalItens = 0;
    var tbody = document.getElementById('dados');
    var tr = document.createElement('tr');
    var colunaProduto = document.createElement('td');
    var colunaQuantidade = document.createElement('td');
    var colunaSubtotal = document.createElement('td');
    var produtoSelecionado = document.getElementById('listaProduto');
    
    var quantidade = document.getElementById('qtd');
   
    var totalitens = document.getElementById('totalItens');
    var totalvalor = document.getElementById('totalValor');


    if (quantidade.value != '' && totalitens.value != '') {
        colunaProduto.innerHTML = produtoSelecionado.options[produtoSelecionado.selectedIndex].text;
        colunaQuantidade.innerHTML = quantidade.value;
        colunaSubtotal.innerHTML = eval(produtoSelecionado.options[produtoSelecionado.selectedIndex].dataset.valor + '*' + quantidade.value);
        tr.appendChild(colunaProduto);
        tr.appendChild(colunaQuantidade);
        tr.appendChild(colunaSubtotal);
        tbody.appendChild(tr);

        qtdItens++;
        qtdTotalItens += eval(produtoSelecionado.options[produtoSelecionado.selectedIndex].dataset.valor + '*' + quantidade.value);

        totalitens.innerHTML = qtdItens;
        totalvalor.innerHTML = qtdTotalItens;
        produtoSelecionado.selectedIndex = 0;
        quantidade.value = '';
    } else {
        alert("Ops! Não pode existir campos vazios!");
    }
}
