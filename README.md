# BackendTest

Delocal Zrt. - PHP developer test task


## Contacts API

- **Get all contacts**: `GET /contacts`
- **Get contact by id**: `GET /contacts/{id}`
- **Create a contact**: `PUT /contacts`
- **Update contact**: `PUT /contacts/{id}`

>The API accepts JSON, and sends responses in JSON.


**Fields:** `name, email, tel, address`

## Installation
`composer install`


## Configuration

Database configuration settings are in `config/app.php` file.