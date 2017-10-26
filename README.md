Тестовое задание по запросу Анатолия
====================================
Тестовое задание по запросу Анатолия для Senior php

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist testcoder/yii2-testcoder "*"
```

or add

```
"testcoder/yii2-testcoder": "*"
```

to the require section of your `composer.json` file.

Добавить в web/main
```
 'modules' => [
        'testcoder' => [
            'class' => 'coder\test\testModule',
        ],
    ],
```

Запустить миграцию

```
yii migrate --migrationPath=@app/vendor/coder.ept/yii2-testcoder/migrations
```


