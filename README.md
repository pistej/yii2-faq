Yii2 FAQ extension
==================
Simple Yii2 FAQ extension - show help text based on visited application URL and application language.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist pistej/yii2-faq "~0.1"
```

or add

```
"pistej/yii2-faq": "~0.1"
```

to the require section of your `composer.json` file.

To run database migrations, simply call:
```bash
php yii migrate/up --migrationPath=vendor/pistej/yii2-faq/migrations/
```

Usage
-----

You should add module to your config:
```php
'modules' => [
    ...
    'faq' => [
        'class' => 'pistej\faq\Faq',
    ],
],
```

To display FAQ CRUD (administration pages) just go to URL:  
example.com/faq/qa/index  
example.com/faq/group/index
Actions are allowed for authenticated users only.

Once the extension is installed, simply use it in your code or layout by:

```php
<?= \pistej\faq\widgets\FaqWidget\FaqWidget::widget(); ?>
```


Translations
------------
To add new language, (clone repository, install composer) add new language code into message/config.php file

```php
'languages' => ['sk', 'pl'],
```

and run yii command to extract messages from root folder

```bash
php vendor/bin/yii message messages/config.php 

```
translate newly created messages and create PR.

