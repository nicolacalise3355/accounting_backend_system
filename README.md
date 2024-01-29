
# Accounting management system

The project involves a backend software for managing the accounting in a company. Usefull to keep track of incomes and costs.

### Steps of development

- Workdays implementation (v.1.0): to keep track of the cash flow.
- Members implementation (v. 1.1): to keep track of the clients 

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
| `username` | `string` | **Required**. Your username |
| `password` | `string` | **Required**. Your password. |

#### Workdays

```http
  GET /api/workdays.php
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key, should setted in the Authorization as bearer token |

```http
  PUT, POST /api/workday.php
```

Add or modify a workday

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key, should setted in the Authorization as bearer token |
| `date` | `string / date` | **Required**. Format: "YYYY-DD-MM" Date.|
| `revenue` | `float` | **Required**.  Revenue of the day|
| `costs` | `float` | **Required**.  Costs of the day|
