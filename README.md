## cPanel API PHP (Simples)
Manage your cPanel server with this PHP library. 
Simple to use. With this PHP library, you can manage your cPanel.

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
  use KSeven\CPanel\Init;
  use KSeven\CPanel\Functions\Databases;

  $Auth = [
    "HOST" => "seuhost",
    "PORT" => "2083",
    "USER" => "user",
    "PASSWORD" => "pass"
  ];

  $cPanel = new Init($Auth);
  $Database = new Databases($cPanel);

  var_dump($Database->getDatabases());
```

### Available Functionality
- CPanel
  - Databases (MySQL®)
    -Database Information
      - getServerInformationDatabase (This function returns information about the account's host)
      - LocateServerDatabase (This function returns information about the account's host.)
    - Database Management
      - CheckDatabase (This function checks for errors in all of the tables in a database.)
      - CreateDatabase (This function creates a database.)
      - DeleteDatabase (This function deletes a database.)
      - DumpSchemaDatabase (This function returns a string that you can give to to recreate a particular database’s schema.)
      - getDatabases (This function lists an account's databases.)  
      - RenameDatabase (This function renames a database.)
      - RepairDatabase (This function repairs all of the tables in a database)
      - UpdatePrivilegesDatabase (This function updates privileges for all databases and users on an account.)
    - Remote Databases
      - AddHostDatabase (This function authorizes a remote host to access the account's databases.)
      - AddHostNoteDatabase (This function adds a note about a remote server.)
      - DeleteHostDatabase (This function removes a remote host's access to the account's databases.)
      - getHostNotesDatabases (This function returns the notes associated with the account's remote hosts.)
    - User Management
      - CreateUserDatabase (This function creates a database user.)
      - DeleteUserDatabase (This function deletes a user.)
      - getPrivilegesOnDatabase (This function lists a database user's privileges.)
      - getRestrictionsDatabases (This function lists a database's name, username length restrictions, and database prefix.)
      - ListRoutinesDatabases (This function returns a database user's routines.)
      - ListUsersDatabases (This function lists an account's database users.)
      - RenameUserDatabase (This function renames a database user.)
      - RemovePrivilegesUserDatabase (This function revokes a database user's privileges.)
      - SetPasswordUserDatabase (This function sets a database user's password.)
      - SetPrivilegesUserDatabase (This function sets a database user's privileges.)

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
