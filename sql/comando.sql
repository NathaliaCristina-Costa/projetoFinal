ALTER TABLE `cliente` CHANGE `telefoneCleinte` `telefoneCliente` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;


ALTER TABLE servico ADD CONSTRAINT FK_categoria_idCategoria FOREIGN KEY(id_Categoria) REFERENCES categoria.id_Categoria;



ALTER TABLE freelancer ADD CONSTRAINT fk_CatgFreelancer FOREIGN KEY (idCategoria) REFERENCES categoria (id_Categoria);

ALTER TABLE atendimentocliente ADD CONSTRAINT fk_ClienAtendimento FOREIGN KEY (id_Cliente) REFERENCES cliente (id_Cliente);

ALTER TABLE pedido ADD CONSTRAINT fk_CatgPedido FOREIGN KEY (id_Categoria) REFERENCES categoria (id_Categoria);

ALTER TABLE pedido ADD CONSTRAINT fk_ClientePedido FOREIGN KEY (idCliente) REFERENCES cliente (id_Cliente);

ALTER TABLE pedido ADD CONSTRAINT fk_FreelaPedido FOREIGN KEY (id_Freelancer) REFERENCES freelancer (id_Freelancer);

ALTER TABLE pagamento ADD CONSTRAINT fk_FreelaPagamento FOREIGN KEY (idFreelancer) REFERENCES freelancer (id_Freelancer);

ALTER TABLE `atendimentocliente` ADD `dataMensagem` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `mensagem`;

ALTER TABLE atendimentofreelancer ADD CONSTRAINT fk_FreelaAtendimento FOREIGN KEY (idFreelancer) REFERENCES freelancer (id_Freelancer)

ALTER TABLE `freelancer` ADD `cpf` VARCHAR(15) NOT NULL AFTER `telefone`, ADD `cep` VARCHAR(15) NOT NULL AFTER `cpf`, ADD `rua` VARCHAR(45) NOT NULL AFTER `cep`, ADD `bairro` VARCHAR(45) NOT NULL AFTER `rua`, ADD `cidade` VARCHAR(45) NOT NULL AFTER `bairro`, ADD `uf` VARCHAR(2) NOT NULL AFTER `cidade`;