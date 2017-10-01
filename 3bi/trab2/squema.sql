-- db noticias
-- login do Administrador: admin
-- senha do Administrador: admin

CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY,
	usuario VARCHAR(70) NOT NULL,
	senha VARCHAR(32) NOT NULL,
	nome VARCHAR(80) NOT NULL, 
	admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE permissoes (
	id SERIAL NOT NULL PRIMARY KEY,
	tipo VARCHAR(20)
);

CREATE TABLE noticias (
	id SERIAL NOT NULL PRIMARY KEY,
	data DATE NOT NULL,
	id_usuario INTEGER NOT NULL REFERENCES usuarios(id) ON DELETE CASCADE,
	titulo VARCHAR(100) NOT NULL,
	texto VARCHAR(800) NOT NULL
);

CREATE TABLE usuario_permissao (
	id SERIAL NOT NULL PRIMARY KEY,
	id_usuario INTEGER NOT NULL REFERENCES usuarios(id) ON DELETE CASCADE,
	id_permissao INTEGER NOT NULL REFERENCES permissoes(id)
);

INSERT INTO usuarios VALUES (DEFAULT, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', TRUE);

INSERT INTO permissoes VALUES (DEFAULT, 'Cadastrar');
INSERT INTO permissoes VALUES (DEFAULT, 'Editar');
INSERT INTO permissoes VALUES (DEFAULT, 'Excluir');

INSERT INTO usuario_permissao VALUES (DEFAULT, 1, 1);
INSERT INTO usuario_permissao VALUES (DEFAULT, 1, 2);
INSERT INTO usuario_permissao VALUES (DEFAULT, 1, 3);