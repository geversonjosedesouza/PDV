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
    const addProduto = () => {
        console.log("estou aqui botão incluir!");
        //PESQUISANDO ELEMENTOS POR ID
        const produtoSelecionado = $('#selectProdutos option:selected');
        //const produtoSelecionado =$("#selectProdutos").attr('selected','selected');
        const tbody = $('#itensVenda');
        const quantidade = $('#quantidadeItem');
        const totalItens = $('#totalItens');
        const totalValor = $('#totalValor');
        if (quantidade.val() != 0 && quantidade != '') {
            //ADICIONANDO ITENS NA TABELA
            tbody.append(`<tr class="itensAdd">
                       <td>${produtoSelecionado.html()}</td>
                       <td>provisório</td>
                       <td>${quantidade.val()}</td>
                       <td>${produtoSelecionado.attr('data-valor')}</td>
                       <td>${produtoSelecionado.attr('data-valor') * quantidade.val()}</td>
                       <td> <a data-toggle="modal" href="#excluir" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                       </td>
                   </tr>`);
            //ATRIBUINDO VALORES AO RODAPE DA TABELA
            totalItens.val(eval(totalItens.val() + '+' + quantidade.val()));
            totalValor.val(eval(totalValor.val() + '+' + eval(produtoSelecionado.attr('data-valor') + '*' + quantidade.val())));
            console.log('Qtd itens:' + totalItens.val());
            console.log('Qtd valor:' + totalValor.val());
            //RESETANDO VALORES DO FORM
            $("select").prop('selectedIndex', 0);
            quantidade.val('0');
        } else {
            alert("Ops!\nTem que selecionar um produto, e/ou\n não pode existir campos vazios ou quantidades igual a zero!");
        }
    };
</script>
<div class="col-lg-3"><?php menu(); ?></div>
<div class="col-lg-9 jumbotron">
    <form action="<?php echo server_url('?page=ControllerPedido&option=atualizar'); ?>" method="post">
        <input type="hidden" value="<?php echo $pedido_aberto->pedi_pk_id; ?>" name="pedi_pk_id" class="form-control">
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
                    <input type="date" id="dataVenda" name="pedi_data" value="<?php echo date('Y-m-d'); ?>" class="form-control" style="width: 160px"required>
                </th>
                <th>
                    <button id="fecharVenda" class="btn btn-default" style="width: 100px;margin-left: 5px;margin-top: 25px"><span class="glyphicon glyphicon-ok-sign"> Finalizar</span></button>
                </th>
                <th>
                    <a id="cancelar" onclick="cancelarVenda()" class="btn btn-default" style="width: 100px;margin-left: 5px;margin-top: 25px"><span class="glyphicon glyphicon-remove-sign"> Cancelar</span></a>
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
                    <a id="addItem" onclick="addProduto()" class="btn btn-default" style="width: 100px;margin-left: 5px;margin-top: 25px"><span class="glyphicon glyphicon-plus-sign"> Incluir</span></a>
                </th>
                <th>
                    <label style="width: 100px;margin-left: 5px;margin-top: 25px;color: red"><?php echo $pedido_aberto->pedi_status ?></label>
                </th>
            </tr>
        </table><br>
        <?php
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
            echo '<td>Total itens :<input type="text" name="pedi_quantidade" id="totalItens"  value="', $pedido_aberto->pedi_quantidade, '" style="width: 100px" ></td>';
            echo '<td>Valor total R$:<input type="text" name="pedi_total" id="totalValor" value="', $pedido_aberto->pedi_total, '" style="width: 100px" ></td>';
            echo '</tr>';
            echo '</tfoot>';
            echo '</table>';
        }
        ?>
    </form>
</div>
<div class = "modal fade" id = "excluir_item" data-toggle = "modal">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <div class = "modal-title">Você tem certeza?</div>
            </div>
            <div class = "modal-body">

            </div>
            <div class = "modal-footer">
                <a href = "<?php server_url('?page=ControllerItem&option=excluir&item_pk_id=' . $cada_item->item_pk_id); ?>" class = "btn btn-danger">Sim</a>
                <button class = "btn btn-danger" data-dismiss = "modal">Não</button>
            </div>
        </div>
    </div>
</div>
</form>
</div>
