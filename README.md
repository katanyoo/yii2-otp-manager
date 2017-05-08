OTP Manager
===========
This extension for send OTP via SMS to all number in Thailand

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist katanyoo/yii2-otp-manager "*"
```

or add

```
"katanyoo/yii2-otp-manager": "*"
```

to the require section of your `composer.json` file.

You need to run

```php
php yii migrate/up --migrationPath=@vendor/katanyoo/yii2-otp-manager/migrations
```

Usage
-----

To use this extension, simply add the following code in your application configuration:

```php
return [
    //....
    'components' => [
        'otpManager' => [
            'class' => 'katanyoo\otpmanager\OTPManager',
            'provider_endpoint' => '<ENDPOINT>',
            'username' => '<USERNAME>',
            'password'=> '<PASSWORD>',
        ]
    ],
];
```

You can then send an sms as follows:

```php
$result = Yii::$app->otpManager
     ->setMobileNo('08xxxxxxxx')
     ->send();
```