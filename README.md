# PSR-3 logger
[![Latest Stable Version](http://poser.pugx.org/vpa/psr-logger/v)](https://packagist.org/packages/vpa/psr-logger) 
[![Latest Unstable Version](http://poser.pugx.org/vpa/psr-logger/v/unstable)](https://packagist.org/packages/vpa/psr-logger) 
[![License](http://poser.pugx.org/vpa/psr-logger/license)](https://packagist.org/packages/vpa/psr-logger) 
[![PHP Version Require](http://poser.pugx.org/vpa/psr-logger/require/php)](https://packagist.org/packages/vpa/psr-logger)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zolll23/psr-logger/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/zolll23/psr-logger/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/zolll23/psr-logger/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/zolll23/psr-logger/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/zolll23/psr-logger/badges/build.png?b=main)](https://scrutinizer-ci.com/g/zolll23/psr-logger/build-status/main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/zolll23/psr-logger/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

**Installation**

```
composer require vpa/psr-logger
```

**Example**

This logger can be used with Container (PSR-11). Example:

```
use VPA\DI\Container;

require_once(__DIR__ . '/../vendor/autoload.php');

// We want use for logs JS Developer Console if we run the script in browser and CLI Console - if run in CLI mode
$classLogger = php_sapi_name()=='cli' ? 'VPA\Logger\ConsoleLogger' : 'VPA\Logger\JSConsoleLogger';

$di = new Container();
$di->registerContainers([
    'VPA\Logger'=>$classLogger,
]);

$logger = $di->get('VPA\Logger');
$logger->emergency("emergency message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->alert("alert message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->critical("critical message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->error("error message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->warning("warning message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->notice("notice message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->info("info message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->debug("debug message {date}",['date'=>date('d.m.Y H:i:s')]);

```
or if don`t use DI:
```
require_once(__DIR__ . '/../vendor/autoload.php');

$logger = new \VPA\Logger\ConsoleLogger(); // For ConsoleLogger
$logger->emergency("emergency message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->alert("alert message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->critical("critical message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->error("error message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->warning("warning message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->notice("notice message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->info("info message {date}",['date'=>date('d.m.Y H:i:s')]);
$logger->debug("debug message {date}",['date'=>date('d.m.Y H:i:s')]);

```

**Result for ConsoleLogger**


![Screenshot](CLI_console.png)
