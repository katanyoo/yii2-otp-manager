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


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \katanyoo\otpmanager\OTPManager::widget(); ?>```