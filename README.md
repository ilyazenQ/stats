<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Набор API-методов для сохранения событий и получения статистики.

## Разворот

1. `git clone https://github.com/ilyazenQ/stats.git`<br>
2. `cd stats`<br>
3. `composer require laravel/sail --dev`<br>
4. `./vendor/bin/sail up`<br>
5. `cp .env.example .env` В .env.example указаны верные данные для cтандартного sail контейнера<br>
6. `./vendor/bin/sail shell`<br>
7. `php artisan key:generate`<br>
8. `php artisan storage:link`<br>
9. `php artisan jwt:secret`<br>
10. `php artisan l5-swagger:generate`<br>

## Документация и методы
Документация: http://localhost/api/documentation#/ <br>
Создание события:
<img src="post.png" alt="Build Status"> <br>
Получение агрегированных событий:<br>
<img src="get.png" alt="Build Status"> <br>

