Yii 2 Basic Project Template
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


ТЗ:
1. Создать новый проект на Yii2.

2. Добавить в проект стороннюю библиотеку https://github.com/garakh/kladrapi-php

3. На индексной странице проекта необходимо вывести следующую информацию:

- форму для поиска адреса (содержит: поле ввода для текста и кнопку "Найти");

- список найденных адресов (после сабмита формы);

- список последних 5 поисковых запросов;

4. Пользователь указывает в форме адрес, нажимает кнопку "Найти". Пример ввода может быть следующим:

Москва, Белореченская улица, 12

пермь, ул мира 45

5. Полученный запрос от пользователя необходимо направить к API "КЛАДР в облаке" и в случае ненулевого ответа вывести пользователю наиболее точное совпадение (первый элемент массива, поле fullName);

6. Если не найдено ни одного совпадения, в списке адресов вывести сообщение "Совпадений не найдено";

7. Так же необходимо предусмотреть вывод 5 последних запросов к сервису. Этот список должен содержать:

- точное наименование адреса из запроса (fullName);

- счетчик, отражающий количество поисковых запросов по этому адресу;

- ссылку на детальную страницу, при переходе на которую можно увидеть полный ответ от API "КЛАДР в облаке", включающий и другие совпадения (список fullName для всех вернувшихся элементов массива).

Дополнительно:

1. Предусмотреть защиту от XSS и CSRF;

2. Проект должен быть в репозитории Git и содержать более одного коммита (количество и структура коммитов - на усмотрение соискателя).