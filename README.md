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

To display FAQ CRUD just go to URL:  
example.com/faq/qa/index  
example.com/faq/group/index

Once the extension is installed, simply use it in your code or layout by  :

```php
<?= \pistej\faq\widgets\FaqWidget\FaqWidget::widget([]); ?>
```


Translations
------------
To add new language, (clone repository, install composer) add new language code into message/config.php file

```php
'languages' => ['sk', 'pl'],
```

and run command to extract messages

```bash
php vendor/bin/yii message messages/config.php 

```
translate newly created messages and create PR.

