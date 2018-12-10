/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  geverson
 * Created: 05/12/2018
 */

SELECT `vend_pk_id`, `vend_quantidade`, `vend_subtotal`,`vend_data`, `clie_nome`
FROM `venda` INNER JOIN `cliente` ON `clie_pk_id`= `vend_fk_cliente`