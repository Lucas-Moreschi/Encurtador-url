# 🔗 Encurtador de URL

Um projeto simples e funcional de encurtador de URLs, desenvolvido em **PHP** com **MySQL**, **jQuery** e **CSS moderno**, com animações e contador de acessos. Ideal para fins de aprendizado ou como base para projetos mais robustos.

---

## ✨ Funcionalidades

- Encurta qualquer URL válida
- Gera código curto aleatório (6 caracteres)
- Redireciona automaticamente para a URL original
- Conta o número de acessos
- Interface moderna com jQuery e animações
- Botão de copiar URL encurtada com feedback visual

---

## 📸 Prévia

![Tela Principal do Encurtador](screenshots/tela-principal.png)

---

## 🚀 Tecnologias Utilizadas

- **PHP (PDO)** – lógica backend e conexão com banco
- **MySQL** – armazenamento das URLs encurtadas
- **HTML5 + CSS3** – estrutura e estilos
- **jQuery** – interações e animações frontend

---

## ⚙️ Como usar

### 1. Clonar o repositório

```bash
git clone https://github.com/Lucas-Moreschi/encurtador-url.git
cd encurtador-url
```

### 2. Configurar o banco de dados

- Crie o banco e a tabela com o seguinte script:

```sql
CREATE DATABASE EncurtadorUrlDB;
USE EncurtadorUrlDB;

CREATE TABLE `urls` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `url_original` VARCHAR(2048) NOT NULL,
  `codigo_encurtado` VARCHAR(10) NOT NULL UNIQUE,
  `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `qtd_acessos` INT UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### 3. Editar o arquivo de conexão

No `conexaodb.php`, configure a conexão com seu banco:

```php
<?php
$host = 'localhost';
$db   = 'EncurtadorUrlDB';
$user = 'usuario';
$pass = 'senha';
$tabela = 'urls';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

---

## ▶️ Como rodar localmente

1. Coloque todos os arquivos em uma pasta no seu servidor local (ex: `htdocs/encurtador-url`).
2. Acesse `http://localhost/encurtador-url/index.html`.
3. Cole uma URL e clique em "Encurtar".
4. O link gerado pode ser acessado por `http://localhost/encurtador-url/redireciona.php?c=abc123`.

---

## 🛡️ Segurança implementada

- Validação de URL no backend com `FILTER_VALIDATE_URL`
- Prepared Statements com PDO para evitar SQL Injection
- Redirecionamento apenas se o código for válido
- Sanitização de parâmetros via GET

---

## 📁 Estrutura

```
.
├── conexaodb.php           # Conexão com o banco
├── encurtador.php          # Lógica para gerar URL curta
├── redireciona.php         # Redireciona para a URL original
├── index.html              # Frontend principal
├── screenshots # Pasta com imagens do projeto
│ └── tela-principal.png # Print da tela principal
└── README.md # Este arquivo
```

---

## 🧩 Melhorias futuras (em desenvolvimento)

- [ ] Login e painel de administração
- [ ] URLs personalizadas (ex: `meusite.com/meulink`)
- [ ] Página de estatísticas com gráfico de acessos
- [ ] Geração de QR Code da URL encurtada
- [ ] Limite de acessos por URL
- [ ] Expiração automática de links antigos
- [ ] Página 404 personalizada para códigos inválidos

---

## 📄 Licença

Este projeto está sob a licença MIT. Sinta-se livre para usar, modificar e compartilhar. ✌️

---

Feito por [Lucas-Moreschi](https://github.com/Lucas-Moreschi)
