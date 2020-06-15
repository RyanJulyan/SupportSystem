
<p  align="center">

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://poser.pugx.org/laravel/framework/v/stable.svg"  alt="Latest Stable Version"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://poser.pugx.org/laravel/framework/license.svg"  alt="License"></a>

</p>

  

## # About "Support System"

Support system is a web based system created in the Laravel framework. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

  

- Built in [Laravel](https://laravel.com/docs).
- Basic user authentication
- User roles.
- Log a support ticket by category.
  - Categories: (Sales, Accounts,  IT)
  - Capture Personal details of the person logging
  - Capture the GPS Coordinates
  - 
- Send Emails to person logging  ticket.
- View status by ticket number

## # Server Requirements

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySQL >= 5.7
- Composer

### [Installing Laravel](https://laravel.com/docs/7.x#installing-laravel)

Laravel utilizes  [Composer](https://getcomposer.org/)  to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

#### Installation instructions:

1. Download and install LAMP stack (Linux, Apache, MySQL, PHP):
```
$ sudo apt-get install software-properties-common
$ Y
$ sudo apt update
$ sudo apt install curl
$ sudo apt install apache2
$ Y
$ sudo apt install mysql-server
$ Y
$ sudo mysql_secure_installation
$ assessment
$ sudo mysql
$ sudo apt install php libapache2-mod-php php-mysql
$ sudo apt install php-cli
$ sudo apt install php-bcmath
$ Y
$ sudo apt install php-ctype
$ Y
$ sudo apt install php-fileinfo
$ Y
$ sudo apt install php-json
$ Y
$ sudo apt install php-mbstring
$ Y
$ sudo apt install php-pdo
$ Y
$ sudo apt install php-tokenizer
$ Y
$ sudo apt install php-xml
$ Y
$ sudo curl -s https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ sudo apt install git-all
$ Y
```

2. Check the status of the server:
```
$ composer
$ sudo systemctl status apache2
$ Q
```

3. Download the Laravel installer using Composer:
```
$ composer global require laravel/installer
```

4. Download and clone the Repo and install the correct requirements:
```
$ git clone https://github.com/RyanJulyan/SupportSystem.git
$ cd cd SupportSystem/
$ composer update
$ composer install
$ php artisan key:generate
$ php artisan cache:clear
$ php artisan config:clear
$ composer dump-autoload
$ php artisan view:clear
$ php artisan migrate:refresh
$ yes
$ php artisan db:seed
```

## # License

The Laravel framework and the application “Support System” are both open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).