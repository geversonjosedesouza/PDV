--USUÁRIOS
--INSERT INTO `usuario`(`usua_nome`, `usua_senha`, `usua_status`, `usua_tipo`) VALUES ("root@root","admin","ATIVO","FUNCIONARIO");
--VENDAS
--INSERT INTO `venda`(`vend_fk_cliente`, `vend_fk_produto`, `vend_quantidade`, `vend_valor`, `vend_subtotal`, `vend_data`) VALUES (1,1,2,20,20,'2018-05-12'),(1,2,2,20,20,'2018-05-12'),(1,3,2,20,20,'2018-05-12');
--MAIS VENDAS
--INSERT INTO `venda` (`vend_pk_id`,`vend_fk_cliente`, `vend_fk_produto`, `vend_quantidade`, `vend_valor`, `vend_subtotal`, `vend_data`) VALUES (1,1, 1, 2, 20, 20, '2018-05-12'), (1,1, 2, 2, 20, 20, '2018-05-12'), (1,1, 3, 2, 20, 20, '2018-05-12'), (2,2, 1, 2, 20, 20, '2018-05-12'), (2,2, 2, 2, 20, 20, '2018-05-12'), (2,2, 3, 2, 20, 20, '2018-05-12'), (3,3, 1, 2, 20, 20, '2018-05-12'), (3,3, 2, 2, 20, 20, '2018-05-12'), (3,3, 3, 2, 20, 20, '2018-05-12')
--PEDIDO
--INSERT INTO pedido(pedi_pk_id) VALUES(2);
--ITEM
INSERT INTO item(item_pk_id,item_fk_produto,item_fk_pedido,item_quantidade,item_valor)
VALUES (3,1,2,10,99.9),(4,1,2,10,99.9);