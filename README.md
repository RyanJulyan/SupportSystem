
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
    - This Has a fallback for if a user does not allow broweser to know location
  - Ability to update the status of the ticket
- Send Email to person logging ticket with ticket details and link to view ticket.
- View status by ticket number anonymously
- View status by ticket number and update status
  - Only update status if
    - Admin
    - Created the ticket
- View personally logged tickets
  - Order tickets by:
    - First Name
    - Last Name
    - Date logged
    - Status of Ticket

### Future Inhancesments:

- View for managing categories
- View for managing statuses
- View for managing users
- View for managing user roles
- Abstract Addresses that are logged

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

5. Run the server:
```
$ php artisan serve
```

## # URL Details:

## # Login Details:
```
http://localhost:8000/

http://localhost:8000/file-manipulation

http://localhost:8000/complex-query
http://localhost:8000/animal-lovers
http://localhost:8000/children-sport-lovers
http://localhost:8000/unique-interests
http://localhost:8000/more-interests

http://localhost:8000/register
http://localhost:8000/login
http://localhost:8000/home
http://localhost:8000/new-ticket
http://localhost:8000/tickets
http://localhost:8000/ticket/{guid}
http://localhost:8000/all-tickets
http://localhost:8000/all-tickets
```

### Staff
```
  email: "mwalstra@cgn.co.za"
  password: "Matthew Walstra"

  email: "Generic@Support.biz"
  password: "Generic Support"

  email: "Generic2@Support.biz"
  password: "Generic 2 Support 2"
```

### User
```
  email: "ryan@julyan.biz"
  password: "Ryan Julyan"
```

### Example File for File Upload
```
  support_system/example_file/Book1.xlsx
```

## # License

The Laravel framework and the application “Support System” are both open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).