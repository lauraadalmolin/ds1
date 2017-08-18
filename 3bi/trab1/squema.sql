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
	codigo VARCHAR(5) PRIMARY KEY,
	disponivel BOOLEAN	
);

CREATE TABLE funcionarios (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(30),
	login VARCHAR(40),
	senha VARCHAR(8),
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

INSERT INTO funcionarios (nome, login, senha, gerente) VALUES ('Laura Dalmolin', 'lauraadalmolin', '1234', TRUE);
INSERT INTO funcionarios (nome, login, senha, gerente) VALUES ('Victor Colares', 'victorhcolares', '1234', FALSE);
INSERT INTO funcionarios (nome, login, senha, gerente) VALUES ('Laura Gomes', 'lauratgomes', '1234', FALSE);

INSERT INTO registros (entrada, saida, id_vaga, placa, id_funcionario) VALUES ('2017-08-18 15:07', '2017-08-18 16:32', 'M11', 'AAA-0001', 1);
INSERT INTO registros (entrada, saida, id_vaga, placa, id_funcionario) VALUES ('2017-08-18 15:14', '2017-08-18 16:40', 'C11', 'AAA-0000', 2);
INSERT INTO registros (entrada, saida, id_vaga, placa, id_funcionario) VALUES ('2017-08-18 15:25', '2017-08-18 16:50', 'O11', 'AAA-0002', 1);
INSERT INTO registros (entrada, saida, id_vaga, placa, id_funcionario) VALUES ('2017-08-18 15:32', '2017-08-18 16:55', 'O12', 'AAA-0003', 1);

#SELECT v.id_vaga, r.placa, r.saida FROM registros r FULL OUTER JOIN vagas v ON (v.id_vaga = r.id_vaga) WHERE  v.id_vaga IS NOT NULL ORDER  BY r.saida DESC
#SELECT (EXTRACT(EPOCH FROM '2017-04-17 14:00:00'::TIMESTAMP))/3600 - EXTRACT(EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = 'XXX-7777' AND saida IS NULL
#SELECT EXTRACT(EPOCH FROM '2017-04-17 14:00'::TIMESTAMP)/3600 - EXTRACT(EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = 'XXA-0000' AND saida IS NULL