## Reqruitment 
1. php 7.3+
2. mysql database
3. composer

## How to run the application
1. git clone https://github.com/ahonaicode/post-api-with-laravel-and-passport.git
2. cd post-api-with-laravel-and-passport
3. composer install
4. cp .env.example .env and adjust database configuration
5. php artisan migrate --seed
6. php artisan passport:install
7. php artisan serve


## Postman Collection/ API Documentation
You can find api documentation in public folder, the file name is REST API POST.postman_collection.json. just import it and test.

<img width="1344" alt="Screen Shot 2022-03-15 at 00 52 41" src="https://user-images.githubusercontent.com/91023690/158231875-0d981d6c-892a-4d5e-af4a-f288ada0c148.png">


## Entity Relationship Diagram Document
![post_api](https://user-images.githubusercontent.com/91023690/158230989-6060dc13-04b9-43a9-9e4c-a0e4e85976d3.png)

## Pass Test
<img width="631" alt="Screen Shot 2022-03-15 at 00 50 31" src="https://user-images.githubusercontent.com/91023690/158231525-7eea000f-d881-4b72-9aac-f6562479fc4c.png">

