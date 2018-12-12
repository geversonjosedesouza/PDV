<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9 jumbotron">
    <form action="<?php echo server_url('?page=ControllerPedido&option=salvar'); ?>" method="post">
        <legend>Nota Fiscal</legend>
        <table>
            <tr>
                <th>
                    <label>Cliente</label>
                    <select name="pedi_fk_cliente" id="nomeCliente" class="form-control" style="width: 300px" required>
                        <?php
                        echo '<option value="', $pedido->clie_pk_id, '">', $pedido->clie_nome, '</option>';
                        ?>
                    </select>
                </th>
                <th>
                    <label>Data</label>
                    <input type="date" id="dataVenda" name="pedi_data" value="<?php echo $pedido->pedi_data; ?>" class="form-control" style="width: 160px"required>
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
                            echo '<option>VAZIO!</option>';
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
        </table><br> <?php
        if ($itens == false) {
            echo '<h2>Não existe(m) pedido(s) cadastrado(s)!</h2>';
        } else {
            echo '<table border="1" ';
            echo ' <thead>';
            echo '<tr>';
            echo '<th>Produto</th>';
            echo '<th>Imagem</th>';
            echo '<th>Quantidade</th>';
            echo '<th>Valor</th>';
            echo '<th>Subtotal</th>';
            echo '<th>Opções</th>';
            echo '</tr>';
            echo '</thead>';
            foreach ($itens as $cada_item) {
                echo '<tbody id="itensVenda">';
                echo '<tr>';
                echo '<td>', $cada_item->prod_nome, '</td>';
                echo '<td>', $cada_item->prod_imagem, '</td>';
                echo '<td>', $cada_item->item_quantidade, '</td>';
                echo '<td>', $cada_item->item_valor, '</td>';
                echo '<td>', $cada_item->item_quantidade * $cada_item->item_valor, '</td>';
                echo '<td>';
                echo '<a data-toggle="modal" href="', server_url('?page=ControllerItem&option=excluir&item_pk_id=' . $cada_item->item_pk_id), '" class="btn btn-danger">';
                echo '<span class="glyphicon glyphicon-trash"></span>';
                echo '</a>';
                echo '</td>';
                echo '</tr>';
                echo '</tbody>';
            }
            echo '<tfoot>';
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td>Total itens :<input type="text" name="pedi_quantidade" id="totalItens"  value="', $pedido->pedi_quantidade, '" style="width: 100px" ></td>';
            echo '<td>Valor total R$:<input type="text" name="pedi_total" id="totalValor" value="', $pedido->pedi_total, '" style="width: 100px" ></td>';
            echo '</tr>';
            echo '</tfoot>';
            echo '</table>';
        }
        ?>
    </form>
</div>
