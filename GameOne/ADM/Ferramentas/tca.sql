CREATE DATABASE tca2023;

USE tca2023;

CREATE TABLE administrador(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(300) NOT NULL COMMENT 'Nome do administrador',
    email VARCHAR(300) NOT NULL COMMENT 'Email do administrador',
    senha VARCHAR(64) NOT NULL COMMENT 'Senha do administrador (em sha256)',
    datahora DATETIME NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
    poder INT(1) NOT NULL COMMENT 'Nivel do administrador (9 = maximo)',
    status INT(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
);

-- CREATE TABLE produto(
--     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     imgGd VARCHAR(17) NOT NULL COMMENT 'Imagem grande',
--     imgMd VARCHAR(17) NOT NULL COMMENT 'Imagem media',
--     imgPq VARCHAR(17) NOT NULL COMMENT 'Imagem pequena',
--     nome VARCHAR(300) NOT NULL COMMENT 'Nome do produto',
--     tipo VARCHAR(100) NOT NULL COMMENT 'Vai ver se é um console, jogo ou apetrecho gaymer',
--     marca VARCHAR(100) NOT NULL COMMENT 'Ve de que marca ele pertence',
--     datahora DATETIME NOT NULL COMMENT 'Registro: YYY-MM-DD HH:MM:SS',
--     status INT(1) NOT NULL COMMENT '1 = ativo ; 0 = inativo'
-- );

INSERT INTO administrador (id, nome, email, senha, datahora, poder, status) VALUES (1, 'Adm', 'adm123@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2023-08-03 19:41:14', '9', '1');