# 77Sol Project

## Índice
1. [Visão Geral](#visão-geral)
2. [Tecnologias Utilizadas](#tecnologias-utilizadas)
3. [Arquitetura do Sistema](#arquitetura-do-sistema)
4. [Instalação](#instalação)
6. [Testes](#testes)
7. [Estrutura de Pastas](#estrutura-de-pastas)
8. [Extensibilidade](#extensibilidade)
9. [Boas Práticas e Segurança](#boas-práticas-e-segurança)

---

## Visão Geral
Este projeto é um sistema desenvolvido para o case da 77Sol, no qual simula um sistema para integradores solares. Permitindo que estes façam manutenções em cadastro de clientes, de projetos e na manutenção dos equipamentos deste projeto.

## Tecnologias Utilizadas
- **PHP 8.2**
- **Laravel 11**
- **MySQL 8.0**
- **Composer**
- **PHPUnit**

## Arquitetura do Sistema
O projeto foi desenvolvido com DDD (Domain-Driven Design) e uma Arquitetura em Camadas (Layered Architecture). Mais detalhes na [documentação completa](https://docs.google.com/document/d/1lP-lE4VY5a-b7YlIb3ZI4Oaa1JxkLrdUUYzCqefGLJA/edit?usp=sharing)

## Instalação

### Requisitos
- **PHP >= ^8.2**
- **MySQL >= 8.0**
- **Composer**
- **Docker**
- **docker-compose**

### Passo a Passo

1. **Clone o repositório**:
   ```bash
   git clone git@github.com:RicardooVidal/77sol-project.git
   cd 77sol-project

2. **Buildar as imagens e subir os containers com docker compose**:  
   ```bash
   docker compose build
   docker compose up -d

3. **Executar migrations**:  
   ```bash
    docker compose exec app php artisan migrate

4. **Executar seeders**:  
   ```bash
    docker compose exec app php artisan db:seed

5. **Autenticação**:  
   Este projeto utiliza Laravel Sanctum para autenticação. Após o [login](http://localhost:8085/api-doc#/Login/post_api_login), copiar o token gerado e utilizar no header **Authorization** antecipado por "Bearer". Exemplo: **"Bearer 2|tEIYo01732uizYM50..."**.

   No Swagger utilize o botão **"Authorize"** para usar o token gerado e para ter acesso as rotas protegidas.

   Usuário para teste (somente após rodar o comando db:seed):
   ```bash
    E-mail: test@test.com
    Senha: 1234556

### Testes

1. **Para executar os testes:**:  
   ```bash
    php artisan test

2. **Para executar um teste em específico:**  
   ```bash
    php artisan test --filter=test_update_project_successful

### Endpoints
Todos os endpoints estão documentados no [Swagger](http://localhost:8085/api-doc)

### Documentação completa
[Link](https://docs.google.com/document/d/1lP-lE4VY5a-b7YlIb3ZI4Oaa1JxkLrdUUYzCqefGLJA/edit?usp=sharing)