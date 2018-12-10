/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global produtos */
var temItens = 0;
var temTotal = 0;
var tbItens = localStorage.getItem("tbItens");
//const verificaLocal = () => {
//    tbItens = JSON.parse(tbItens);
//    if (tbItens == null) {
//        tbItens = [];
//        console.log('o local storage está vazio!')
//    } else {
//        recarregaTabela();
//        console.log('o local storage está vazio!')
//    }
//};
//
//const recarregaTabela = () => {
//    const tbody = $('#itensVenda');
//    for (var i in tbItens) {
//        var it = JSON.parse(tbItens[i]);
//        tbody.append(`<tr class="itensAdd">
//                        <td>${it.nome}</td>
//                        <td>${it.img}</td>
//                        <td>${it.quantidade}</td>
//                        <td>${it.valor}</td>
//                        <td>${it.total}</td>
//                    </tr>`);
//    }
//};

//const preencherSelect = () => {
////PREENCHENDO O SELECT
//    const  p = $('#selectProdutos');
//    produtos.map(i => {
//        p.append(`<option value="${i.cod}" data-valor="${i.valor}">${i.nome} <img src="${i.img}" ></option>`);
//    });
//};
const addProduto = () => {
    console.log("estou aqui botão incluir!");
    //PESQUISANDO ELEMENTOS POR ID
    const produtoSelecionado = $('select option:selected');
    const tbody = $('#itensVenda');
    const quantidade = $('#quantidadeItem');
    const totalitens = $('#totalItens');
    const totalvalor = $('#totalValor');
    if (quantidade.val() != 0 && quantidade != '' && produtoSelecionado.html() != '--Selecione-- ') {
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
        totalitens.text(temItens);
        totalvalor.text(temTotal);
        //RESETANDO VALORES DO FORM
        $("select").prop('selectedIndex', 0);
        quantidade.val('0');
        //PREENCHENDO LOCAL STORAGE
        salvarItensLocal(produtoSelecionado.html(), "provisorio", quantidade.val(), produtoSelecionado.attr('data-valor'), produtoSelecionado.attr('data-valor') * quantidade.val());
    } else {
        alert("Ops!\nTem que selecionar um produto, e/ou\n não pode existir campos vazios ou quantidades igual a zero!");
    }
};
var habilitandoCampos = (hNome, hData, hNova, hFechar, hCancelar, hProduto, hQuantidade, hAdiciona) => {
    //PESQUISANDO ELEMENTO POR ID
    const nome = $('#nomeCliente');
    const data = $('#dataVenda');
    const nova = $('#novaVenda');
    const fechar = $('#fecharVenda');
    const cancelar = $('#cancelar');
    const produto = $('#selectProdutos');
    const quantidade = $('#quantidadeItem');
    const adiciona = $('#addItem');
    //HABILITANDO OU DESABILITANDO CAMPOS
    nome.prop("disabled", hNome);
    data.prop("disabled", hData);
    nova.prop("disabled", hNova);
    fechar.prop("disabled", hFechar);
    cancelar.prop("disabled", hCancelar);
    produto.prop("disabled", hProduto);
    quantidade.prop("disabled", hQuantidade);
    adiciona.prop("disabled", hAdiciona);
};
const novaVenda = () => {
    //HABILITANDO OU DESABILITANDO CAMPOS
    habilitandoCampos(false, false, true, false, false, false, false, false);
    console.log("estou aqui botão nova venda!");
};
const fecharVenda = () => {
    const cFechaVenda = confirm("Você confirma o fechamento da venda?");
    if (cFechaVenda) {
        //HABILITANDO OU DESABILITANDO CAMPOS
        habilitandoCampos(true, true, false, true, true, true, true, true);
    }
    console.log("estou aqui fechar venda!");
};
const cancelarVenda = () => {
    const cCancelaVenda = confirm("Você confirma o cancelamento da venda?");
    if (cCancelaVenda) {
        const todosItens = $('.itensAdd');
        const totalitens = $('#totalItens');
        const totalvalor = $('#totalValor');
        todosItens.empty();
        totalitens.text(0)
        totalvalor.text(0)
        //HABILITANDO OU DESABILITANDO CAMPOS
        habilitandoCampos(true, true, false, true, true, true, true, true);
    }
    console.log("Venda cancelada!");
};
const salvarItensLocal = (nomeItem, imgItem, quantidadeItem, valorItem, totalItem) => {
    var item = JSON.stringify({
        nome: nomeItem,
        img: imgItem,
        quantidade: quantidadeItem,
        valor: valorItem,
        total: totalItem
    });
    tbItens.push(item);
};