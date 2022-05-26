Даны два списка. Список автомобилей и список пользователей.  
C помощью laravel сделать api для управления списком использования автомобилей пользователями.  
В один момент времени 1 пользователь может управлять только одним автомобилем. В один момент времени 1 автомобилем может управлять только 1 пользователь.  

php artisan migrate  
php artisan migrate:refres  

php artisan db:seed  

Swagger: https://github.com/thgodamn/laravel_karsh_api/blob/master/swagger.json  

.env:  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=laravel_api_karshering  
DB_USERNAME=root  
DB_PASSWORD=  
