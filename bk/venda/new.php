<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script src="../../template/funcoes.js"></script>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-6 jumbotron" style="width: 75%">
    <!--<form action="/<?php echo server_url('?page=ControllerVenda&option=salvar'); ?>" method="post">-->
    <legend>Nota Fiscal</legend>
    <table>
        <tr style="alignment-baseline: central">
            <th>
                <label>Cliente</label>
                <select id="nomeCliente" nome="vend_fk_cliente" class="form-control" style="width: 300px" required>
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
                <input type="date" id="dataVenda" name="vend_data" placeholder="Escolha uma data" class="form-control" style="width: 160px"required>
            </th>
            <th>
                <button id="fecharVenda" onclick="fecharVenda()" class="btn btn-block glyphicon glyphicon-ok-sign" style="width: 100px"> Finalizar</button>
            </th>
            <th>
                <button id="cancelar" onclick="cancelarVenda()" class="btn btn-block glyphicon glyphicon-remove-sign" style="width: 100px"> Cancelar</button>
            </th>
        </tr>
        <tr>
            <th>
                <label>Produto</label>
                <select id="selectProdutos" class="form-control" style="width: 150px">
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
                <input type="number" id="quantidadeItem" class="form-control"style="width: 100px">
            </th>
            <th>
                <button id="addItem" onclick="alert('OPS!')" class="btn btn-block glyphicon glyphicon-plus-sign" style="width: 100px"> Incluir</button>
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
                <td>Total itens:<span id="totalItens">0</span></td>
                <td></td>
                <td>Valor total:<span id="totalValor">0</span></td>
            </tr>
        </tfoot>
    </table>
    <!--</form>-->
</div>