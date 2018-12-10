/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  geverson
 * Created: 06/12/2018
 */

CREATE TABLE pedido(
pedi_pk_id INT(11) NOT NULL);
CREATE TABLE item(
item_pk_id INT(11) NOT NULL,
item_fk_produto INT(11) NOT NULL,
item_fk_pedido INT(11) NOT NULL,
item_quantidade FLOAT(11) NOT NULL,
item_valor FLOAT(11) NOT NULL);
