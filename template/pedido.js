/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function () {

    var temItens = 0;
    var temTotal = 0;
    var tbItens = localStorage.getItem("tbItens");
    const addProduto = () => {
        console.log("estou aqui botão incluir!");
        //PESQUISANDO ELEMENTOS POR ID
        const produtoSelecionado = $('#selectProdutos option:selected');
        //const produtoSelecionado =$("#selectProdutos").attr('selected','selected');
        const tbody = $('#itensVenda');
        const quantidade = $('#quantidadeItem');
        const totalitens = $('#totalItens');
        const totalvalor = $('#totalValor');
        if (quantidade.val() != 0 && quantidade != '') {
            //ADICIONANDO ITENS NA TABELA
            tbody.append(`<tr class="itensAdd">
                       <td>${produtoSelecionado.html()}</td>
                       <td>provisório</td>
                       <td>${quantidade.val()}</td>
                       <td>${produtoSelecionado.attr('data-valor')}</td>
                       <td>${produtoSelecionado.attr('data-valor') * quantidade.val()}</td>
                   </tr>`);
            //ATRIBUINDO VALORES AO RODAPE DA TABELA
            temItens = eval(temItens + '+' + quantidade.val());
            temTotal += eval(produtoSelecionado.attr('data-valor') + '*' + quantidade.val());
            totalitens.val(temItens);
            totalvalor.val(temTotal);
            //RESETANDO VALORES DO FORM
            $("select").prop('selectedIndex', 0);
            quantidade.val('0');
        } else {
            alert("Ops!\nTem que selecionar um produto, e/ou\n não pode existir campos vazios ou quantidades igual a zero!");
        }
    };

});