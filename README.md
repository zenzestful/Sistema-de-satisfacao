# 🐳 Sistema de Satisfação de Atendimento (Docker + PHP + MySQL)

Este projeto tem como objetivo ensinar **containerização com Docker**, utilizando uma aplicação PHP simples conectada a um banco MySQL.

---

## 🎥 Tutorial do Sistema (versão monolítica)

Para aprender como o sistema foi desenvolvido (sem Docker), acesse a playlist:

👉 https://www.youtube.com/playlist?list=PLzgbqywynWfVvaWiM5qjjI8faFxmfYTUX

📌 **Importante:**
Nesta série, o sistema é desenvolvido de forma **monolítica** (PHP + MySQL local).

👉 Neste repositório, o mesmo sistema foi adaptado para rodar com **Docker**, permitindo trabalhar conceitos de:

* Containerização
* Isolamento de serviços
* Infraestrutura moderna

💡 **Recomendação didática:**

1. Primeiro assista à playlist
2. Depois utilize este projeto para aprender Docker

---

## 🎯 Objetivos de Aprendizagem

Ao final deste projeto, o aluno será capaz de:

* Entender o conceito de **containers**
* Criar e gerenciar serviços com **Docker Compose**
* Integrar **PHP + MySQL**
* Utilizar **variáveis de ambiente (.env)**
* Trabalhar com **volumes e persistência de dados**
* Compreender a comunicação entre containers

---

## 🧱 Arquitetura do Projeto

O sistema foi separado em 3 serviços:

* 🧩 **app** → aplicação PHP
* 🗄️ **mysql** → banco de dados
* 🛠️ **phpMyAdmin** → gerenciamento do banco

Todos os serviços se comunicam através de uma rede Docker.

---

## 📁 Estrutura do Projeto

```id="j9l9f4"
sistema_satisfacao/
├── app/                # Código da aplicação PHP
├── mysql-init/         # Scripts de inicialização do banco
│   └── init.sql
├── docker-compose.yml  # Definição dos containers
├── Dockerfile          # Configuração do PHP (extensões)
├── .env.example        # Variáveis de ambiente (modelo)
├── .gitignore
└── README.md
```

---

## ⚙️ Configuração do Ambiente

### 1. Clonar o repositório

```bash id="bpf7z4"
git clone <url-do-repositorio>
cd sistema_satisfacao
```

---

### 2. Criar o arquivo .env

```bash id="0d2saz"
cp .env.example .env
```

---

### 3. Subir os containers

```bash id="fvaplb"
docker-compose up -d --build
```

---

## 🌐 Acessos

* Sistema: http://localhost:8085
* phpMyAdmin: http://localhost:8084

---

## 🔑 Credenciais padrão

Banco de dados:

* Host: `mysql`
* Banco: `sistema_curso`
* Usuário: `user`
* Senha: definida no `.env`

Usuário do sistema:

* Login: `admin`
* Senha: `123456`

---

## 🧠 Conceitos importantes

### 🔹 Monolítico vs Containerizado

* 📦 **Monolítico (vídeo):**

  * PHP + MySQL instalados na máquina
* 🐳 **Containerizado (este projeto):**

  * Cada serviço roda em um container isolado

---

### 🔹 Comunicação entre containers

O PHP NÃO usa `localhost` para acessar o banco.

✔ Correto:

```id="6w5yoe"
mysql (nome do serviço)
```

---

### 🔹 Variáveis de ambiente

As credenciais são definidas no `.env` e acessadas no PHP via:

```php id="20xfxe"
getenv('DB_HOST');
```

---

### 🔹 Persistência de dados

O MySQL utiliza volumes para garantir que os dados não sejam perdidos.

---

### 🔹 Inicialização automática do banco

O arquivo `init.sql` é executado automaticamente na primeira execução do container.

---

## ⚠️ Problemas comuns

### ❌ Erro: "could not find driver"

✔ Solução: instalar `pdo_mysql` no Dockerfile

---

### ❌ Erro: "Access denied"

✔ Verificar usuário e senha no `.env`

---

### ❌ Erro: "headers already sent"

✔ Garantir que `header()` seja chamado antes de qualquer HTML

---
