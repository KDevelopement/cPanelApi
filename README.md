## cPanel API PHP (Simples)
Manage your cPanel server with this PHP library. Simple to use. With this PHP library, you can manage your cPanel.

[![License](https://img.shields.io/packagist/l/previewtechs/cpanel-whm-api.svg)](https://github.com/k7brasil/cPanelApi/blob/master/LICENSE)
[![Build Status](https://api.travis-ci.org/k7brasil/cPanelApi.svg?branch=master)](https://travis-ci.org/k7brasil/cPanelApi)
[![Code Coverage](https://scrutinizer-ci.com/g/k7brasil/cPanelApi/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/k7brasil/cPanelApi/?branch=master)
[![Code Quality](https://scrutinizer-ci.com/g/k7brasil/cPanelApi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/k7brasil/cPanelApi/?branch=master)
[![Code Quality](https://scrutinizer-ci.com/g/k7brasil/cPanelApi/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/g/k7brasil/cPanelApi/?branch=master)

### Installation

You can install this library with composer.

```bash
composer require kseven/cpanelapi
```

### Usage example
```php
<?php
require "vendor/autoload.php";

//Build CPanel Client
use KSeven\CPanel;
use KSeven\CPanel\Functions\Databases;

require "vendor/autoload.php";
$Auth = [
  "HOST" => "seuhost",
  "PORT" => "2083",
  "USER" => "user",
  "PASSWORD" => "pass"
];

$cPanel = new CPanel($Auth);
$DBS = new Databases($cPanel);

var_dump($accounts->searchAccounts());
```

### Available Functionality
- CPanel
  - Databases
    - getDatabases (List of all databases)  

### Contibutions
You are always welcome to contribute in this library.

See our [list of contributors](https://github.com/k7brasil/cPanelApi/graphs/contributors)

### Issues/Bug Reports
Please [create an issue or report a bug](https://github.com/k7brasil/cPanelApi/issues/new) in this GitHub repository and we will be
happy to look into that.

### License

The MIT License (MIT)

Copyright (c) 2014 Domain Reseller API

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
