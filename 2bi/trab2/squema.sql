CREATE TYPE tipos AS ENUM ('receita', 'despesa');

CREATE TYPE categorias AS ENUM ('alimentação', 'supermercado', 'gasolina', 'roupas', 'remédios', 'outros');

CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY, 
	login VARCHAR(50), 
	senha VARCHAR(8),
	saldo REAL NOT NULL
);

CREATE TABLE movimentacoes (
	id_m SERIAL NOT NULL PRIMARY KEY,
	tipo tipos,
	valor REAL,
	categoria categorias,
	data DATE,
	efetivada BOOLEAN,
	comentario VARCHAR(500),
	id_u INTEGER NOT NULL REFERENCES usuarios(id)
);


INSERT INTO usuarios (login, senha, saldo) VALUES ('lauraadalmolin', 1234, 0);

--DROP TABLE usuarios;
