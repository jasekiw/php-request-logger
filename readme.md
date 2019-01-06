# Minimal PHP Request Logger

[![Build Status](https://www.travis-ci.org/jasekiw/php-request-logger.svg?branch=master)](https://www.travis-ci.org/jasekiw/php-request-logger)

## Quick Temporary Usage

Copy [RequestLogger.php](https://raw.githubusercontent.com/jasekiw/php-request-logger/master/src/RequestLogger.php) to the entry directory of your web server.
Log the request with these two lines.
```php
<?php
require_once(__DIR__ . "/RequestLogger.php");
RequestLogger\logRequest();
```

## Installing as a composer package

```bash
composer require jasekiw/php-request-logger
```


## Usage

Write the current request to `request_log.log` where 
the RequestLogger.php file is located.

```php
<?php
RequestLogger\logRequest();
```

If you want to write it elsewhere just pass the file path to the function.
```php
<?php
RequestLogger\logRequest(__DIR__ . "/request_log.php");
```