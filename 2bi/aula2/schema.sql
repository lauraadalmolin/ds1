CREATE TABLE usuarios (
	id SERIAL,
	login VARCHAR(40),
	senha VARCHAR(8),
	email VARCHAR(40)
);

INSERT INTO usuarios (login, senha, email) VALUES ('laura', '1234', 'laura.aguiar.dalmolin@gmail.com');