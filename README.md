# 🌤️ Previsão do Tempo com Laravel e Docker

Este projeto é uma aplicação web simples desenvolvida com **Laravel** e containerizada usando **Docker**, que permite cadastrar e exibir previsões do tempo. É ideal para fins de aprendizado com foco em Laravel moderno e uso de containers.

---

## 🚀 Tecnologias Utilizadas

- PHP 8.x
- Laravel 12.x
- Docker
- Docker Compose
- MySQL
- Composer

---

## 📂 Estrutura do Projeto

- `app/` – Código-fonte principal do Laravel (controllers, models, etc.)
- `routes/web.php` – Rotas da aplicação
- `resources/views/` – Telas Blade
- `docker-compose.yml` – Configuração dos containers
- `Dockerfile` – Ambiente PHP personalizado

---

## ⚙️ Como Executar Localmente com Docker

### 1. Clone o repositório

```bash
git clone https://github.com/Inaciogabriel0/laravel-docker.git
cd laravel-docker/laravel

copie o arquivo env
cp .env.example .env


suba os containers
docker-compose up -d

Acesse o container da aplicação
docker exec -it app bash

Instale as dependências e rode as migrations
composer install
php artisan key:generate
php artisan migrate
exit

