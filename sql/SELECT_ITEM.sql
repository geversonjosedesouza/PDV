/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  geverson
 * Created: 10/12/2018
 */

SELECT item_quantidade, item_valor, prod_nome, pedi_pk_id FROM item
INNER JOIN 
produto ON prod_pk_id = item_fk_produto
INNER JOIN 
pedido ON pedi_pk_id = item_fk_pedido
 WHERE item_fk_pedido = 1;
