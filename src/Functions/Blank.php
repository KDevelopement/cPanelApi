<?php

    namespace KSeven\cPanel\Functions;

    use KSeven\CPanel\Init;

    /**
     *  Class Databases
     *
     *  @package KSeven\CPanel\Functions
     */
    class Blank
    {
        /**
         *  @var CPanel
         */
        protected $exc;

        /**
         *  Accounts constructor.
         *
         *  @param WHMClient $client
         */
        public function __construct(Init $client)
        {
            $this->exc = $client;
        }

        /**
         *  CPanel API function: Mysql -> 
         *  @link 
         *
         *  Request Sample:
         *  @link 
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {},
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $User
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */


    }