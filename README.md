## Последовательность действий, чтобы развернуть приложение при помощи Docker

- Переименовать .env.example в .env
За паролем для MAIL_PASSWORD обратиться ко мне, либо указать свой способ доставки писем

- composer install
- npm install

- cd frontend/laravel-vue-barbershop
- npm install

- cd ../../

- docker-compose build
- docker-compose up -d

- sudo chmod 777 -R storage 

- docker exec -it laravel_vue_barbershop_app bash
- php artisan migrate --seed
- php artisan storage:link
- php artisan schedule:work (Опционально)

В новом терминале 
- npm run dev


[Админка](http://localhost:8080)

[Билд клиентской части](http://localhost:3000)



## Перейдите по роуту /register в админке и зарегистрируйтесь (Зарегистрироваться можно только один раз!)
