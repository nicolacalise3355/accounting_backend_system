
# Fault management system

The project involves a backend software for managing faults in the company's locations. Each room contains machinery that may malfunction; it is important to keep track of these faults and the operators performing maintenance work.


## Tech Stack and Pattern

- REST API
- PHP 8 (Vanilla)
- JWT (for auth)
- MySQL
- CRUD Operations 

## Implementations and usage

- To take the jwt token you need to send a POST request to the /auth API, it simulates a login, but you don't really need credentials.
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

