CREATE TABLE carros (
	codigo INTEGER NOT NULL,
	modelo VARCHAR(20),
	ano INTEGER,
	preco DOUBLE PRECISION,
	COR VARCHAR(20),
	CONSTRAINT carros_pkey PRIMARY KEY (codigo)
);

INSERT INTO carros VALUES (1, 'Fiesta', 2017, 40000, 'Preto');
INSERT INTO carros VALUES (2, 'Focus', 2017, 70000, 'Preto');