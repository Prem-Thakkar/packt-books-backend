
## Description ✍️

Backend Apis for books 📚


## Artisan GitHub Profile 👨‍💻

https://github.com/prem-thakkar/

## Artisan Linkedin Profile 👨‍💻
https://www.linkedin.com/in/prem-thakkar/

## Language 🔨

Language: PHP with version 8.1.10
## Framework 🔨

Framework: Laravel with version 10.7.1
## Database 💾
 
Mysql with version 8.0.30
## Important Concepts Used 🚀

* Solid Principles
* Laravel Service Container for manual dependancy injection
* Service architecture (Achieved thin controller and fast service files with this)
* Indexing for Improving Database Perfomance 
## Other Concepts Used

* PHP Interfaces  
* Laravel Migrations 
* Laravel Seeders 
* Laravel Middlewares 
* Laravel Eloquent 
## Installation ⚙️

* Clone the Repository
* Install Dependancy
```bash
  composer install
```
* Setup .env
```bash
  Copy .env.example to .env and set the database credentials accordingly
```
* Add the database records and run seeders for getting data to test the project 
```bash
  php artisan migrate --seed
```

* Generate the application key

```bash
  php artisan key:generate
```

## User API Reference 👨

#### Books Listing

```http
  GET /api/books
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `page`      | `integer` | **Required**. Which page to return |
| `rowsPerPage`      | `integer` | **Required**. Records per page |
| `sortBy`      | `string` | **Required**. Order the records with selected column |
| `sortType`      | `string` | **Required**. Direction of the order |
| `search[title]`      | `string` | **Optional**. Filter records matching specified Title |
| `search[author]`      | `string` | **Optional**. Filter records matching specified Author |
| `search[published_on]`      | `date` | **Optional**. Filter records matching specified Published On Date|
| `search[isbn]`      | `integer` | **Optional**. Filter records matching specified ISBN |
| `search[genre]`      | `string` | **Optional**. Filter records matching specified Genre |

#### Get a book details

```http
  GET /api/books/{bookById}
```
```{bookById}``` - Book Id 
## Admin Api Refrence 👨‍✈️

#### Login

```http
  GET /api/admin/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. |
| `password` | `string` | **Required**. |



#### Add a new book

```http
  POST api/admin/books
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `title`      | `string` | **Required**. Title of the book |
| `author`      | `string` | **Required**. Author of the book |
| `published_on`      | `date` | **Required**.  Published On Date of the book|
| `publisher`      | `string` | **Required**.  Publisher of the book|
| `isbn`      | `integer` | **Required**. ISBN of the book |
| `genre`      | `string` | **Required**. Genre of the book |
| `description`      | `string` | **Required**. Description of the book |
| `image`      | `string` | **Required**. Image URL of the book |

#### Update a book

```http
  PUT api/admin/books/{bookById}
```
```{bookById}``` - Book Id

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `title`      | `string` | **Required**. Title of the book |
| `author`      | `string` | **Required**. Author of the book |
| `published_on`      | `date` | **Required**.  Published On Date of the book|
| `publisher`      | `string` | **Required**.  Publisher of the book|
| `isbn`      | `integer` | **Required**. ISBN of the book |
| `genre`      | `string` | **Required**. Genre of the book |
| `description`      | `string` | **Required**. Description of the book |
| `image`      | `string` | **Required**. Image URL of the book |

#### Delete a book

```http
  DELETE /api/admin/books/{bookById}
```
```{bookById}``` - Book Id
