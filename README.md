<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# LARAVEL BLOG CMS

This is the result of my laravel training by following the following Youtube video playlist: 

https://youtube.com/playlist?list=PLhG9IAaB9ArrTsTAOWNTi0D2jkLQ6vA5f


## Features

- Multilingual (English and Indonesian)
- CRUD Posts , Tags , Categories 
- Manage Role
- Manage User

## Live Preview
- [TenkoArena](https://tenkoarena.000webhostapp.com/)

## Installation

Required software
- [XAMPP](https://www.apachefriends.org/)
- [NodeJS](https://nodejs.org)
- [Composer](https://getcomposer.org/download/)


To install, run the following command

```bash
$ git clone https://github.com/AbdillahHamzahAli/Laravel-blogCms.git
$ cd Laravel-blogCms
$ cp env.example .env
$ composer install
$ npm install
```
```bash
$ php artisan key:generate
$ php artisan storage:link
$ npm run build
```
## Important

*RUN PHP AND MYSQL*

Create a database in phpmyadmin with the name `laravel_blogcms` and import the database from `laravel_blogcms.sql` (if you don't know how to import sql here is the tutorial : https://youtu.be/jW5lrS6EUPM )

Now run this : 
```bash
$ php artisan serve
```
Now you can access the application via http://localhost:8000.




## Contributing

Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.


## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
