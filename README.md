User Demo Sample
==================================================

```
Do not forget to get demo.sql database and add it to your server.
General config is located inside "local.php.dist" that you should copy to a "local.php"
file and apply your settings.
```

This sample is based on *Hello World* sample. It shows how to:

 > Create a new module named Admin
 > Create Admin entity
 > Implement user authentication (with login and password)
 > Implement access filter to restrict access to certain pages to authenticated users only
 > Implement user management UI
 > Init main menu items differently based on whether the current user is logged in or not

## Installation

You need to have Apache 2.4 HTTP server, PHP v.5.6 or later with `gd` and `intl` extensions, and MySQL 5.6 or later.

Download the sample to some directory (it can be your home dir or `/var/www/html`) and run Composer as follows:

```
php composer.phar install
```

The command above will install the dependencies (Zend Framework and Doctrine).

Enable development mode:

```
php composer.phar development-enable
```

Adjust permissions for `data` directory:

```
sudo chown -R www-data:www-data data
sudo chmod -R 775 data
```

Create `public/img/captcha` directory:

```
mkdir public/img/captcha
```

Adjust permissions for `public/img/captcha` directory:

```
sudo chown -R www-data:www-data public/img/captcha
sudo chmod -R 775 public/img/captcha 
```

Create `config/autoload/local.php` config file by copying its distrib version:

```
cp config/autoload/local.php.dist config/autoload/local.php
```

Edit `config/autoload/local.php` and set database password parameter.

Login to MySQL client:

```
mysql -u root -p
```

Create database, where "dummypassword" is the initial password setup inside local.php:

```
CREATE DATABASE demo;
GRANT ALL PRIVILEGES ON admindemodb.* TO admindemo@localhost identified by 'dummypassword';
quit
```

Run database migrations to intialize database schema:

```
./vendor/bin/doctrine-module migrations:migrate
```

Then create an Apache virtual host. It should look like below:

```
<VirtualHost *:80>
    DocumentRoot /path/to/zf3admin/public
    
    <Directory /path/to/zf3admin/public/>
        DirectoryIndex index.php
        AllowOverride All
        Require all granted
    </Directory>

</VirtualHost>
```

Now you should be able to see the Admin Demo website by visiting the link "http://localhost/". 
 
## License

This code is provided under the [BSD-like license](https://en.wikipedia.org/wiki/BSD_licenses). 

## Contributing

If you found a mistake or a bug, please report it using the [Issues](https://github.com/victorchiriac89/zf3admin/issues) page. 
Your feedback is highly appreciated.


This is intended to help other developer that enjoy coding in Zend Framework 3 to have an easy start with a general admin integration. I personally started with zf3 about 2 months ago since I've added this, and I find it one of the best open source frameworks there is.

This module is zf3admin, using a module named admin that I've adapted from https://github.com/olegkrivtsov and tried my best to suite as a general admin that can be further used. So special thanks to him, my purpose of distributing this is to help others, not to gain any fame.

This uses the following modules:

'DoctrineModule','DoctrineORMModule','Zend\Cache','Zend\Paginator','Zend\I18n','Zend\InputFilter','Zend\Filter','Zend\Hydrator','Zend\Session','Zend\Mvc\Plugin\Prg','Zend\Mvc\Plugin\Identity','Zend\Mvc\Plugin\FlashMessenger','Zend\Mvc\Plugin\FilePrg','Zend\Form','Zend\Router','Zend\Validator'

And I intend to add "zend-permissions-rbac" also, any help is quite welcome.