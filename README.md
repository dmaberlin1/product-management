# Ecommerce API

## Установка

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
## API

### Продукты

| Метод  | URI                | Описание        |
| ------ | ------------------ | --------------- |
| GET    | /api/products      | Список товаров  |
| POST   | /api/products      | Добавить товар  |
| GET    | /api/products/{id} | Просмотр товара |
| PUT    | /api/products/{id} | Обновить товар  |
| DELETE | /api/products/{id} | Удалить товар   |

### Заказы 

| Метод | URI              | Описание        |
| ----- | ---------------- | --------------- |
| POST  | /api/orders      | Создать заказ   |
| GET   | /api/orders/{id} | Просмотр заказа |


#### Пример создания заказа

```
{
  "customer_name": "Dima",
  "customer_email": "dima@example.com",
  "products": [
    { "product_id": 1, "quantity": 2 },
    { "product_id": 5, "quantity": 1 }
  ]
}

```
