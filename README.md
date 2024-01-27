
# Accounting management system

The project involves a backend software for managing the accounting in a company. Usefull to keep track of incomes and costs.

## Tech Stack and Pattern

- REST API
- PHP 8 (Vanilla)
- JWT (for auth)
- MySQL
- CRUD Operations 

## Implementations and usage

- To take the jwt token you need to send a POST request to the /auth API, and do the login.
- You can Add, Remove or Update some entities of the system.
- You can use some APIs to get specific metrics of the system.

## API Reference

#### Login

```http
  POST /api/auth.php
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `username` | `string` | **Required**. Your username, just a not null string to simulate a login |

#### Get item

```http
  GET /api/getSedi.php
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

