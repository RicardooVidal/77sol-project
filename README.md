# 77Sol Project

## Índice
1. [Visão Geral](#visão-geral)
2. [Tecnologias Utilizadas](#tecnologias-utilizadas)
3. [Arquitetura do Sistema](#arquitetura-do-sistema)
4. [Instalação](#instalação)
5. [Uso do Sistema](#uso-do-sistema)
6. [Endpoints da API](#endpoints-da-api)
7. [Testes](#testes)
8. [Estrutura de Pastas](#estrutura-de-pastas)
9. [Extensibilidade](#extensibilidade)
10. [Boas Práticas e Segurança](#boas-práticas-e-segurança)

---

## Visão Geral
Este projeto é um sistema desenvolvido para o case da 77Sol, no qual simula um sistema para integradores solares. Permitindo que estes façam manutenções em cadastro de clientes, de projetos e na manutenção dos equipamentos deste projeto.

## Tecnologias Utilizadas
- **PHP 8.2**
- **Laravel 11**
- **Nginx**
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

2. **Criar o arquivo .env**:
   ```bash
   cp .env.dev .env (Unix)
   copy .env.dev .env (Windows)

3. **Instalar as dependências**:  
   ```bash
   composer install

3. **Buildar as imagens e subir os containers com docker compose**:  
   ```bash
   docker compose build
   docker compose up

4. **Gerar a chave da aplicação**:  
   ```bash
    php artisan key:generate

6. **Executar migrations**:  
   ```bash
    php artisan migrate

5. **Executar seeders**:  
   ```bash
    php artisan db:seed

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