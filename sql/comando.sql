ALTER TABLE `cliente` CHANGE `telefoneCleinte` `telefoneCliente` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;


ALTER TABLE servico ADD CONSTRAINT FK_categoria_idCategoria FOREIGN KEY(id_Categoria) REFERENCES categoria.id_Categoria;



ALTER TABLE freelancer ADD CONSTRAINT fk_CatgFreelancer FOREIGN KEY (id_Categoria) REFERENCES categoria (id_Categoria)

ALTER TABLE atendimentocliente ADD CONSTRAINT fk_ClienAtendimento FOREIGN KEY (id_Cliente) REFERENCES cliente (id_Cliente)

ALTER TABLE pedido ADD CONSTRAINT fk_CatgPedido FOREIGN KEY (id_Categoria) REFERENCES categoria (id_Categoria)

ALTER TABLE pedido ADD CONSTRAINT fk_ClientePedido FOREIGN KEY (id_Cliente) REFERENCES cliente (id_Cliente)

ALTER TABLE pedido ADD CONSTRAINT fk_FreelaPedido FOREIGN KEY (id_Freelancer) REFERENCES freelancer (id_Freelancer)