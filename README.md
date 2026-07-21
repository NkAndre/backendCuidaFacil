## Backend Cuida Facil

API REST desenvolvida em **Laravel** para o aplicativo **Cuida Fácil**, responsável pelo gerenciamento dos dados de saúde dos usuários, autenticação e comunicação com o banco de dados.

## 📖 Sobre o Projeto

O Backend Cuida Fácil fornece todos os serviços necessários para o funcionamento do aplicativo mobile, permitindo o armazenamento e gerenciamento seguro das informações dos usuários.

A API foi desenvolvida seguindo a arquitetura MVC do Laravel e utiliza banco de dados relacional para persistência das informações.


## 🛠️ Tecnologias

- Laravel
- PHP
- MySQL
- Composer


## 🚀 Como executar

### Clone o repositório

```bash
git clone https://github.com/NkAndre/backendCuidaFacil.git
cd backendCuidaFacil
```

### Instale as dependências

```bash
composer install
```

### Configure o ambiente

Windows:

```bash
copy .env.example .env
```

Linux/macOS:

```bash
cp .env.example .env
```

Configure o arquivo `.env`:

```env
DB_DATABASE=db_cuidafacil
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### Gere a chave da aplicação

```bash
php artisan key:generate
```

### Execute as migrations

```bash
php artisan migrate
```

### Inicie o servidor

```bash
php artisan serve
```

A API ficará disponível em:

```
http://127.0.0.1:8000
```

## 📱 Frontend

O aplicativo mobile está disponível em:

**Frontend:** https://github.com/NkAndre/CuidaFacil

## 👨‍💻 Autor

**André Silva**

- GitHub: https://github.com/NkAndre
