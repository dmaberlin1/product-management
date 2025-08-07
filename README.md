# product-management API

## Установка

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
## Запустите контейнеры:
```
docker-compose up -d
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

| Метод  | URI                | Описание        |
| ------ | ------------------ | --------------- |
| GET    | `/api/orders`      | Список заказов  |
| POST   | `/api/orders`      | Создать заказ   |
| GET    | `/api/orders/{id}` | Просмотр заказа |
| PUT    | `/api/orders/{id}` | Обновить заказ  |
| DELETE | `/api/orders/{id}` | Удалить заказ   |


#### Добавить новый товар
```
{
"name": "MacBook Pro",
"description": "Laptop from Apple",
"price": 2500.00,
"stock_quantity": 10
}
```

#### Обновить товар
```
{
  "name": "MacBook Pro M3",
  "description": "Updated model",
  "price": 2700.00,
  "stock_quantity": 8
}

```

#### Создать заказ
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

#### Обновить заказ
```
{
  "customer_name": "Dmytro",
  "customer_email": "dmytro@example.com",
  "products": [
    { "product_id": 4, "quantity": 3 }
  ]
}
```

#### Пример ошибки валидации
```
{
  "message": "Validation failed",
  "errors": {
    "customer_name": ["The customer_name field is required."],
    "products": ["The products field is required."]
  }
}
```
