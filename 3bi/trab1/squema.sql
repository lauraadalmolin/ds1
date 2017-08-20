CREATE TABLE tipos (
	id SERIAL NOT NULL PRIMARY KEY,
	descricao VARCHAR(30)
);

CREATE TABLE veiculos (
	placa VARCHAR(8) PRIMARY KEY,
	id_tipo INTEGER NOT NULL REFERENCES tipos (id) ,
	marca VARCHAR(30),
	modelo VARCHAR(30),
	cor VARCHAR(20)	
);

CREATE TABLE vagas (
	id_vaga SERIAL,
	codigo VARCHAR(5) PRIMARY KEY,
	disponivel BOOLEAN DEFAULT TRUE
);

CREATE TABLE funcionarios (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(30),
	login VARCHAR(40),
	senha VARCHAR(32),
	gerente BOOLEAN DEFAULT FALSE	
);

CREATE TABLE registros (
	entrada TIMESTAMP,
	saida TIMESTAMP,
	id_vaga VARCHAR(5) REFERENCES vagas (codigo),
	placa VARCHAR(8) REFERENCES veiculos (placa),
	id_funcionario INTEGER REFERENCES funcionarios (id),
	PRIMARY KEY (entrada, placa)	
);

CREATE TABLE precos (
	preco_carro DECIMAL,
	preco_moto DECIMAL,
	preco_outro DECIMAL,
	preco_pernoite DECIMAL,
	preco_diaria DECIMAL
);

INSERT INTO precos (preco_carro, preco_moto, preco_outro, preco_pernoite, preco_diaria) VALUES (5, 4, 7, 18, 25);

INSERT INTO tipos (descricao) VALUES ('CARRO')
INSERT INTO tipos (descricao) VALUES ('MOTO')
INSERT INTO tipos (descricao) VALUES ('OUTRO')

INSERT INTO veiculos (placa, id_tipo, marca, modelo, cor) VALUES ('AAA-0000', 1, 'Ford', 'Fiesta', 'Preto fosco')
INSERT INTO veiculos (placa, id_tipo, marca, modelo, cor) VALUES ('AAA-0001', 2, 'Harley Davidson', 'Laura', 'Laranja')
INSERT INTO veiculos (placa, id_tipo, marca, modelo, cor) VALUES ('AAA-0002', 3, 'Toyota', 'Amora', 'Branco')
INSERT INTO veiculos (placa, id_tipo, marca, modelo, cor) VALUES ('AAA-0003', 3, '-', 'Carrinho de Pipoca', 'Branco')

INSERT INTO vagas (codigo) VALUES ('M11');
INSERT INTO vagas (codigo) VALUES ('M12');
INSERT INTO vagas (codigo) VALUES ('M13');
INSERT INTO vagas (codigo) VALUES ('C11');
INSERT INTO vagas (codigo) VALUES ('C12');
INSERT INTO vagas (codigo) VALUES ('C13');
INSERT INTO vagas (codigo) VALUES ('C14');
INSERT INTO vagas (codigo) VALUES ('C15');
INSERT INTO vagas (codigo) VALUES ('C16');
INSERT INTO vagas (codigo) VALUES ('C17');
INSERT INTO vagas (codigo) VALUES ('C18');
INSERT INTO vagas (codigo) VALUES ('O11');
INSERT INTO vagas (codigo) VALUES ('O12');
INSERT INTO vagas (codigo) VALUES ('O13');

INSERT INTO funcionarios (nome, login, senha, gerente) VALUES ('Laura Dalmolin', 'lauraadalmolin', '81dc9bdb52d04dc20036dbd8313ed055', TRUE);
INSERT INTO funcionarios (nome, login, senha, gerente) VALUES ('Victor Colares', 'victorhcolares', '81dc9bdb52d04dc20036dbd8313ed055', FALSE);
INSERT INTO funcionarios (nome, login, senha, gerente) VALUES ('Laura Gomes', 'lauratgomes', '81dc9bdb52d04dc20036dbd8313ed055', FALSE);


#SELECT v.id_vaga, r.placa, r.saida FROM registros r FULL OUTER JOIN vagas v ON (v.id_vaga = r.id_vaga) WHERE  v.id_vaga IS NOT NULL ORDER  BY r.saida DESC
#SELECT (EXTRACT(EPOCH FROM '2017-04-17 14:00:00'::TIMESTAMP))/3600 - EXTRACT(EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = 'XXX-7777' AND saida IS NULL
#SELECT EXTRACT(EPOCH FROM '2017-04-17 14:00'::TIMESTAMP)/3600 - EXTRACT(EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = 'XXA-0000' AND saida IS NULL