/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  geverson
 * Created: 06/12/2018
 */

ALTER TABLE pedido
ADD FOREIGN KEY (pedi_fk_cliente) REFERENCES cliente(clie_pk_id);