-- Criar o banco de dados (caso não exista)
CREATE DATABASE IF NOT EXISTS sistema_curso;
USE sistema_curso;

-- 1. Tabela para a função Inserir() e Consultar()
CREATE TABLE IF NOT EXISTS avaliacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    escolha VARCHAR(255) NOT NULL,
    data_avaliacao DATETIME NOT NULL
);

-- 2. Tabela para a função Verificar()
CREATE TABLE IF NOT EXISTS login_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL -- 32 caracteres pois o código usa MD5
);

-- Inserção de um usuário de teste (opcional)
-- A senha '123456' convertida para MD5 é 'e10adc3949ba59abbe56e057f20f883e'
INSERT INTO login_usuario (usuario, senha) VALUES ('admin', MD5('123456'));
