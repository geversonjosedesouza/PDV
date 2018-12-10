<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
    $(document).ready(function () {
    });
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
</script>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron" style="width: 75%">
    <form action="<?php echo server_url('?page=ControllerPedido&option=salvar'); ?>" method="post">
    <legend>Nota Fiscal</legend>
    <table>
        <tr>
            <th>
                <label>Cliente</label>
                <select id="nomeCliente" nome="pedi_fk_cliente" class="form-control" style="width: 300px" required>
                    <?php
                    if ($clientes == false) {
                        echo 'VAZIO';
                    } else {
                        foreach ($clientes as $cada_cliente) {
                            echo '<option value="', $cada_cliente->clie_pk_id, '">', $cada_cliente->clie_nome, '</option>';
                        }
                    }
                    ?>
                </select>
            </th>
            <th>
                <label>Data</label>
                <input type="date" id="dataVenda" name="pedi_data" value="<?php echo date('Y-m-d'); ?>" class="form-control" style="width: 160px"required>
            </th>
            <th>
                <label></label>
                <button id="fecharVenda" class="btn btn-block glyphicon glyphicon-ok-sign" style="width: 100px;margin-left: 5px"> Finalizar</button>
            </th>
            <th><label></label>
                <button id="cancelar" onclick="cancelarVenda()" class="btn btn-block glyphicon glyphicon-remove-sign" style="width: 100px;margin-left: 5px"> Cancelar</button>
            </th>
        </tr>
        <tr>
            <th>
                <label>Produto</label>
                <select id="selectProdutos" class="form-control" style="width: 300px">
                    <?php
                    if ($produtos == false) {
                        echo 'VAZIO!';
                    } else {
                        foreach ($produtos as $cada_produto) {
                            echo '<option value="', $cada_produto->prod_pk_id, '"data-valor="', $cada_produto->prod_valor, '">', $cada_produto->prod_nome, '</option>';
                        }
                    }
                    ?>
                </select>
            </th>
            <th>
                <label>Quantidade</label> 
                <input type="number" id="quantidadeItem" class="form-control"style="width: 160px">
            </th>
            <th>
                <label></label> 
                <button id="addItem" onclick="addProduto()" class="btn btn-block glyphicon glyphicon-plus-sign" style="width: 100px;margin-left:  5px"> Incluir</button>
            </th>
        </tr>
    </table><br>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Imagem</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="itensVenda"></tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td>Total itens :<input type="text" id="totalItens" name="pedi_quantidade" value="0.00" style="width: 100px" disabled="true"></td>
                <td></td>
                <td>Valor total R$:<input type="text" id="totalValor" name="pedi_total" value="0.00" style="width: 100px" disabled="true"></td>
            </tr>
        </tfoot>
    </table>
    </form>
</div>