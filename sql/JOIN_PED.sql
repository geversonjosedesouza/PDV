/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  geverson
 * Created: 06/12/2018
 */
SELECT 
pedi_pk_id,clie_nome,pedi_status,pedi_total,pedi_quantidade
FROM 
pedido 
INNER JOIN 
cliente ON pedi_fk_cliente=clie_pk_id;
SELECT
pedi_pk_id, clie_pk_id, clie_nome, pedi_quantidade, pedi_total, pedi_data, pedi_status
FROM
myboutique.pedido
INNER JOIN 
cliente ON pedi_fk_cliente = clie_pk_id WHERE pedi_pk_id = 1;