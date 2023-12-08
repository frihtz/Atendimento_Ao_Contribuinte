/*Apenas um exemplo para a criação da tabela*/

/*Ele será usado de guia para o desenvolvimento do sistema*/

CREATE TABLE pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    sexo CHAR(1) NOT NULL,
    cidade VARCHAR(255),
    bairro VARCHAR(255),
    rua VARCHAR(255),
    numero VARCHAR(10),
    complemento VARCHAR(255)
);

CREATE TABLE protocolo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT NOT NULL,
    data_abertura DATE NOT NULL,
    prazo INT NOT NULL,
    contribuinte_id INT,
    FOREIGN KEY (contribuinte_id) REFERENCES pessoa(id)
);