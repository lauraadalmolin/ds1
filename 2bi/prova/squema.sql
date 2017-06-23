CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY, 
	login VARCHAR(50), 
	senha VARCHAR(8)
);

CREATE TABLE medicamentos (
	id_m SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	nome_f VARCHAR(50) NOT NULL,
	controlado BOOLEAN NOT NULL,
	quantidade INTEGER NOT NULL,
	preco VARCHAR NOT NULL
);

drop table usuarios

INSERT INTO usuarios (login, senha) VALUES ('lauraadalmolin', '1234');
INSERT INTO usuarios (login, senha) VALUES ('admin', 'admin');

DELETE FROM usuarios WHERE id != 1 AND id != 2

DROP TABLE medicamentos

SELECT * FROM medicamentos WHERE nome ILIKE '%a%'

SELECT * FROM medicamentos WHERE controlado = TRUE

SELECT * FROM medicamentos WHERE quantidade < 45