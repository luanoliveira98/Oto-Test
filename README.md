<h1 align="center"> Oto CRM Teste </h1>
<p align="center"> Teste de seleção para back-end developer </p>

<p align="center">
  <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">
  <img src="https://img.shields.io/static/v1?label=Made%20with&message=PHP&color=8993be"/>
</p>

<h4 align="center">
  Finalizado
</h4>

<p align="center">
 <a href="#pré-requisitos">Pré Requisitos</a> •
 <a href="#executando-o-código">Executando o código</a> •
 <a href="#tarefas">Tarefas</a> •
 <a href="#rotas">Rotas</a> •
 <a href="#autor">Autor</a> •
 <a href="#licença">Licença</a>
</p>

## Pré Requisitos

Antes de comelar, você precisará ter as seguintes ferramentas instaladas na sua máquina:
[PHP] (https://www.php.net/), [Composer] (https://getcomposer.org/).
Em adicional, você precisa de um banco de dados, preferencialmente [MySQL] (https://dev.mysql.com/) e um servidor, como o [XAMPP] (https://www.apachefriends.org/pt_br/index.html), para rodar o projeto.

## Executando o código

````bash

# Clone este repositório dentro do seu servidor (XAMPP)
$ git clone git@github.com:luanoliveira98/Oto-Test.git

# Acesse a pasta do projeto no cmd/terminal
$ cd Oto-Test

# Instale as dependências
$ composer install

# Duplique o .env.example com o nome de .env e preencha as variáveis necessárias

# Crie um banco de dados e execute os scripts, nessa sequência, de create-table-pedido.sql e db_oto_order_items.sql disponívels em App/Database

````

## Tarefas

- [x] Tarefa 1 --> Em: App/Database/create-table-pedido.sql
- [x] Tarefa 2 --> Em: App/Services/PmwebOrdersStats.php
- [x] Tarefa 3 --> Em: App/Controllers/OrdersController.php
- [x] Tarefa 4 --> Em: App/Services/PmwebOrdersStats.php

## Rotas

### [GET] - /orders/stats

Lista as estatiscas dos pedidos, é possivel enviar um intervalo de dados como filtro para as datas.

**Query Params**

- **startDate**: No formato de Y-m-d
- **endDate**: No formato de Y-m-d

**Response**

```json
{
	"orders": {
		"count": 7210,
		"revenue": 672112.81,
		"quantity": 22601,
		"averageRetailPrice": 29.74,
		"AverageOrderValue": 93.22
	}
}
```

### [GET] - /orders/by-date

Lista a quantidade de pedidos por dia.

**Response**

```json
{
	"data": {
		"2019-01-01": 5,
		"2019-01-02": 8,
		"2019-01-03": 3,
		"2019-01-04": 10,
		"2019-01-05": 13,
		"2019-01-06": 17,
		"2019-01-07": 10,
		"2019-01-08": 21,
		"2019-01-09": 19,
		"2019-01-10": 8,
		"2019-01-11": 14
  }
}
```

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

