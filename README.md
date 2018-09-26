# RecoilPHP callable wrapper

Wrap any coroutine callable and run it through RecoilPHP on invocation

[![Build Status](https://travis-ci.com/WyriHaximus/recoilphp-callable.svg?branch=master)](https://travis-ci.com/WyriHaximus/recoilphp-callable)
[![Latest Stable Version](https://poser.pugx.org/WyriHaximus/recoil-callable/v/stable.png)](https://packagist.org/packages/WyriHaximus/recoil-callable)
[![Total Downloads](https://poser.pugx.org/WyriHaximus/recoil-callable/downloads.png)](https://packagist.org/packages/WyriHaximus/recoil-callable)
[![Code Coverage](https://scrutinizer-ci.com/g/WyriHaximus/recoilphp-callable/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/WyriHaximus/recoilphp-callable/?branch=master)
[![License](https://poser.pugx.org/WyriHaximus/recoil-callable/license.png)](https://packagist.org/packages/WyriHaximus/recoil-callable)
[![PHP 7 ready](http://php7ready.timesplinter.ch/WyriHaximus/reactphp-http-middleware-clear-body/badge.svg)](https://travis-ci.org/WyriHaximus/reactphp-http-middleware-clear-body)

# Install

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require wyrihaximus/recoil-callable
```

# Use

Best used for event handlers or promise handlers to turn any callable event/promise handler into a coroutine easily:

```php
$caller = new QueuedCalled(); // Any implementor of QueueCallerInterface
$callableWrapper = new CallableWrapper($caller);
$eventEmitter = new EventEmitter();
$eventEmitter->on('event', $callableWrapper->callable(function ($input) {
    $result = yield asyncFunction($input);
    $finalResult = yield anotherAsyncFunction($result);
    
    return $finalResult;
});
```

# License

The MIT License (MIT)

Copyright (c) 2018 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
