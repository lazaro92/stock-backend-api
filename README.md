# Stock Backend API

This project is an exercise to show my development skills. It consist on building an API REST micro service that manages a stock of a shop.

The basic operations it must have are:

- [x] Regist stock.
- [x] Check stock (all or find by product code).
- [x] Update stock (product detail).
- [x] Operations: buy stock.
- [x] Operations: sell stock.
- [ ] Operations: cancel sell stock.
- [x] Save buy stock movement.
- [x] Save sell stock movement.
- [ ] Save cancel sell stock movement.
- [x] Check the movements.

Additional:

- [ ] Testing.

## Requirements

In order to serve the application in your computer you need:

- PHP 8.
- Composer (PHP package manager).
- MySQL / MariaDB.

## Execution

To execute the project you should follow next steps:

1. Clone the project.
2. Inside the root project folder install dependencies with `composer install`.
3. Set your database variables in the `.env` file (previously copy the `.env.example` as `env`).
4. Create the database (empty).
5. Create the tables and fill with mock data with `php artisan migrate --seed`.
6. Launch the API with `php artisan serve`, it should work.

## API EndPoints

Method  | Route | Description
------------- | ------------- | -------------
GET | api/product | Returns a limited page with the products data.
GET | api/product/{code}  | Search by product code and return it if exist, either return 404.
GET | api/movement | Returns a limited page with the movements data.
GET | api/movement/{id}  | Search by movement id and return it if exist, either return 404.
POST | api/product | Insert a product in the dabase. Needs **code**, **name**, **price** in the body as JSON. **quantity** is optional.
PUT | api/product | Update a product (found by code) in the dabase.
POST | api/operation/buy/{code} | if a product is found, add the demanded stock quantity to it and register the move in the **movements** table.
POST | api/operation/sell/{code} | if a product is found, and the demanded quantity is less than the stock, and the money is more than the price, remove the demanded stock quantity to it and register the move in the **movements** table.

A POSTMAN collection is available in the repo -> [API-Stock.postman_collection.json](API-Stock.postman_collection.json).

## Wiki

A wiki has been added to this project. See it in the **Wiki tab**.
