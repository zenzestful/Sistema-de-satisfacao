-- Criar banco com charset correto
CREATE DATABASE IF NOT EXISTS sistema_curso
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE sistema_curso;

-- Tabela avaliacao
CREATE TABLE IF NOT EXISTS avaliacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    escolha VARCHAR(255) NOT NULL,
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela login_usuario
CREATE TABLE IF NOT EXISTS login_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL
);

-- Inserir usuário admin apenas se não existir
INSERT INTO login_usuario (usuario, senha)
SELECT 'admin', MD5('123456')
WHERE NOT EXISTS (
    SELECT 1 FROM login_usuario WHERE usuario = 'admin'
);