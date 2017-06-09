CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY, 
	login VARCHAR(50), 
	senha VARCHAR(8),
	saldo INTEGER NOT NULL
);

INSERT INTO usuarios (login, senha, saldo) VALUES ('lauraadalmolin', 1234, 0);

DROP TABLE usuarios;

CREATE TABLE movimentacoes (
	id_t INTEGER NOT NULL REFERENCES tipos(id_t),
	id_c INTEGER NOT NULL REFERENCES categorias(id_C),
	data DATE,
	efetivada BOOLEAN,
	comentario VARCHAR(500),
	id_u INTEGER NOT NULL REFERENCES usuarios(id)
);

CREATE TABLE tipos (
	id_t SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(7)
);

CREATE TABLE categorias (
	id_c SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(12)
);