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