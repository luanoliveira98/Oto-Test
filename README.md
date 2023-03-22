<h1 align="center"> Oto CRM Teste </h1>
<p align="center"> Teste de seleção para back-end developer </p>

<p align="center">
  <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">
  <img src="https://img.shields.io/static/v1?label=Made%20with&message=PHP&color=8993be"/>
</p>

<h4 align="center">
  🚧 Em desenvolvimento... 🚧
</h4>

<p align="center">
 <a href="#pré-requisitos">Pré Requisitos</a> •
 <a href="#executando-o-código">Executando o código</a> •
 <a href="#tarefas">Tarefas</a> •
 <a href="#autor">Autor</a> •
 <a href="#licença">Licença</a>
</p>

## Pré Requisitos

Antes de comelar, você precisará ter as seguintes ferramentas instaladas na sua máquina:
[PHP] (https://www.php.net/), [Composer] (https://getcomposer.org/).
Em adicional, você precisa de um banco de dados,preferencialmente [MySQL] (https://dev.mysql.com/) para rodar o projeto.

## Executando o código

````bash

# Clone este repositório
$ git clone git@github.com:luanoliveira98/Oto-Test.git

# Acesse a pasta do projeto no cmd/terminal
$ cd Oto-Test

# Instale as dependências
$ composer install

# Duplique o .env.example com o nome de .env e preencha as variáveis necessárias

# Crie um banco de dados e execute os scripts, nessa sequência, de create-table-pedido.sql e db_oto_order_items.sql disponívels em App/Database

# Execute a aplicação
$ php -S localhost:3333

# O servidor irá começar na porta 3333 - vá para http://localhost:3333

````

## Tarefas

- [x] Tarefa 1 --> Em: App/Database/create-table-pedido.sql
- [x] Tarefa 2 --> Em: App/Services/PmwebOrdersStats.php
- [ ] Tarefa 3 --> Em: App/Controllers/OrdersController.php
- [x] Tarefa 4 --> Em: App/Services/PmwebOrdersStats.php

## Autor
---

<a href="https://github.com/luanoliveira">
 <img style="border-radius: 50%;" src="https://github.com/luanoliveira98.png" width="100px;" alt=""/>
 <br />
 <sub><b>Luan Oliveira</b></sub>
</a>

[![Linkedin Badge](https://img.shields.io/badge/-LinkedIn-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/luan-oliveira-saldanha/)](https://www.linkedin.com/in/luan-oliveira-saldanha/) 
[![Gmail Badge](https://img.shields.io/badge/-Gmail-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:luanoliveiraltda@gmail.com)](mailto:luanoliveiraltda@gmail.com)

---

## Licença

Este projeto está sob licença [MIT](./LICENSE).

