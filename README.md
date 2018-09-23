Yii2 FAQ extension
==================
Simple Yii2 FAQ extension

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist pistej/yii2-faq "*"
```

or add

```
"pistej/yii2-faq": "*"
```

to the require section of your `composer.json` file.


Usage
-----

You should add module to your config:
```php
'modules' => [
    ...
    'faq' => [
        'class' => \pistej\faq\Faq::className(),
    ],
],
```

To display FAQ just add:
```php
echo "todo"
```

Once the extension is installed, simply use it in your code by  :

```php
<?= \pistej\faq\AutoloadExample::widget(); ?>```