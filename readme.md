# Minimal PHP Request Logger

[![Build Status](https://www.travis-ci.org/jasekiw/php-request-logger.svg?branch=master)](https://www.travis-ci.org/jasekiw/php-request-logger)


## Install
##### Quick install for temporary usage

```php
require_once(__DIR__ . "/RequestLogger.php");
```

##### Installing as a composer package

```php
composer require jasekiw/php-request-logger
```


## Usage

Write the current request to `request_log.log` where 
the RequestLogger.php file is located.

```php
RequestLogger\logRequest();
```

If you want to write it elsewhere just pass the file path to the function.
```php
RequestLogger\logRequest(__DIR__ "/request_log.php");
```

Logs write to `request_log.log` in the directory of 