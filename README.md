
## TEST
- infraestructura tradicional de laravel (MVM)
- Eloquement como ORM
- Factories and unit test
- migrations contruct DB 
- dompdf para exportar las listas de precios
- Validator para los forms
- bootstrap para el panel admin

## INSTRUCTIONS
- create database restaurant
- modify .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurant
DB_USERNAME=MI_USUARIO
DB_PASSWORD=MI_CONTRASEÑA

- composer install
- php artisan test
- php artisan migrate
- php artisan optimize


## OBSERVACIONES
Se han realizado algunas modificaciones para mejorar el comportamiento de la aplicación:

Se plantearon las entidades para que sirva para cualquier comida y no solo pizzas
Ahora tanto los ingredientes como las comidas tienen precios de costo.
El precio de costo de la comida es la suma de los precios de costo de los ingredientes agregados.
Para calcular el precio de venta de las comidas, se ha creado una nueva entidad llamada "lista de precios".
A las listas de precios se les puede agregar un porcentaje, que se utilizará para marcar el precio de costo de las comidas.
Las listas se exportan con los productos dados de alta.