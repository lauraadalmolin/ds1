CREATE TABLE veiculos (
	placa VARCHAR(8) PRIMARY KEY,
	tipo tipo_veiculo,
	marca VARCHAR(30),
	modelo VARCHAR(30),
	cor VARCHAR(20)
	
);

CREATE TABLE vagas (
	id_vaga SERIAL NOT NULL PRIMARY KEY,
	disponivel BOOLEAN	
);

CREATE TABLE registros (
	entrada TIMESTAMP,
	saida TIMESTAMP,
	id_vaga INTEGER REFERENCES vagas (id_vaga),
	placa VARCHAR(8) REFERENCES veiculos (placa),
	PRIMARY KEY (entrada, placa)
	
);


INSERT INTO veiculos (placa, tipo, marca, modelo, cor) VALUES ('AAA-0000', 'carro', 'Ford', 'Fiesta', 'Branco')

CREATE TYPE tipo_veiculo AS ENUM ('carro', 'moto', 'camionete');

SELECT v.id_vaga, r.placa, r.saida FROM registros r FULL OUTER JOIN vagas v ON (v.id_vaga = r.id_vaga) WHERE  v.id_vaga IS NOT NULL ORDER  BY r.saida DESC
DROP TABLE vagas CASCADE

CREATE TABLE vagas (
	id_vaga SERIAL NOT NULL PRIMARY KEY,
	disponivel BOOLEAN	
);

INSERT INTO vagas (disponivel) VALUES (true);
SELECT * FROM registros;

SELECT (EXTRACT(EPOCH FROM '2017-04-17 14:00:00'::TIMESTAMP))/3600 - EXTRACT(EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = 'XXX-7777' AND saida IS NULL


SELECT EXTRACT(EPOCH FROM '2017-04-17 14:00'::TIMESTAMP)/3600 - EXTRACT(EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = 'XXA-0000' AND saida IS NULL