<?php

namespace KSeven\cPanel\Functions;

use KSeven\CPanel\Init;

/**
 * Class Databases
 *
 * @package KSeven\CPanel\Functions
 */
class Databases
{
    /**
     *
     * @var CPanel
     */
    protected $exc;

    /**
     * Accounts constructor.
     *
     * @param WHMClient $client
     */
    public function __construct(Init $client)
    {
        $this->exc = $client;
    }

    /**
     * CPanel API function: Mysql -> list_databases
     * @link https://api.docs.cpanel.net/openapi/cpanel/operation/list_databases/
     *
     * @return array
     */
    public function getDatabases()
    {
        $result = $this->exc->sendRequest("Mysql/list_databases", []);
        $result = json_decode($result);
        if (!empty($result->metadata) && $result->metadata->transformed === 1) {
            return $result;
        }
        return [];
    }


}
